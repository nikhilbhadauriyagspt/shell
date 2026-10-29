<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include ('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $services = $_POST['services'];
    $content = $_POST['content'];

    $imagePaths = [];
    $uploadDir = 'uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
    
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $fileName = $_FILES['images']['name'][$key];
            $fileType = $_FILES['images']['type'][$key];
            $filePath = $uploadDir . basename($fileName);

            // ✅ File type validation
            if (!in_array($fileType, $allowedTypes)) {
                echo "<script>alert('Invalid file type: $fileName'); window.location.href='blogs.php';</script>";
                exit();
            }

            if (move_uploaded_file($tmp_name, $filePath)) {
                $imagePaths[] = $filePath;
            }
        }
    }

    $imagePathsString = implode(',', $imagePaths);

    $sql = "INSERT INTO blogs (title, services, content, images) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $services, $content, $imagePathsString);

    $stmt->close();
    if ($stmt->execute()) {
        echo "<script>alert('Blog posted successfully!'); window.location.href='manage-blog.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
}
?>
