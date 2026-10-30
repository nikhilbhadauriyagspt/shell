<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
include('config.php');

// Fetch counts
$blogs = $conn->query("SELECT COUNT(*) AS total FROM blogs")->fetch_assoc()['total'];
$images = $conn->query("SELECT COUNT(*) AS total FROM gallery")->fetch_assoc()['total'];
$inquiries = $conn->query("SELECT COUNT(*) AS total FROM contact_inquiries")->fetch_assoc()['total'];
$subscrib = $conn->query("SELECT COUNT(*) AS total FROM subscribed_emails")->fetch_assoc()['total'];
$updates = $conn->query("SELECT COUNT(*) AS total FROM updates")->fetch_assoc()['total'];
$faqs = $conn->query("SELECT COUNT(*) AS total FROM faqs")->fetch_assoc()['total'];
$new_inquiries = $conn->query("SELECT COUNT(*) AS total FROM contact_inquiries WHERE status = 'new'")->fetch_assoc()['total'];
$new_subscrib = $conn->query("SELECT COUNT(*) AS total FROM subscribed_emails WHERE status = 'new'")->fetch_assoc()['total'];

// Fetch recent 5 contact inquiries for quick overview
$recent_inquiries = $conn->query("SELECT * FROM contact_inquiries ORDER BY id DESC LIMIT 5");
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Shell Automotive Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .dash-inquiry-table {
            table-layout: fixed;
            width: 100%;
        }
        .dash-msg-preview {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-all;
            font-size: 13.5px;
            color: #475569;
        }
        @media (max-width: 991px) {
            .dash-inquiry-table {
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
                <span class="fw-semibold text-secondary d-none d-sm-inline">Overview & Analytics</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="fas fa-user-shield text-danger"></i> <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?>
                </span>
                <a href="logout.php" class="btn logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <!-- Welcome & Quick Actions Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                <div>
                    <h1 class="mb-1">Dashboard</h1>
                    <p class="text-muted mb-0" style="font-size: 14px;">Welcome back! Here is a summary of your website content and leads.</p>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="add-blog.php" class="btn btn-dark btn-sm px-3 py-2 rounded-3 fw-medium"><i class="fas fa-plus me-1"></i> New Blog</a>
                    <a href="add-gallery.php" class="btn btn-outline-dark btn-sm px-3 py-2 rounded-3 fw-medium"><i class="fas fa-image me-1"></i> Upload Photo</a>
                    <a href="add-update.php" class="btn btn-outline-dark btn-sm px-3 py-2 rounded-3 fw-medium"><i class="fas fa-bullhorn me-1"></i> Post Update</a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="row g-3 mb-4">
                <!-- Total Blogs -->
                <div class="col-xl-4 col-md-6">
                    <a href="manage-blog.php" class="text-decoration-none">
                        <div class="stat-card">
                            <div>
                                <div class="stat-title">Total Blogs</div>
                                <div class="stat-value"><?= $blogs ?></div>
                                <span class="text-muted" style="font-size: 12.5px;">Manage articles &rarr;</span>
                            </div>
                            <div class="stat-icon" style="background: #eff6ff; color: #2563eb;">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Gallery Images -->
                <div class="col-xl-4 col-md-6">
                    <a href="manage-gallery.php" class="text-decoration-none">
                        <div class="stat-card">
                            <div>
                                <div class="stat-title">Gallery Images</div>
                                <div class="stat-value"><?= $images ?></div>
                                <span class="text-muted" style="font-size: 12.5px;">View portfolio photos &rarr;</span>
                            </div>
                            <div class="stat-icon" style="background: #ecfdf5; color: #059669;">
                                <i class="fas fa-images"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Updates -->
                <div class="col-xl-4 col-md-6">
                    <a href="manage-update.php" class="text-decoration-none">
                        <div class="stat-card">
                            <div>
                                <div class="stat-title">News & Updates</div>
                                <div class="stat-value"><?= $updates ?></div>
                                <span class="text-muted" style="font-size: 12.5px;">Manage updates &rarr;</span>
                            </div>
                            <div class="stat-icon" style="background: #fff1f2; color: #e11d48;">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- FAQs -->
                <div class="col-xl-4 col-md-6">
                    <a href="manage_faqs.php" class="text-decoration-none">
                        <div class="stat-card">
                            <div>
                                <div class="stat-title">Published FAQs</div>
                                <div class="stat-value"><?= $faqs ?></div>
                                <span class="text-muted" style="font-size: 12.5px;">Edit questions &rarr;</span>
                            </div>
                            <div class="stat-icon" style="background: #f5f3ff; color: #7c3aed;">
                                <i class="fas fa-circle-question"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Contact Entries -->
                <div class="col-xl-4 col-md-6">
                    <a href="contact-entries.php" class="text-decoration-none">
                        <div class="stat-card">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="stat-title mb-0">Contact Inquiries</span>
                                    <?php if ($new_inquiries > 0): ?>
                                        <span class="badge bg-danger rounded-pill" style="font-size: 11px;"><?= $new_inquiries ?> New</span>
                                    <?php endif; ?>
                                </div>
                                <div class="stat-value mt-1"><?= $inquiries ?></div>
                                <span class="text-muted" style="font-size: 12.5px;">View customer messages &rarr;</span>
                            </div>
                            <div class="stat-icon" style="background: #fffbeb; color: #d97706;">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Subscribed Emails -->
                <div class="col-xl-4 col-md-6">
                    <a href="subscribed_emails.php" class="text-decoration-none">
                        <div class="stat-card">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="stat-title mb-0">Newsletter Subscribers</span>
                                    <?php if ($new_subscrib > 0): ?>
                                        <span class="badge bg-danger rounded-pill" style="font-size: 11px;"><?= $new_subscrib ?> New</span>
                                    <?php endif; ?>
                                </div>
                                <div class="stat-value mt-1"><?= $subscrib ?></div>
                                <span class="text-muted" style="font-size: 12.5px;">View mailing list &rarr;</span>
                            </div>
                            <div class="stat-icon" style="background: #ecfeff; color: #0891b2;">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Inquiries Table -->
            <div class="admin-surface-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-0">Recent Contact Inquiries</h5>
                        <small class="text-muted">Latest 5 inquiries submitted through the website</small>
                    </div>
                    <a href="contact-entries.php" class="btn btn-sm btn-outline-dark rounded-3 px-3">View All Inquiries</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle dash-inquiry-table">
                        <thead>
                            <tr>
                                <th style="width: 65px;">ID</th>
                                <th style="width: 170px;">Name</th>
                                <th style="width: 140px;">Phone</th>
                                <th>Message</th>
                                <th style="width: 155px;">Date</th>
                                <th style="width: 90px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($recent_inquiries && $recent_inquiries->num_rows > 0): ?>
                                <?php while ($row = $recent_inquiries->fetch_assoc()): ?>
                                    <tr>
                                        <td class="fw-semibold text-muted">#<?= $row['id'] ?></td>
                                        <td class="fw-medium text-truncate"><?= htmlspecialchars($row['name']) ?></td>
                                        <td><?= htmlspecialchars($row['phone']) ?></td>
                                        <td>
                                            <div class="dash-msg-preview" title="<?= htmlspecialchars($row['message']) ?>">
                                                <?= htmlspecialchars($row['message']) ?>
                                            </div>
                                        </td>
                                        <td class="text-muted" style="font-size: 13px;"><?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></td>
                                        <td>
                                            <span class="badge rounded-pill bg-<?= $row['status'] == 'new' ? 'warning text-dark' : 'success-subtle text-success border border-success-subtle' ?>">
                                                <?= ucfirst($row['status']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">No inquiries found.</td>
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
