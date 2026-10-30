<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';
require_once 'seo_helper.php';
ensure_seo_table_exists($conn);

$msg = '';
$msg_type = '';

// Handle Delete
if (isset($_GET['delete'])) {
    $del_id = intval($_GET['delete']);
    $del_stmt = $conn->prepare("DELETE FROM page_seo WHERE id = ?");
    if ($del_stmt) {
        $del_stmt->bind_param("i", $del_id);
        if ($del_stmt->execute()) {
            $msg = "Page SEO deleted successfully! The page will now have no SEO title/meta tags.";
            $msg_type = "success";
        } else {
            $msg = "Failed to delete: " . $conn->error;
            $msg_type = "danger";
        }
        $del_stmt->close();
    }
}

// Fetch all pages
$result = $conn->query("SELECT * FROM page_seo ORDER BY page_name ASC");
$total_pages = $result ? $result->num_rows : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Page SEO - Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .seo-title-cell {
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
            max-width: 260px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .seo-desc-cell {
            font-size: 13px;
            color: #64748b;
            max-width: 320px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
        }
        .url-badge {
            background-color: #f1f5f9;
            color: #0f172a;
            border: 1px solid #e2e8f0;
            font-family: monospace;
            font-size: 12.5px;
            padding: 3px 8px;
            border-radius: 6px;
        }
        .search-input {
            max-width: 300px;
        }
    </style>
</head>
<body>

<div class="d-flex" id="wrapper">

    <?php include 'sidebar.php'; ?>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button class="btn" id="menu-toggle" title="Toggle Sidebar"><i class="fas fa-bars"></i></button>
                <span class="fw-semibold text-secondary d-none d-sm-inline">SEO Management</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="fas fa-user-shield text-danger"></i> <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?>
                </span>
                <a href="logout.php" class="btn logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <div class="admin-surface-card">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom gap-2">
                    <div>
                        <h2 class="mb-1">Page SEO Management</h2>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Manage Meta Titles, Descriptions and Keywords for all website services and pages (Total: <?= $total_pages ?> pages)</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="add-seo.php" class="btn btn-dark px-3 py-2 rounded-3">
                            <i class="fas fa-plus-circle me-1"></i> Add New Page SEO
                        </a>
                    </div>
                </div>

                <?php if (!empty($msg)): ?>
                    <div class="alert alert-<?= $msg_type ?> alert-dismissible fade show" role="alert">
                        <i class="fas <?= $msg_type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> me-2"></i>
                        <?= htmlspecialchars($msg) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group search-input">
                            <span class="input-group-text"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" id="seoSearch" class="form-control" placeholder="Search page name or URL...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="seoTable">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th style="min-width: 160px;">Page Name</th>
                                <th style="min-width: 130px;">Page URL</th>
                                <th style="min-width: 220px;">Meta Title</th>
                                <th style="min-width: 250px;">Meta Description</th>
                                <th style="width: 120px;" class="text-center">Status</th>
                                <th style="width: 110px;" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result && $result->num_rows > 0): ?>
                                <?php $i = 1; while ($row = $result->fetch_assoc()): 
                                    $has_title = !empty(trim($row['meta_title'] ?? ''));
                                    $has_desc = !empty(trim($row['meta_description'] ?? ''));
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>
                                            <strong class="d-block text-dark"><?= htmlspecialchars($row['page_name']) ?></strong>
                                        </td>
                                        <td>
                                            <span class="url-badge"><?= htmlspecialchars($row['page_url']) ?></span>
                                            <a href="../<?= htmlspecialchars($row['page_url']) ?>" target="_blank" class="text-muted ms-1" title="View page"><i class="fas fa-external-link-alt fa-xs"></i></a>
                                        </td>
                                        <td>
                                            <?php if ($has_title): ?>
                                                <div class="seo-title-cell" title="<?= htmlspecialchars($row['meta_title']) ?>">
                                                    <?= htmlspecialchars($row['meta_title']) ?>
                                                </div>
                                                <small class="text-muted"><?= mb_strlen($row['meta_title']) ?> chars</small>
                                            <?php else: ?>
                                                <span class="text-danger small fst-italic"><i class="fas fa-exclamation-triangle me-1"></i>No title</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($has_desc): ?>
                                                <div class="seo-desc-cell" title="<?= htmlspecialchars($row['meta_description']) ?>">
                                                    <?= htmlspecialchars($row['meta_description']) ?>
                                                </div>
                                                <small class="text-muted"><?= mb_strlen($row['meta_description']) ?> chars</small>
                                            <?php else: ?>
                                                <span class="text-muted small fst-italic">No description</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($has_title && $has_desc): ?>
                                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Complete</span>
                                            <?php elseif ($has_title): ?>
                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Partial</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary-subtle text-secondary border px-2 py-1">Empty</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm">
                                                <a href="edit-seo.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary" title="Edit SEO"><i class="fas fa-edit"></i></a>
                                                <a href="manage-seo.php?delete=<?= $row['id'] ?>" class="btn btn-outline-danger" title="Delete SEO" onclick="return confirm('Are you sure you want to delete SEO for <?= htmlspecialchars(addslashes($row['page_name'])) ?>? Once deleted, this page will have NO meta title or tags.');"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        <i class="fas fa-search-minus fa-3x mb-3 text-secondary"></i>
                                        <p class="mb-1">No page SEO records found.</p>
                                        <a href="add-seo.php" class="btn btn-sm btn-dark mt-2">Add First Page SEO</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar toggle
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar-wrapper');
    const content = document.getElementById('page-content-wrapper');

    if (menuToggle) {
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('d-none');
            const isMobile = window.innerWidth <= 768;
            if (sidebar.classList.contains('d-none')) {
                content.style.marginLeft = '0';
                content.style.width = '100%';
            } else {
                content.style.marginLeft = isMobile ? '0' : '260px';
                content.style.width = isMobile ? '100%' : 'calc(100% - 260px)';
            }
        });
    }

    // Sidebar Dropdown toggle
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        if (toggle) {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                dropdown.classList.toggle('open');
                dropdown.classList.toggle('close', !dropdown.classList.contains('open'));
            });
        }
    });

    // Client-side search
    document.getElementById('seoSearch').addEventListener('keyup', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('#seoTable tbody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(query) ? '' : 'none';
        });
    });
</script>
</body>
</html>
