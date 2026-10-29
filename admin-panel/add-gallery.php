<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
     
    </style>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
?>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
            
        <img class="toplogo" src="../assets/images/logo-web/logo.png" width="100%" alt="">
        <img  class="bottomlogo"src="../assets/images/logo-web/heamid.png" width="100%" alt="">
        </div>
        <div class="list-group list-group-flush">
            <a href="dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>

            <!-- Gallery Dropdown -->
            <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="galleryDropdown">Gallery</a>
                <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                    <li><a class="dropdown-item" href="add-gallery.php">Add Gallery</a></li>
                    <li><a class="dropdown-item" href="manage-gallery.php">Manage Gallery</a></li>
                </ul>
            </div>

             <!-- Gallery Dropdown -->
             <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="blogsDropdown">Blogs</a>
                <ul class="dropdown-menu" aria-labelledby="blogsDropdown">
                    <li><a class="dropdown-item" href="add-blog.php">Add Blog</a></li>
                    <li><a class="dropdown-item" href="manage-blog.php">Manage Blogs</a></li>
                </ul>
            </div>
             <!-- Gallery Dropdown -->
             <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="updatesDropdown">Updates</a>
                <ul class="dropdown-menu" aria-labelledby="updatesDropdown">
                    <li><a class="dropdown-item" href="add-update.php">Add Update</a></li>
                    <li><a class="dropdown-item" href="manage-update.php">Manage Updates</a></li>
                </ul>
            </div>
          <!-- Faq Dropdown -->
          <div class="dropdown">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="faqDropdown">FAQ</a>
                <ul class="dropdown-menu" aria-labelledby="faqDropdown">
                    <li><a class="dropdown-item" href="add-update.php">Add FAQ</a></li>
                    <li><a class="dropdown-item" href="manage-update.php">Manage FAQ</a></li>
                </ul>
            </div>
         
            <a href="contact-entries.php" class="list-group-item list-group-item-action">Contact Entries</a>
            <a href="subscribed_emails.php" class="list-group-item list-group-item-action">Subscribed Emails</a>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
            
            <a href="logout.php" class="btn btn-danger logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
        </nav>

        <div class="container py-5">
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
                        <i class="fa fa-upload fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- PPF Tab -->
        <div class="tab-pane fade" id="ppf" role="tabpanel">
            <div class="row" id="ppf-preview"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="upload-preview" onclick="triggerUpload(this)">
                        <input type="file" name="ppf[]" class="d-none" multiple onchange="previewMultipleImages(this, 'ppf-preview')">
                        <i class="fa fa-upload fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Car Tab -->
        <div class="tab-pane fade" id="car" role="tabpanel">
            <div class="row" id="car-preview"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="upload-preview" onclick="triggerUpload(this)">
                        <input type="file" name="car[]" class="d-none" multiple onchange="previewMultipleImages(this, 'car-preview')">
                        <i class="fa fa-upload fa-2x"></i>
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
                        <i class="fa fa-upload fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Upload</button>
</form>


<script>
function previewMultipleImages(input, previewId) {
    const previewContainer = document.getElementById(previewId);
    previewContainer.innerHTML = ''; // Clear previous images
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
</script>


</div>


        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const wrapper = document.getElementById('wrapper');
    const sidebar = document.getElementById('sidebar-wrapper');
    const content = document.getElementById('page-content-wrapper');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('d-none');

        const isMobile = window.innerWidth <= 768; // You can adjust the breakpoint if needed

        if (sidebar.classList.contains('d-none')) {
            content.style.marginLeft = '0';
            content.style.width = '100%';
        } else {
            if (isMobile) {
                content.style.marginLeft = '150px';
                content.style.width = 'calc(100% - 150px)';
            } else {
                content.style.marginLeft = '250px';
                content.style.width = 'calc(100% - 250px)';
            }
        }
    });

    // Dropdown animation
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        toggle.addEventListener('click', (e) => {
            e.preventDefault();

            if (dropdown.classList.contains('open')) {
                dropdown.classList.remove('open');
                dropdown.classList.add('close');
            } else {
                dropdown.classList.remove('close');
                dropdown.classList.add('open');
            }
        });
    });
</script>


<script>
    function triggerUpload(container) {
        const input = container.querySelector('input');
        input.click();
    }

    function previewImage(input) {
        const container = input.closest('.upload-preview');
        const preview = container.querySelector('img');
        const uploadIcon = container.querySelector('i');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                uploadIcon.style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>
