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
        <div class="d-flex justify-content-between mb-5">
    <h2 class="text-center m-0 ">📝 Manage Gallery</h2>
        <a href="add-gallery.php" class="btn btn-success"><i class="fas fa-plus"></i> Add New Gallery</a>
    </div>
   
    <?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include ('config.php');

// Delete image logic
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Fetch image path
    $result = $conn->query("SELECT image_path FROM gallery WHERE id = $id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];

        // Delete image file from server
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete from database
        $conn->query("DELETE FROM gallery WHERE id = $id");

        // Redirect back to the gallery page
        header("Location:manage-gallery.php?deleted=1");
        exit();
    }
}

// Fetch images grouped by category
$categories = ['Ceramic/Graphene Coating', 'PPF', 'Bike'];
$images = [];
$all_images = [];

foreach ($categories as $category) {
    $stmt = $conn->prepare("SELECT * FROM gallery WHERE category = ? ORDER BY uploaded_at DESC");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $images[$category] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Fetch all images for "All Images" tab
$all_result = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
$all_images = $all_result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!-- Bootstrap Tabs -->
<div class="container mt-4">
    <ul class="nav nav-tabs" id="galleryTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">All Images</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ceramic-tab" data-bs-toggle="tab" data-bs-target="#ceramic" type="button" role="tab">Ceramic/Graphene Coating</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ppf-tab" data-bs-toggle="tab" data-bs-target="#ppf" type="button" role="tab">PPF</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="bike-tab" data-bs-toggle="tab" data-bs-target="#bike" type="button" role="tab">Bike</button>
        </li>
    </ul>

    <div class="tab-content" id="galleryTabsContent">
        <!-- All Images Tab -->
        <div class="tab-pane fade show active" id="all" role="tabpanel">
            <div class="row mt-3">
                <?php if (!empty($all_images)) { ?>
                    <?php foreach ($all_images as $img) { ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="<?= $img['image_path'] ?>" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <p class="card-text"><?= ucfirst($img['category']) ?></p>
                                    <a href="?delete_id=<?= $img['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-muted">No images available.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Ceramic Tab -->
        <div class="tab-pane fade" id="ceramic" role="tabpanel">
            <div class="row mt-3">
                <?php if (!empty($images['Ceramic/Graphene Coating'])) { ?>
                    <?php foreach ($images['Ceramic/Graphene Coating'] as $img) { ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="<?= $img['image_path'] ?>" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <p class="card-text"><?= ucfirst($img['category']) ?></p>
                                    <a href="?delete_id=<?= $img['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-muted">No images available in this category.</p>
                <?php } ?>
            </div>
        </div>

        <!-- PPF Tab -->
        <div class="tab-pane fade" id="ppf" role="tabpanel">
            <div class="row mt-3">
                <?php if (!empty($images['PPF'])) { ?>
                    <?php foreach ($images['PPF'] as $img) { ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="<?= $img['image_path'] ?>" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <p class="card-text"><?= ucfirst($img['category']) ?></p>
                                    <a href="?delete_id=<?= $img['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-muted">No images available in this category.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Bike Tab -->
        <div class="tab-pane fade" id="bike" role="tabpanel">
            <div class="row mt-3">
                <?php if (!empty($images['Bike'])) { ?>
                    <?php foreach ($images['Bike'] as $img) { ?>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="<?= $img['image_path'] ?>" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <p class="card-text"><?= ucfirst($img['category']) ?></p>
                                    <a href="?delete_id=<?= $img['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-muted">No images available in this category.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

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
