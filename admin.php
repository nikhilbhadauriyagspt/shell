<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
require 'config.php';

// Handle delete actions
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $table = $_POST['table'];
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id = ?");
    $stmt->execute([$id]);
    exit(json_encode(['success' => true]));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    body { background: #000; color: #00B500; }
    .card { background: #1c1c1c; color: #fff; }
    img { max-width: 100px; max-height: 100px; }
</style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Admin Panel</h1>
    <a href="logout.php" class="btn btn-danger">Logout</a>

    <!-- Gallery Section -->
    <div class="card mt-4">
        <div class="card-header">Gallery</div>
        <div class="card-body">
            <form id="galleryForm" enctype="multipart/form-data">
                <input type="file" name="gallery[]" multiple required>
                <select name="category" required>
                    <option value="all">All</option>
                    <option value="car">Car</option>
                    <option value="bike">Bike</option>
                    <option value="ppf">PPF</option>
                </select>
                <button type="submit" class="btn btn-success">Upload</button>
            </form>
            <div id="galleryList" class="mt-4">
                <!-- Gallery Images will load here -->
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div class="card mt-4">
        <div class="card-header">Blog</div>
        <div class="card-body">
            <form id="blogForm" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="content" placeholder="Content" required></textarea>
                <input type="file" name="images[]" multiple required>
                <button type="submit" class="btn btn-success">Publish</button>
            </form>
            <div id="blogList" class="mt-4">
                <!-- Blog posts will load here -->
            </div>
        </div>
    </div>

    <!-- Updates Section -->
    <div class="card mt-4">
        <div class="card-header">Updates</div>
        <div class="card-body">
            <form id="updateForm" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="content" placeholder="Content" required></textarea>
                <input type="file" name="image" required>
                <button type="submit" class="btn btn-success">Add Update</button>
            </form>
            <div id="updateList" class="mt-4">
                <!-- Updates will load here -->
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Load all sections on page load
    loadGallery();
    loadBlog();
    loadUpdates();

    // Handle delete actions
    $(document).on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        const table = $(this).data('table');
        $.post('', { delete: true, id: id, table: table }, function (response) {
            loadGallery();
            loadBlog();
            loadUpdates();
        });
    });

    // Gallery Upload
    $('#galleryForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: 'upload_gallery.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                loadGallery();
            }
        });
    });

    // Blog Upload
    $('#blogForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: 'upload_blog.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                loadBlog();
            }
        });
    });

    // Updates Upload
    $('#updateForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: 'upload_update.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                loadUpdates();
            }
        });
    });

    // Load functions
    function loadGallery() {
        $('#galleryList').load('load_gallery.php');
    }
    function loadBlog() {
        $('#blogList').load('load_blog.php');
    }
    function loadUpdates() {
        $('#updateList').load('load_updates.php');
    }
});
</script>
</body>
</html>
