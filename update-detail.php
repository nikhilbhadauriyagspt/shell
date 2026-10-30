<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Glassfilm Service in Noida - Shellcarcare</title>
    <meta name="description" content="Protect your vehicle with Shell Automotive's ceramic coating. Enjoy a glossy finish, scratch resistance, and long-lasting shine. Book now!">
    <meta name="keywords" content="Ceramic Coating, Vehicle Protection, Glossy Finish, Scratch Resistance, Long-Lasting Durability">
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
                    <h3><span>Updates Detail</span> </h3>
                   </div>
</section>
<?php
include 'admin-panel/config.php';  // Correct path

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM updates WHERE id = $id");
    $blog = $result->fetch_assoc();
    $images = explode(',', $blog['image_paths']);
} else {
    echo "Blog not found!";
    exit;
}
?>
<section class="inboll">
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
                    <h4 class="uppd"><?php echo $blog['title']; ?></h4>
                    <p><?php echo nl2br($blog['content']); ?></p>
                </div>
            </div>
        </div>

        <!-- Multiple Images on the Right -->
        <div class="col-md-3">
        <div class="recent-blog border">
                <div class="blog-head">
                    <h3>Recent Updates</h3>
                </div>
           

        <?php
                $recent_query = $conn->query("SELECT * FROM updates ORDER BY created_at DESC LIMIT 5");
                while ($recent = $recent_query->fetch_assoc()):
                    $recent_images = explode(',', $recent['image_paths']);
                ?>
                <div class="bolg-box">
                    <div class="blog-img">
                        <img src="<?php echo $base_url . trim($recent_images[0]); ?>" width="100%" alt="Recent Blog">
                    </div>
                    <div class="blog-text">
                        <div class="text-top">
                        <h6><a href="blog-details.php?id=<?php echo $recent['id']; ?>"><?php echo $recent['services']; ?></a></h6>
                        <span><?php echo date('d/m/Y', strtotime($recent['created_at'])); ?></span>
                      
                        </div>
                        <h4><a href="blog-details.php?id=<?php echo $recent['id']; ?>"><?php echo $recent['title']; ?></a></h4>
                    </div>
                </div>
                <?php endwhile; ?>
                
                 

            </div>
        </div>
    </div>
</div>


</section>

    


    <?php include 'footer.php';?>