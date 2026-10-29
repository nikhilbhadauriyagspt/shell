<?php
 
include 'config.php';



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $services = mysqli_real_escape_string($conn, $_POST['services']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $date = date('Y-m-d H:i:s');

    // Image Upload
    $imagePaths = [];
    $uploadDir = 'uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['images']['name'][$key];
        $file_tmp = $_FILES['images']['tmp_name'][$key];

        $unique_name = uniqid() . '_' . $file_name;  
        $file_path = $uploadDir . $unique_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            $imagePaths[] = $file_path;
        }
    }

    $imagePathsStr = implode(',', $imagePaths);

   
    //upload the image from the content
    
    
    // upload-image.php
    if (isset($_FILES['files']) && $_FILES['files']['error'] == 0) {
        $uploadDir = 'uploads/';
        $fileName = time() . '_' . basename($_FILES['files']['name']);
        $filePath = $uploadDir . $fileName;
        if ($_FILES['files']['size'] > 5242880) {
            echo 'Error: File is too large.';
            exit;
        }
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['files']['type'], $allowedTypes)) {
            echo 'Error: Invalid file type.';
            exit;
        }
        if (move_uploaded_file($_FILES['files']['tmp_name'], $filePath)) {
           // echo $filePath;
        } else {
            echo 'Error: Unable to upload image.';
        }
    } else {
        echo 'Error: No file uploaded.';
    }

   
    // Insert into Database
    $sql = "INSERT INTO blogs (title, services, content, images, created_at) 
            VALUES ('$title', '$services', '$content', '$imagePathsStr', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Blog posted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
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
     <!-- Bootstrap CSS (required for Summernote) -->
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- summernote cdn  -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">


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

        <div class="container py-5">
    <h1 class="text-center text-black">Add Your Blog</h1>
  <!-- Blog Form -->
  <form action="add-blog.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="blogTitle" class="form-label">Blog Title</label>
            <input type="text" class="form-control" id="blogTitle" name="title" required>
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
            <label for="blogImages" class="form-label">Blog Images</label>
            <input type="file" class="form-control" id="blogImages" name="images[]" multiple required>
            <div id="imagePreview" class="preview-container d-flex flex-wrap"></div>
        </div>

        <button type="submit" class="btn btn-primary">Publish Blog</button>
    </form>
</div>


</div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Latest CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>



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
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
           
        });
    });
</script>






<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- summernote script cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>



</body>
</html>




