<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include('config.php');
// Folder where images will be uploaded
$upload_dir = "uploads/";

// Category mapping
$category_mapping = [
    'all' => 'All',
    'ppf' => 'Ceramic/Graphene Coating',
    'car' => 'PPF',
    'bike' => 'Bike'
];

// Allowed file types
$allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

foreach ($category_mapping as $key => $category_name) {
    if (!empty($_FILES[$key]['name'][0])) {

        foreach ($_FILES[$key]['tmp_name'] as $index => $tmp_name) {

            $file_name = $_FILES[$key]['name'][$index];
            $file_tmp = $_FILES[$key]['tmp_name'][$index];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            // Validate file type
            if (in_array($file_ext, $allowed_types)) {
                
                // Unique and readable filename
                $new_file_name = uniqid('img_', true) . "." . $file_ext;
                $file_path = $upload_dir . $new_file_name;

                // Move file to server
                if (move_uploaded_file($file_tmp, $file_path)) {

                    // Insert into database with timestamp
                    $stmt = $conn->prepare("INSERT INTO gallery (category, image_path, uploaded_at) VALUES (?, ?, NOW())");
                    $stmt->bind_param("ss", $category_name, $file_path);
                    $stmt->execute();
                }
            }
        }
    }
}

// Close DB connection
$conn->close();
header("Location:manage-gallery.php");
exit();
?>
