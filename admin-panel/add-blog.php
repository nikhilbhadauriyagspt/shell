<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $services = mysqli_real_escape_string($conn, $_POST['services']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $date = date('Y-m-d H:i:s');

    $imagePaths = [];
    $uploadDir = 'uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['images']['tmp_name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['images']['name'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];

            $unique_name = uniqid() . '_' . $file_name;  
            $file_path = $uploadDir . $unique_name;

            if (move_uploaded_file($file_tmp, $file_path)) {
                $imagePaths[] = $file_path;
            }
        }
    }

    $imagePathsStr = implode(',', $imagePaths);

    $sql = "INSERT INTO blogs (title, services, content, images, created_at) 
            VALUES ('$title', '$services', '$content', '$imagePathsStr', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Blog posted successfully!'); window.location.href='manage-blog.php';</script>";
        exit();
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
    <title>Add Blog - Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex" id="wrapper">

    <?php include 'sidebar.php'; ?>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button class="btn" id="menu-toggle" title="Toggle Sidebar"><i class="fas fa-bars"></i></button>
                <span class="fw-semibold text-secondary d-none d-sm-inline">Blog Management</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="fas fa-user-shield text-danger"></i> <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?>
                </span>
                <a href="logout.php" class="btn logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <div class="admin-surface-card" style="max-width: 960px; margin: 0 auto;">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom gap-2">
                    <div>
                        <h2 class="mb-1">Create New Blog Post</h2>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Write and publish an article to the website blog section</p>
                    </div>
                    <a href="manage-blog.php" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3">
                        <i class="fas fa-arrow-left me-1"></i> Manage Blogs
                    </a>
                </div>

                <form action="add-blog.php" method="POST" enctype="multipart/form-data">
                    <div class="row g-3 mb-3">
                        <div class="col-md-7">
                            <label for="blogTitle" class="form-label">Blog Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="blogTitle" name="title" placeholder="e.g. Benefits of Ceramic Coating for Your Car" required>
                        </div>

                        <div class="col-md-5">
                            <label for="services" class="form-label">Service Category <span class="text-danger">*</span></label>
                            <select class="form-select" id="services" name="services" required>
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
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Article Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="description" cols="30" rows="10" class="summernote" placeholder="Write your blog content here..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Featured Images <span class="text-danger">*</span></label>
                        <div class="upload-preview" style="height: 140px;" onclick="document.getElementById('blogImages').click()">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                            <span class="fw-semibold" style="font-size: 14px;">Click to browse and upload blog images</span>
                            <span class="text-muted small">Supports JPG, PNG, WEBP (Multiple allowed)</span>
                            <input type="file" class="d-none" id="blogImages" name="images[]" multiple required>
                        </div>
                        <div id="imagePreview" class="preview-container d-flex flex-wrap mt-2"></div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="manage-blog.php" class="btn btn-light border px-4">Cancel</a>
                        <button type="submit" class="btn btn-dark px-4"><i class="fas fa-paper-plane me-2"></i>Publish Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
    document.getElementById('blogImages').addEventListener('change', function() {
        const preview = document.getElementById('imagePreview');
        preview.innerHTML = '';
        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

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
            content.style.marginLeft = isMobile ? '0' : '260px';
            content.style.width = isMobile ? '100%' : 'calc(100% - 260px)';
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
            height: 280,
            placeholder: 'Write detailed blog content here...'
        });
    });
</script>
</body>
</html>