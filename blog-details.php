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
                    <h3><span>Blog Detail</span> </h3>
                   </div>
</section>
<?php
include 'admin-panel/config.php';  // Correct path

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM blogs WHERE id = $id");
    $blog = $result->fetch_assoc();
    $images = explode(',', $blog['images']);
} else {
    echo "Blog not found!";
    exit;
}
?>

<section class="blog-deatils">
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="bolg-box">
                <!-- Main Image -->
                <div class="blog-img">
                    <img src="<?php echo $base_url . trim($images[0]); ?>" width="100%" alt="Main Blog Image">
                </div>

               
               
                <div class="blog-text">
                    <div class="text-top">
                        <h6><?php echo $blog['services']; ?></h6>
                        <span><?php echo date('d/m/Y', strtotime($blog['created_at'])); ?></span>
                    </div>
                    <h4><?php echo $blog['title']; ?></h4>
                    <p><?php echo nl2br($blog['content']); ?></p>
                    
                </div>
            </div>
        </div>

        <!-- Multiple Images on the Right -->
        <div class="col-md-3">
            <?php foreach (array_slice($images, 1) as $img): ?>
                <div class="details-img mb-3">
                    <img src="<?php echo $base_url . trim($img); ?>" width="100%" alt="Blog Image">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</section>
    



<?php include 'footer.php';?>

  