<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
include('config.php');

// Handle delete inquiry if requested
if (isset($_GET['delete_id'])) {
    $del_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM contact_inquiries WHERE id = $del_id");
    header("Location: contact-entries.php?deleted=1");
    exit();
}

// Update all new inquiries to seen
$conn->query("UPDATE contact_inquiries SET status = 'seen' WHERE status = 'new'");

// Fetch inquiries to display
$result = $conn->query("SELECT * FROM contact_inquiries ORDER BY id DESC");
$total_entries = $result ? $result->num_rows : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Entries - Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .inquiry-table {
            table-layout: fixed;
            width: 100%;
        }
        .inquiry-msg-preview {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-word;
            font-size: 13.5px;
            color: #475569;
            line-height: 1.45;
            max-height: 2.9em;
        }
        @media (max-width: 991px) {
            .inquiry-table {
                table-layout: auto;
            }
        }
    </style>
</head>
<body>

<div class="d-flex" id="wrapper">

    <?php include 'sidebar.php'; ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button class="btn" id="menu-toggle" title="Toggle Sidebar"><i class="fas fa-bars"></i></button>
                <span class="fw-semibold text-secondary d-none d-sm-inline">Contact Inquiries</span>
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
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                    <div>
                        <h2 class="mb-1">Contact Form Entries</h2>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Total <strong><?= $total_entries ?></strong> inquiries received from website visitors</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle inquiry-table">
                        <thead>
                            <tr>
                                <th style="width: 65px;">ID</th>
                                <th style="width: 170px;">Name</th>
                                <th style="width: 145px;">Phone</th>
                                <th>Message Preview</th>
                                <th style="width: 155px;">Date</th>
                                <th style="width: 90px;">Status</th>
                                <th style="width: 125px; text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result && $result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td class="fw-semibold text-muted">#<?= $row['id'] ?></td>
                                        <td class="fw-semibold text-dark text-truncate" title="<?= htmlspecialchars($row['name']) ?>">
                                            <?= htmlspecialchars($row['name']) ?>
                                        </td>
                                        <td>
                                            <a href="tel:<?= htmlspecialchars($row['phone']) ?>" class="text-decoration-none text-secondary fw-medium">
                                                <i class="fas fa-phone-alt fa-xs me-1 text-muted"></i><?= htmlspecialchars($row['phone']) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="inquiry-msg-preview">
                                                <?= htmlspecialchars($row['message']) ?>
                                            </div>
                                        </td>
                                        <td class="text-muted" style="font-size: 13px;">
                                            <?= date('d M Y, h:i A', strtotime($row['created_at'])) ?>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-<?= $row['status'] == 'new' ? 'warning text-dark' : 'success-subtle text-success border border-success-subtle' ?>">
                                                <?= ucfirst($row['status']) ?>
                                            </span>
                                        </td>
                                        <td class="text-end" style="white-space: nowrap;">
                                            <button type="button"
                                                class="btn btn-sm btn-light border text-primary me-1 view-msg-btn"
                                                title="Read Full Message"
                                                data-id="<?= $row['id'] ?>"
                                                data-name="<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>"
                                                data-phone="<?= htmlspecialchars($row['phone'], ENT_QUOTES) ?>"
                                                data-date="<?= date('d M Y, h:i A', strtotime($row['created_at'])) ?>"
                                                data-message="<?= htmlspecialchars($row['message'], ENT_QUOTES) ?>">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <a href="contact-entries.php?delete_id=<?= $row['id'] ?>"
                                               class="btn btn-sm btn-light border text-danger"
                                               title="Delete"
                                               onclick="return confirm('Delete this inquiry?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">No contact inquiries found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Full Message Modal -->
<div class="modal fade" id="viewInquiryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom px-4 py-3">
                <h5 class="modal-title fw-bold" id="modalTitle">Inquiry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3 mb-3 pb-3 border-bottom">
                    <div class="col-sm-6">
                        <div class="text-muted small fw-semibold text-uppercase">Sender Name</div>
                        <div class="fw-bold text-dark fs-6 mt-1" id="modalName">-</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small fw-semibold text-uppercase">Phone Number</div>
                        <div class="fw-semibold text-dark fs-6 mt-1" id="modalPhone">-</div>
                    </div>
                    <div class="col-12">
                        <div class="text-muted small fw-semibold text-uppercase">Submitted On</div>
                        <div class="text-secondary small mt-1" id="modalDate">-</div>
                    </div>
                </div>
                <div>
                    <div class="text-muted small fw-semibold text-uppercase mb-2">Full Message</div>
                    <div id="modalMessage" class="p-3 bg-light rounded-3 border text-dark" style="white-space: pre-wrap; word-break: break-word; max-height: 300px; overflow-y: auto; font-size: 14px; line-height: 1.6;"></div>
                </div>
            </div>
            <div class="modal-footer border-top px-4 py-3">
                <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $conn->close(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const inquiryModal = new bootstrap.Modal(document.getElementById('viewInquiryModal'));
    document.querySelectorAll('.view-msg-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('modalTitle').textContent = 'Inquiry #' + btn.dataset.id;
            document.getElementById('modalName').textContent = btn.dataset.name;
            document.getElementById('modalPhone').textContent = btn.dataset.phone;
            document.getElementById('modalDate').textContent = btn.dataset.date;
            document.getElementById('modalMessage').textContent = btn.dataset.message;
            inquiryModal.show();
        });
    });

    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar-wrapper');
    const content = document.getElementById('page-content-wrapper');

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

    document.querySelectorAll('.dropdown').forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            dropdown.classList.toggle('open');
            dropdown.classList.toggle('close', !dropdown.classList.contains('open'));
        });
    });
</script>
</body>
</html>
