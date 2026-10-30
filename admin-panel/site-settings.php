<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';
require_once 'site_settings_helper.php';

$message = '';
$message_type = '';

// Handle Settings Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Current settings for fallback if no new image uploaded
    $current_settings = get_site_settings($conn);

    $site_title = trim($_POST['site_title'] ?? '');
    $phone      = trim($_POST['phone'] ?? '');
    $whatsapp   = trim($_POST['whatsapp'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $address    = trim($_POST['address'] ?? '');
    $maps_link  = trim($_POST['maps_link'] ?? '');
    $facebook   = trim($_POST['facebook'] ?? '');
    $twitter    = trim($_POST['twitter'] ?? '');
    $instagram  = trim($_POST['instagram'] ?? '');
    $linkedin   = trim($_POST['linkedin'] ?? '');
    $youtube    = trim($_POST['youtube'] ?? '');

    $logo_path    = $current_settings['logo'];
    $favicon_path = $current_settings['favicon'];

    $upload_dir = __DIR__ . '/uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $allowed_image_exts = ['png', 'jpg', 'jpeg', 'webp', 'svg'];
    $allowed_favicon_exts = ['png', 'jpg', 'jpeg', 'webp', 'svg', 'ico'];

    // Process Logo Upload
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logo_name = $_FILES['logo']['name'];
        $logo_tmp  = $_FILES['logo']['tmp_name'];
        $logo_ext  = strtolower(pathinfo($logo_name, PATHINFO_EXTENSION));

        if (in_array($logo_ext, $allowed_image_exts)) {
            $new_logo_name = 'logo_' . time() . '_' . uniqid() . '.' . $logo_ext;
            $target_file = $upload_dir . $new_logo_name;
            if (move_uploaded_file($logo_tmp, $target_file)) {
                $logo_path = 'admin-panel/uploads/' . $new_logo_name;
            } else {
                $message = "Failed to upload the logo image.";
                $message_type = "danger";
            }
        } else {
            $message = "Invalid logo format. Allowed: PNG, JPG, JPEG, WEBP, SVG.";
            $message_type = "danger";
        }
    }

    // Process Favicon Upload
    if (isset($_FILES['favicon']) && $_FILES['favicon']['error'] === UPLOAD_ERR_OK) {
        $fav_name = $_FILES['favicon']['name'];
        $fav_tmp  = $_FILES['favicon']['tmp_name'];
        $fav_ext  = strtolower(pathinfo($fav_name, PATHINFO_EXTENSION));

        if (in_array($fav_ext, $allowed_favicon_exts)) {
            $new_fav_name = 'favicon_' . time() . '_' . uniqid() . '.' . $fav_ext;
            $target_file = $upload_dir . $new_fav_name;
            if (move_uploaded_file($fav_tmp, $target_file)) {
                $favicon_path = 'admin-panel/uploads/' . $new_fav_name;
            } else {
                $message = "Failed to upload the favicon image.";
                $message_type = "danger";
            }
        } else {
            $message = "Invalid favicon format. Allowed: ICO, PNG, JPG, JPEG, WEBP, SVG.";
            $message_type = "danger";
        }
    }

    if (empty($message_type) || $message_type !== 'danger') {
        $stmt = $conn->prepare("UPDATE `site_settings` SET 
            `site_title` = ?, 
            `logo` = ?, 
            `favicon` = ?, 
            `phone` = ?, 
            `whatsapp` = ?, 
            `email` = ?, 
            `address` = ?, 
            `maps_link` = ?, 
            `facebook` = ?, 
            `twitter` = ?, 
            `instagram` = ?, 
            `linkedin` = ?, 
            `youtube` = ?
            WHERE `id` = 1");

        if ($stmt) {
            $stmt->bind_param(
                "sssssssssssss",
                $site_title,
                $logo_path,
                $favicon_path,
                $phone,
                $whatsapp,
                $email,
                $address,
                $maps_link,
                $facebook,
                $twitter,
                $instagram,
                $linkedin,
                $youtube
            );

            if ($stmt->execute()) {
                $message = "Settings updated successfully! Changes are live across the website.";
                $message_type = "success";
            } else {
                $message = "Database error: " . $stmt->error;
                $message_type = "danger";
            }
            $stmt->close();
        } else {
            $message = "Failed to prepare update query: " . $conn->error;
            $message_type = "danger";
        }
    }
}

// Fetch current site settings (forced refresh so updated values show immediately)
$settings = get_site_settings($conn, true);

// Helper to resolve image preview path inside admin-panel
function admin_preview_path($path) {
    if (empty($path)) return '';
    // If path starts with admin-panel/, strip it because we are inside admin-panel
    if (strpos($path, 'admin-panel/') === 0) {
        return substr($path, strlen('admin-panel/'));
    }
    // If it's an external URL
    if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) {
        return $path;
    }
    // Else it is in root assets
    return '../' . ltrim($path, '/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header & Site Settings - Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .settings-card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }
        .settings-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 16px;
            margin-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
        }
        .settings-card-header .icon-badge {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(225, 29, 72, 0.1);
            color: #e11d48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
        .preview-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border-radius: 8px;
            background: #0f172a;
            border: 1px solid #e2e8f0;
            min-height: 80px;
        }
        .preview-box img {
            max-height: 60px;
            max-width: 200px;
            object-fit: contain;
        }
        .favicon-preview-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 8px;
            background: #0f172a;
            border: 1px solid #e2e8f0;
        }
        .favicon-preview-box img {
            width: 32px;
            height: 32px;
            object-fit: contain;
        }
        .input-group-text {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #64748b;
        }
        .form-control:focus {
            border-color: #e11d48;
            box-shadow: 0 0 0 0.25rem rgba(225, 29, 72, 0.15);
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
                <span class="fw-semibold text-secondary d-none d-sm-inline">Site Management</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="fas fa-user-shield text-danger"></i> <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?>
                </span>
                <a href="logout.php" class="btn logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <div style="max-width: 960px; margin: 0 auto;">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom gap-2">
                    <div>
                        <h2 class="mb-1">Header & Site Settings</h2>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Manage Website Logo, Favicon, Contact Info, WhatsApp & Social Links dynamically</p>
                    </div>
                    <a href="../index.php" target="_blank" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3">
                        <i class="fas fa-external-link-alt me-1"></i> View Live Site
                    </a>
                </div>

                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
                        <i class="fas <?= $message_type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> me-2"></i>
                        <?= htmlspecialchars($message) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- SECTION 1: LOGO & FAVICON -->
                    <div class="settings-card">
                        <div class="settings-card-header">
                            <div class="icon-badge"><i class="fas fa-palette"></i></div>
                            <div>
                                <h5 class="mb-0 fw-bold">Header Logo & Favicon</h5>
                                <small class="text-muted">Upload and manage the site logo and browser tab favicon</small>
                            </div>
                        </div>

                        <div class="row g-4">
                            <!-- Site Title -->
                            <div class="col-12">
                                <label for="site_title" class="form-label fw-semibold">Brand / Website Name</label>
                                <input type="text" name="site_title" id="site_title" class="form-control" value="<?= htmlspecialchars($settings['site_title']) ?>" placeholder="e.g. Shell Automotiv" required>
                            </div>

                            <!-- Header Logo -->
                            <div class="col-md-7">
                                <label for="logo" class="form-label fw-semibold">Upload New Header Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control" accept=".png,.jpg,.jpeg,.webp,.svg" onchange="previewImage(this, 'logo_preview_img')">
                                <small class="text-muted d-block mt-1">Recommended: Transparent PNG / SVG (width: ~200-300px). Leave empty to keep current.</small>
                            </div>

                            <div class="col-md-5">
                                <label class="form-label fw-semibold d-block">Current Logo Preview</label>
                                <div class="preview-box">
                                    <img id="logo_preview_img" src="<?= htmlspecialchars(admin_preview_path($settings['logo'])) ?>" alt="Site Logo">
                                </div>
                            </div>

                            <!-- Favicon -->
                            <div class="col-md-7">
                                <label for="favicon" class="form-label fw-semibold">Upload New Favicon</label>
                                <input type="file" name="favicon" id="favicon" class="form-control" accept=".ico,.png,.jpg,.jpeg,.webp,.svg" onchange="previewImage(this, 'favicon_preview_img')">
                                <small class="text-muted d-block mt-1">Recommended: 32x32 or 64x64 PNG / ICO. Leave empty to keep current.</small>
                            </div>

                            <div class="col-md-5">
                                <label class="form-label fw-semibold d-block">Current Favicon Preview</label>
                                <div class="favicon-preview-box">
                                    <img id="favicon_preview_img" src="<?= htmlspecialchars(admin_preview_path($settings['favicon'])) ?>" alt="Favicon">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: CONTACT INFORMATION -->
                    <div class="settings-card">
                        <div class="settings-card-header">
                            <div class="icon-badge"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <h5 class="mb-0 fw-bold">Contact & Location Information</h5>
                                <small class="text-muted">Phone numbers, WhatsApp, Email and physical address used in header & website</small>
                            </div>
                        </div>

                        <div class="row g-3">
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Phone Number (Calling)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="phone" id="phone" class="form-control" value="<?= htmlspecialchars($settings['phone']) ?>" placeholder="e.g. +91 9560595146" required>
                                </div>
                                <small class="text-muted">Used in calling button and contact sections.</small>
                            </div>

                            <!-- WhatsApp -->
                            <div class="col-md-6">
                                <label for="whatsapp" class="form-label fw-semibold">WhatsApp Number</label>
                                <div class="input-group">
                                    <span class="input-group-text text-success"><i class="fab fa-whatsapp"></i></span>
                                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="<?= htmlspecialchars($settings['whatsapp']) ?>" placeholder="e.g. +91 9560595146" required>
                                </div>
                                <small class="text-muted">Used for floating WhatsApp button & topbar "LET'S TALK".</small>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Official Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($settings['email']) ?>" placeholder="e.g. info@shellautomotiv.com" required>
                                </div>
                            </div>

                            <!-- Maps Link -->
                            <div class="col-md-6">
                                <label for="maps_link" class="form-label fw-semibold">Google Maps URL</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                    <input type="url" name="maps_link" id="maps_link" class="form-control" value="<?= htmlspecialchars($settings['maps_link']) ?>" placeholder="https://maps.app.goo.gl/...">
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">Office / Workshop Address</label>
                                <textarea name="address" id="address" rows="2" class="form-control" placeholder="e.g. D-61 Sector 10 Noida"><?= htmlspecialchars($settings['address']) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: SOCIAL MEDIA LINKS -->
                    <div class="settings-card">
                        <div class="settings-card-header">
                            <div class="icon-badge"><i class="fas fa-share-alt"></i></div>
                            <div>
                                <h5 class="mb-0 fw-bold">Social Media Links</h5>
                                <small class="text-muted">Manage the social media icons in header topbar and footer</small>
                            </div>
                        </div>

                        <div class="row g-3">
                            <!-- Facebook -->
                            <div class="col-md-6">
                                <label for="facebook" class="form-label fw-semibold">Facebook URL</label>
                                <div class="input-group">
                                    <span class="input-group-text text-primary"><i class="fab fa-facebook-f"></i></span>
                                    <input type="url" name="facebook" id="facebook" class="form-control" value="<?= htmlspecialchars($settings['facebook']) ?>" placeholder="https://www.facebook.com/...">
                                </div>
                            </div>

                            <!-- Twitter / X -->
                            <div class="col-md-6">
                                <label for="twitter" class="form-label fw-semibold">Twitter / X URL</label>
                                <div class="input-group">
                                    <span class="input-group-text text-info"><i class="fab fa-twitter"></i></span>
                                    <input type="url" name="twitter" id="twitter" class="form-control" value="<?= htmlspecialchars($settings['twitter']) ?>" placeholder="https://twitter.com/...">
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div class="col-md-6">
                                <label for="instagram" class="form-label fw-semibold">Instagram URL</label>
                                <div class="input-group">
                                    <span class="input-group-text text-danger"><i class="fab fa-instagram"></i></span>
                                    <input type="url" name="instagram" id="instagram" class="form-control" value="<?= htmlspecialchars($settings['instagram']) ?>" placeholder="https://www.instagram.com/...">
                                </div>
                            </div>

                            <!-- LinkedIn -->
                            <div class="col-md-6">
                                <label for="linkedin" class="form-label fw-semibold">LinkedIn URL</label>
                                <div class="input-group">
                                    <span class="input-group-text text-primary"><i class="fab fa-linkedin-in"></i></span>
                                    <input type="url" name="linkedin" id="linkedin" class="form-control" value="<?= htmlspecialchars($settings['linkedin']) ?>" placeholder="https://www.linkedin.com/in/...">
                                </div>
                            </div>

                            <!-- YouTube -->
                            <div class="col-12">
                                <label for="youtube" class="form-label fw-semibold">YouTube Channel URL</label>
                                <div class="input-group">
                                    <span class="input-group-text text-danger"><i class="fab fa-youtube"></i></span>
                                    <input type="url" name="youtube" id="youtube" class="form-control" value="<?= htmlspecialchars($settings['youtube']) ?>" placeholder="https://www.youtube.com/@...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="d-flex justify-content-end gap-2 pb-5">
                        <a href="dashboard.php" class="btn btn-light border px-4 py-2">Back to Dashboard</a>
                        <button type="submit" class="btn btn-dark px-4 py-2 fw-semibold">
                            <i class="fas fa-save me-2"></i> Save Changes
                        </button>
                    </div>
                </form>
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

    // Image live preview
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>
