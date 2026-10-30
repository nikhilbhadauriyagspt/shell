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
    $final_image_paths = empty($new_image_paths) ? $blog['images'] : implode(',', $new_image_paths);
    
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
    <title>Edit Blog - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
</head>
<body style="background-color:#fff">

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

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="content" id="description" cols="30" rows="10" class="summernote" placeholder="Description"><?= htmlspecialchars($blog['content']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Existing Images:</label><br>
                    <?php
                    $images = explode(',', $blog['images']);
                    foreach ($images as $img) {
                        if (!empty(trim($img))) {
                            echo "<img src='" . htmlspecialchars(trim($img)) . "' alt='Blog Image' width='100' height='100' class='me-2'>";
                        }
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

    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
        });
    });
</script>
</body>
</html>
<?php $conn->close(); ?>
