<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';

$id = intval($_GET['id']);
$query = $conn->query("SELECT * FROM blogs WHERE id = $id");
$blog = $query->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $services = $_POST['services'];
    $content = $_POST['content'];
    $new_image_paths = [];
    if (!empty($_FILES['images']['name'][0])) {
        $upload_dir = "uploads/";
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['images']['name'][$key]);
            $file_path = $upload_dir . $file_name;
            
            if (move_uploaded_file($tmp_name, $file_path)) {
                $new_image_paths[] = $file_path;
            }
        }
    }
    $final_image_paths = empty($new_image_paths) ? $blog['image_paths'] : implode(',', $new_image_paths);
    
    $stmt = $conn->prepare("UPDATE blogs SET title = ?, services = ?, content = ?, images = ? WHERE id = ?");
$stmt->bind_param("ssssi", $title, $services, $content, $final_image_paths, $id);


    if ($stmt->execute()) {
        echo "<script>alert('Blog updated successfully!'); window.location.href='manage-blog.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
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
<body style="background-color:#fff">


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

   
<div class="container my-5">
    <h2>Edit Blog</h2>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" value="<?= htmlspecialchars($blog['title']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Services:</label>
            <input type="text" name="services" value="<?= htmlspecialchars($blog['services']) ?>" class="form-control" required>
        </div>

        <!-- <div class="mb-3">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="5" required><?= htmlspecialchars($blog['content']) ?></textarea>
        </div> -->

        <div class="mb-3">
         <label for="description">Description</label>
        <textarea name="content" id="description" cols="30" rows="10"  class="summernote" placeholder="Description"><?= htmlspecialchars($blog['content']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Existing Images:</label><br>
            <?php
            $images = explode(',', $blog['images']);
            foreach ($images as $img) {
                echo "<img src='$img' alt='Blog Image' width='100' height='100' class='me-2'>";
            }
            ?>
        </div>
        <div class="mb-3">
            <label>Upload New Images (Optional):</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
        <a href="manage-blog.php" class="btn btn-secondary">Back to Blogs</a>
    </form>
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
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
           
        });
    });
</script>

</body>
</html>

<?php $conn->close(); ?>
