<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include('config.php');

// Delete image logic
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);

    // Fetch image path
    $result = $conn->query("SELECT image_path FROM gallery WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];

        // Delete image file from server
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete from database
        $conn->query("DELETE FROM gallery WHERE id = $id");

        // Redirect back to the gallery page
        header("Location: manage-gallery.php?deleted=1");
        exit();
    }
}

// Fetch images grouped by category
$categories = ['Ceramic/Graphene Coating', 'PPF', 'Bike'];
$images = [];

foreach ($categories as $category) {
    $stmt = $conn->prepare("SELECT * FROM gallery WHERE category = ? ORDER BY uploaded_at DESC");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $images[$category] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}

// Fetch all images for "All Images" tab
$all_result = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
$all_images = $all_result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery - Admin Panel</title>
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

        <div class="container py-5">
            <div class="d-flex justify-content-between mb-5">
                <h2 class="text-center m-0">📝 Manage Gallery</h2>
                <a href="add-gallery.php" class="btn btn-success"><i class="fas fa-plus"></i> Add New Gallery</a>
            </div>

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
                                            <img src="<?= htmlspecialchars($img['image_path']) ?>" class="card-img-top" alt="Image">
                                            <div class="card-body">
                                                <p class="card-text"><?= ucfirst(htmlspecialchars($img['category'])) ?></p>
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
                                            <img src="<?= htmlspecialchars($img['image_path']) ?>" class="card-img-top" alt="Image">
                                            <div class="card-body">
                                                <p class="card-text"><?= ucfirst(htmlspecialchars($img['category'])) ?></p>
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
                                            <img src="<?= htmlspecialchars($img['image_path']) ?>" class="card-img-top" alt="Image">
                                            <div class="card-body">
                                                <p class="card-text"><?= ucfirst(htmlspecialchars($img['category'])) ?></p>
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
                                            <img src="<?= htmlspecialchars($img['image_path']) ?>" class="card-img-top" alt="Image">
                                            <div class="card-body">
                                                <p class="card-text"><?= ucfirst(htmlspecialchars($img['category'])) ?></p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
