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
$new_inquiries = $conn->query("SELECT COUNT(*) AS total FROM contact_inquiries WHERE status = 'new'")->fetch_assoc()['total'];
$new_subscrib = $conn->query("SELECT COUNT(*) AS total FROM subscribed_emails WHERE status = 'new'")->fetch_assoc()['total'];
$conn->close();
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

       

<div class="container-fluid p-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <div class="row">

        <!-- Total Blogs -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="manage-blog.php" class="text-decoration-none">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <h5>Total Blogs</h5>
                        <p><?= $blogs ?></p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Gallery Images -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="manage-gallery.php" class="text-decoration-none">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <h5>Gallery Images</h5>
                        <p><?= $images ?></p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Updates -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="manage-update.php" class="text-decoration-none">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <h5>Updates</h5>
                        <p><?= $updates ?></p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Contact Entries -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="contact-entries.php" class="text-decoration-none">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <h5>Contact Entries</h5>
                        <p><?= $inquiries ?></p>
                        <?php if ($new_inquiries > 0): ?>
                            <span class="badge bg-danger">🔔 <?= $new_inquiries ?> New!</span>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        </div>

        <!-- Subscribed Emails (Updated Styling) -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="subscribed_emails.php" class="text-decoration-none">
                <div class="card bg-info text-white h-100"> <!-- Changed to bg-info for distinct color -->
                    <div class="card-body">
                        <h5>Subscribed Emails</h5>
                        <p><?= $subscrib ?></p>
                        <?php if ($new_subscrib > 0): ?>
                            <span class="badge bg-danger">🔔 <?= $new_subscrib ?> New!</span>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
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


</body>
</html>
