



<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $services = mysqli_real_escape_string($conn, $_POST['services']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $date = date('Y-m-d H:i:s');

    // Handle image uploads
    $imagePaths = [];
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $file_name = basename($_FILES['images']['name'][$key]);
        $file_tmp = $_FILES['images']['tmp_name'][$key];
        $unique_name = uniqid() . '_' . $file_name;
        $file_path = $uploadDir . $unique_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            $imagePaths[] = $file_path;
        }
    }

    $imagePathsStr = implode(',', $imagePaths);

    $sql = "INSERT INTO updates (title, services, content, image_paths, created_at) 
            VALUES ('$title', '$services', '$content', '$imagePathsStr', '$date')";

    if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Updated Post Successfully');
        window.location.href = 'manage-update.php';
    </script>";
    exit;
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
}
}
?>
