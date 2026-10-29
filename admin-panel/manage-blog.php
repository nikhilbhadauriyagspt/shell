  <?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}


include('config.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}if (isset($_GET['delete'])) {  // yaha par delete ko check karo
    $id = $_GET['delete'];

    $sql = "DELETE FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Update deleted successfully!'); window.location.href='manage-blog.php';</script>";
    } else {
        echo "Error deleting Update: " . $conn->error;
    }

    $stmt->close();
}


$result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
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

        <div class="container-fluid p-4">
        

<div class="container my-5">
   
    <div class="d-flex justify-content-between mb-5">
    <h2 class="text-center m-0 ">📝 Manage Blogs</h2>
        <a href="add-blog.php" class="btn btn-success"><i class="fas fa-plus"></i> Add New Blog</a>
    </div>

    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card blog-card h-100">
                <div id="carousel<?= $row['id'] ?>" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $images = explode(',', $row['images']);
                        foreach ($images as $index => $img) {
                            $active = $index === 0 ? 'active' : '';
                            echo "<div class='carousel-item $active'>
                                    <img src='$img' class='d-block w-100' alt='Blog Image'>
                                  </div>";
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?= $row['id'] ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel<?= $row['id'] ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                    <p class="limited-text"><strong>Services:</strong> <?= htmlspecialchars($row['services']) ?></p>
                    
                    <div class="limited-text">
                    <p ><?php echo $row['content'] . '...'; ?></p>
                    
                    </div>
                    <p class="text-muted">Posted on: <?= $row['created_at'] ?></p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="edit_blog.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id'] ?>">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this blog?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="manage-blog.php?delete=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>




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

<?php $conn->close(); ?>