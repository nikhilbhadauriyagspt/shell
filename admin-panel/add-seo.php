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

// Find all php files in root
$all_php_files = glob('../*.php');
$existing_urls_res = $conn->query("SELECT LOWER(page_url) as page_url FROM page_seo");
$existing_urls = [];
if ($existing_urls_res) {
    while ($r = $existing_urls_res->fetch_assoc()) {
        $existing_urls[] = $r['page_url'];
    }
}

$available_files = [];
foreach ($all_php_files as $f) {
    $fname = basename($f);
    if (in_array($fname, ['header.php', 'footer.php', 'process.php'])) continue;
    if (!in_array(strtolower($fname), $existing_urls)) {
        $available_files[] = $fname;
    }
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page_name = trim($_POST['page_name'] ?? '');
    $page_url  = trim($_POST['page_url'] ?? '');
    $meta_title = trim($_POST['meta_title'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $meta_keywords = trim($_POST['meta_keywords'] ?? '');

    // Strip leading/trailing slashes
    $page_url = ltrim($page_url, '/');

    if (empty($page_name) || empty($page_url)) {
        $msg = "Please provide both Page Name and Page URL.";
        $msg_type = "danger";
    } else {
        // Check duplicate
        $chk = $conn->prepare("SELECT id FROM page_seo WHERE LOWER(page_url) = LOWER(?)");
        $chk->bind_param("s", $page_url);
        $chk->execute();
        $chk_res = $chk->get_result();

        if ($chk_res && $chk_res->num_rows > 0) {
            $msg = "An SEO configuration for this page URL already exists! Please edit the existing entry.";
            $msg_type = "danger";
            $chk->close();
        } else {
            $chk->close();
            $stmt = $conn->prepare("INSERT INTO page_seo (page_name, page_url, meta_title, meta_description, meta_keywords) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssss", $page_name, $page_url, $meta_title, $meta_description, $meta_keywords);
                if ($stmt->execute()) {
                    echo "<script>alert('SEO for " . addslashes($page_name) . " added successfully!'); window.location.href='manage-seo.php';</script>";
                    exit();
                } else {
                    $msg = "Database error: " . $stmt->error;
                    $msg_type = "danger";
                }
                $stmt->close();
            } else {
                $msg = "Query preparation failed: " . $conn->error;
                $msg_type = "danger";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page SEO - Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .serp-preview {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            font-family: Arial, sans-serif;
        }
        .serp-url {
            color: #202124;
            font-size: 13px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .serp-title {
            color: #1a0dab;
            font-size: 20px;
            line-height: 1.3;
            font-weight: 400;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-bottom: 4px;
        }
        .serp-title:hover {
            text-decoration: underline;
        }
        .serp-desc {
            color: #4d5156;
            font-size: 14px;
            line-height: 1.58;
            margin: 0;
            word-wrap: break-word;
        }
        .char-counter {
            font-size: 12px;
            font-weight: 500;
        }
        .char-good { color: #16a34a; }
        .char-warning { color: #ea580c; }
        .char-danger { color: #dc2626; }
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
            <div style="max-width: 860px; margin: 0 auto;">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom gap-2">
                    <div>
                        <h2 class="mb-1">Add Page SEO</h2>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Configure SEO Meta Title, Meta Description and Keywords for any new or existing website page</p>
                    </div>
                    <a href="manage-seo.php" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3">
                        <i class="fas fa-list-ul me-1"></i> Manage All SEO
                    </a>
                </div>

                <?php if (!empty($msg)): ?>
                    <div class="alert alert-<?= $msg_type ?> alert-dismissible fade show" role="alert">
                        <i class="fas <?= $msg_type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> me-2"></i>
                        <?= htmlspecialchars($msg) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="admin-surface-card p-4">
                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="page_name" class="form-label fw-semibold">Page Name / Label <span class="text-danger">*</span></label>
                                <input type="text" name="page_name" id="page_name" class="form-control" placeholder="e.g. Paint Protection Film, Ceramic Coating" required value="<?= htmlspecialchars($_POST['page_name'] ?? '') ?>">
                                <small class="text-muted">Human-readable name used in admin management.</small>
                            </div>

                            <div class="col-md-6">
                                <label for="page_url" class="form-label fw-semibold">Page URL / File Name <span class="text-danger">*</span></label>
                                <input type="text" name="page_url" id="page_url" class="form-control" placeholder="e.g. ppfcoating.php or custom-page.php" required list="availablePagesList" value="<?= htmlspecialchars($_POST['page_url'] ?? '') ?>" oninput="updateSerpPreview()">
                                <datalist id="availablePagesList">
                                    <?php foreach ($available_files as $af): ?>
                                        <option value="<?= htmlspecialchars($af) ?>"><?= htmlspecialchars($af) ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                                <small class="text-muted">The file name or slug (e.g. <code>index.php</code> or <code>service.php</code>).</small>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="meta_title" class="form-label fw-semibold mb-0">Meta Title <span class="text-danger">*</span></label>
                                    <span id="titleCounter" class="char-counter">0 / 60 characters</span>
                                </div>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="e.g. Premium Ceramic Coating Services in Noida | Shell Automotiv" required value="<?= htmlspecialchars($_POST['meta_title'] ?? '') ?>" oninput="updateSerpPreview()">
                                <small class="text-muted">Recommended: 50-60 characters for optimal Google search visibility.</small>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="meta_description" class="form-label fw-semibold mb-0">Meta Description</label>
                                    <span id="descCounter" class="char-counter">0 / 160 characters</span>
                                </div>
                                <textarea name="meta_description" id="meta_description" rows="3" class="form-control" placeholder="Write a compelling summary of the page for search engines..." oninput="updateSerpPreview()"><?= htmlspecialchars($_POST['meta_description'] ?? '') ?></textarea>
                                <small class="text-muted">Recommended: 150-160 characters. Appears as the snippet beneath title in search results.</small>
                            </div>

                            <div class="col-12 mt-3">
                                <label for="meta_keywords" class="form-label fw-semibold">Meta Keywords</label>
                                <textarea name="meta_keywords" id="meta_keywords" rows="2" class="form-control" placeholder="e.g. ceramic coating, car detailing, ppf coating, shell automotiv"><?= htmlspecialchars($_POST['meta_keywords'] ?? '') ?></textarea>
                                <small class="text-muted">Separate multiple keywords with commas.</small>
                            </div>

                            <!-- Live Google SERP Preview Card -->
                            <div class="col-12 mt-4">
                                <label class="form-label fw-semibold text-secondary"><i class="fab fa-google text-danger me-1"></i> Google Search Result Preview</label>
                                <div class="serp-preview">
                                    <div class="serp-url">
                                        <i class="fas fa-globe text-secondary" style="font-size: 11px;"></i>
                                        <span>https://shellcove.co &rsaquo; <span id="serpUrlPreview">page</span></span>
                                    </div>
                                    <a href="#" class="serp-title" id="serpTitlePreview">Your Page Title Will Appear Here</a>
                                    <p class="serp-desc" id="serpDescPreview">Your meta description will appear here as the snippet in Google search results. Keep it engaging and relevant.</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 pt-4 mt-4 border-top">
                            <a href="manage-seo.php" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn btn-dark px-4"><i class="fas fa-save me-2"></i>Save Page SEO</button>
                        </div>
                    </form>
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

    // SERP Live Preview and character counters
    function updateSerpPreview() {
        const titleVal = document.getElementById('meta_title').value.trim();
        const descVal  = document.getElementById('meta_description').value.trim();
        const urlVal   = document.getElementById('page_url').value.trim();

        // Update Title
        const titlePreview = document.getElementById('serpTitlePreview');
        const titleCounter = document.getElementById('titleCounter');
        const tLen = titleVal.length;
        titlePreview.textContent = titleVal || 'Your Page Title Will Appear Here';
        titleCounter.textContent = `${tLen} / 60 characters`;
        titleCounter.className = 'char-counter ' + (tLen > 65 ? 'char-danger' : (tLen >= 45 && tLen <= 65 ? 'char-good' : 'char-warning'));

        // Update Desc
        const descPreview = document.getElementById('serpDescPreview');
        const descCounter = document.getElementById('descCounter');
        const dLen = descVal.length;
        descPreview.textContent = descVal || 'Your meta description will appear here as the snippet in Google search results.';
        descCounter.textContent = `${dLen} / 160 characters`;
        descCounter.className = 'char-counter ' + (dLen > 165 ? 'char-danger' : (dLen >= 120 && dLen <= 165 ? 'char-good' : 'char-warning'));

        // Update URL
        document.getElementById('serpUrlPreview').textContent = urlVal ? urlVal.replace(/\.php$/i, '') : 'page';
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', updateSerpPreview);
</script>
</body>
</html>
