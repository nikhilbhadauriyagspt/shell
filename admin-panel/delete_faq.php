<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM faqs WHERE id = $id");
    header("Location: manage_faqs.php");
}
?>
