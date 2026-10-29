<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
include('config.php');

// Fetch existing data
$result = $conn->query("SELECT * FROM updates ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/mfgp8vxsf2ntfta1e8r4hhmrul7gbtko1j14j805pu9fedcc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 (optional but recommended for styling) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
</head>
<body>

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
                    <li><a class="dropdown-item" href="add-faq.php">Add FAQ</a></li>
                    <li><a class="dropdown-item" href="manage-faqs.php">Manage FAQ</a></li>
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

       
<div class="container mt-5">
    <h2 class="mb-4">Add Updates</h2>

    <!-- Form -->
    <form action="upload_update.php" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="title" class="form-label">Update Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="services" class="form-label">Select Service</label>
            <select class="form-control" id="services" name="services" required>
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

        <div class="mb-3">
         <label for="description">Description</label>
        <textarea name="content" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Upload Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple required>
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>

    <hr class="my-5">

    
</div>


</div>
    </div>
</div>

<script>
    tinymce.init({
        selector: '#blogContent',
        height: 500,
        plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: 'css/content.css'
    });

    const blogImages = document.getElementById('blogImages');
    const imagePreview = document.getElementById('imagePreview');

    blogImages.addEventListener('change', () => {
        imagePreview.innerHTML = '';
        Array.from(blogImages.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });
</script>
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

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
           
        });
    });
</script>

</body>
</html>



<?php $conn->close(); ?>