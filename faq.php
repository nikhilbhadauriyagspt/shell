<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <style>
        .rtjiurh {
    position: absolute !important;
    left: 10% !important;
    top: 40%;
}
    </style>

    <section class="carinterior" >
  <img src="assets\images\banner\about-banner.jpg" width="100%" alt="">
        
                <div class="col-md-8 text-start rtjiurh" data-aos="zoom-in" data-aos-duration="1000">
                    <h3><span>Frequently Asked Questions (FAQ)</span> </h3>
                   </div>
</section>



<?php
include 'admin-panel/config.php'; // Database connection

$sql = "SELECT * FROM faqs ORDER BY created_at DESC";
$query = $conn->query($sql);
?>

<section class="faq-section">
    <?php while ($row = $query->fetch_assoc()): ?>
        <div class="faq-item">
            <div class="faq-question">
                <h3><?php echo htmlspecialchars($row['question']); ?></h3>
                <button class="toggle-btn">+</button>
            </div>
            <div class="faq-answer">
                <p><?php echo nl2br(htmlspecialchars($row['answer'])); ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</section>
    



<?php include 'footer.php';?>

