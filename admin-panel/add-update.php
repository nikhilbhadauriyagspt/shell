<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Update - Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
</head>
<body>

<div class="d-flex" id="wrapper">

    <?php include 'sidebar.php'; ?>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button class="btn" id="menu-toggle" title="Toggle Sidebar"><i class="fas fa-bars"></i></button>
                <span class="fw-semibold text-secondary d-none d-sm-inline">Updates Management</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="fas fa-user-shield text-danger"></i> <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?>
                </span>
                <a href="logout.php" class="btn logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <div class="admin-surface-card" style="max-width: 960px; margin: 0 auto;">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom gap-2">
                    <div>
                        <h2 class="mb-1">Post New Update</h2>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Share latest news, offers, or work updates on the website</p>
                    </div>
                    <a href="manage-update.php" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3">
                        <i class="fas fa-arrow-left me-1"></i> Manage Updates
                    </a>
                </div>

                <form action="upload_update.php" method="POST" enctype="multipart/form-data">
                    <div class="row g-3 mb-3">
                        <div class="col-md-7">
                            <label for="title" class="form-label">Update Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter update headline" required>
                        </div>

                        <div class="col-md-5">
                            <label for="services" class="form-label">Service Category <span class="text-danger">*</span></label>
                            <select class="form-select" id="services" name="services" required>
                                <option disabled selected value="">-- Select Service --</option>
                                <option value="ceramic_coating">Ceramic Coating</option>
                                <option value="graphene_coating">Graphene Coating</option>
                                <option value="glass_film">Glass Film</option>
                                <option value="car_detailing">Car Detailing Services</option>
                                <option value="bike_detailing">Bike Detailing Services</option>
                                <option value="denting_painting">Denting and Painting</option>
                                <option value="interior_customisation">Interior Customisation</option>
                                <option value="hydrodip">Hydrodip</option>
                                <option value="wrapping">Wrapping</option>
                                <option value="car_service_repair">Car Service & Repair</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="content" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Upload Images <span class="text-danger">*</span></label>
                        <div class="upload-preview" style="height: 140px;" onclick="document.getElementById('images').click()">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                            <span class="fw-semibold" style="font-size: 14px;">Click to select update images</span>
                            <span class="text-muted small">Supports JPG, PNG, WEBP</span>
                            <input type="file" class="d-none" id="images" name="images[]" multiple required>
                        </div>
                        <div id="updateImagePreview" class="preview-container d-flex flex-wrap mt-2"></div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="manage-update.php" class="btn btn-light border px-4">Cancel</a>
                        <button type="submit" class="btn btn-dark px-4"><i class="fas fa-paper-plane me-2"></i>Publish Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('images').addEventListener('change', function() {
        const preview = document.getElementById('updateImagePreview');
        preview.innerHTML = '';
        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
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

    $(document).ready(function() {
        $('.summernote').summernote({
            height: 280,
            placeholder: 'Write update description here...'
        });
    });
</script>
</body>
</html>
<?php $conn->close(); ?>