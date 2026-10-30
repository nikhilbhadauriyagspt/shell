<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gallery - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="d-flex" id="wrapper">

    <?php include 'sidebar.php'; ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button class="btn" id="menu-toggle" title="Toggle Sidebar"><i class="fas fa-bars"></i></button>
                <span class="fw-semibold text-secondary d-none d-sm-inline">Admin Control Panel</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="fas fa-user-shield text-danger"></i> <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?>
                </span>
                <a href="logout.php" class="btn logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <div class="container-fluid p-4"><div class="admin-surface-card">
            <h1 class="text-center">Add Your Gallery</h1>

            <!-- Gallery Form -->
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <ul class="nav nav-tabs" id="galleryTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ppf-tab" data-bs-toggle="tab" href="#ppf" role="tab">Ceramic/Graphene Coating</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="car-tab" data-bs-toggle="tab" href="#car" role="tab">PPF</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bike-tab" data-bs-toggle="tab" href="#bike" role="tab">Bike</a>
                    </li>
                </ul>

                <div class="tab-content mt-4" id="galleryTabContent">
                    <!-- All Tab -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="row" id="all-preview"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="upload-preview" onclick="triggerUpload(this)">
                                    <input type="file" name="all[]" class="d-none" multiple onchange="previewMultipleImages(this, 'all-preview')">
                                    <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><span class="small fw-medium">Click to select images</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ceramic/Graphene Tab -->
                    <div class="tab-pane fade" id="ppf" role="tabpanel">
                        <div class="row" id="ppf-preview"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="upload-preview" onclick="triggerUpload(this)">
                                    <input type="file" name="ppf[]" class="d-none" multiple onchange="previewMultipleImages(this, 'ppf-preview')">
                                    <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><span class="small fw-medium">Click to select images</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- PPF Tab -->
                    <div class="tab-pane fade" id="car" role="tabpanel">
                        <div class="row" id="car-preview"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="upload-preview" onclick="triggerUpload(this)">
                                    <input type="file" name="car[]" class="d-none" multiple onchange="previewMultipleImages(this, 'car-preview')">
                                    <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><span class="small fw-medium">Click to select images</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bike Tab -->
                    <div class="tab-pane fade" id="bike" role="tabpanel">
                        <div class="row" id="bike-preview"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="upload-preview" onclick="triggerUpload(this)">
                                    <input type="file" name="bike[]" class="d-none" multiple onchange="previewMultipleImages(this, 'bike-preview')">
                                    <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><span class="small fw-medium">Click to select images</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Upload</button>
            </form>
        </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewMultipleImages(input, previewId) {
        const previewContainer = document.getElementById(previewId);
        previewContainer.innerHTML = '';
        if (input.files) {
            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'm-2');
                    img.style.width = '150px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    function triggerUpload(container) {
        const input = container.querySelector('input');
        input.click();
    }

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
            content.style.marginLeft = isMobile ? '150px' : '260px';
            content.style.width = isMobile ? 'calc(100% - 150px)' : 'calc(100% - 260px)';
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
