<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Glassfilm Service in Noida - Shellcarcare</title>
    <meta name="description" content="Protect your vehicle with Shell Automotive's ceramic coating. Enjoy a glossy finish, scratch resistance, and long-lasting shine. Book now!">
    <meta name="keywords" content="Ceramic Coating, Vehicle Protection, Glossy Finish, Scratch Resistance, Long-Lasting Durability">

    <link rel="icon" href="assets/images/logo-web/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo-web/logo.png">
    <!-- bootstrap cdn............................................. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome cnd................................................. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <link rel="stylesheet" href="https://unpkg.com/photoswipe/dist/photoswipe.css">
    <!-- aos cdn ...........................................................-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custom cs........................................................... -->
    <link href="assets/css/style.css" rel="stylesheet"> <!-- Ensure the path is correct -->
    <link href="assets/css/Ceramic.css" rel="stylesheet"> <!-- Ensure the path is correct -->
    <link href="assets/css/index.css" rel="stylesheet"> <!-- Ensure the path is correct -->
    <link href="assets/css/about.css" rel="stylesheet"> <!-- Ensure the path is correct -->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/graphine.css">
    <link rel="stylesheet" href="assets/css/glassfil.css">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11492577036"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11492577036');
</script>

<!-- Phone Call Conversion Tracking -->
<script>
  gtag('config', 'AW-11492577036/zqpDCJqS5O0aEIyei-gq', {
    'phone_conversion_number': '+91 9560595146'
  });
</script>

    <!-- custom owl caruosel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <style>
        .rtjiurh {
    position: absolute !important;
    left: 10% !important;
    top: 40%;
}
    </style>
</head>

<body>

  


    <script>
        // Delay the loading by 4 seconds
        window.onload = function() {
            setTimeout(function() {
                // Hide the loader
                document.getElementById('loader').style.display = 'none';
                // Show the content
                document.getElementById('content').style.display = 'block';
            }, 3000); // 4000 milliseconds = 4 seconds
        };
    </script>

    <?php include 'header.php' ?>

    <section class="carinterior" >
  <img src="assets\images\banner\about-banner.jpg" width="100%" alt="">
        
                <div class="col-md-8 text-start rtjiurh" data-aos="zoom-in" data-aos-duration="1000">
                    <h3><span>NEWS AND UPDATES</span> </h3>
                   </div>
</section>
<?php
include 'admin-panel/config.php';  // Correct path

// Pagination Variables
$limit = 6; // Number of blogs per page
$page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Total blogs count
$result = $conn->query("SELECT COUNT(*) AS total FROM updates");
$total_blogs = $result->fetch_assoc()['total'];
$total_pages = ceil($total_blogs / $limit);

// Blogs fetch query
$sql = "SELECT * FROM updates ORDER BY created_at DESC LIMIT $offset, $limit";
$query = $conn->query($sql);
?>

<section class="update">
    <div class="container">
        <div class="row">
            <?php while ($row = $query->fetch_assoc()): ?>
                <?php 
                    $images = explode(',', $row['image_paths']);
                ?>
                <div class="col-md-4">
                    <div class="bolg-box">
                        <div class="blog-img">
                            <img src="<?php echo $base_url . trim($images[0]); ?>" width="100%" alt="Blog Image">
                        </div>
                        <div class="blog-text">
                            <div class="text-top">
                                <h6><a href="update-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['services']; ?></a></h6>
                                <span><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></span>
                            </div>
                            <h4><a href="update-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                            <p class="limited-text"><?php echo substr($row['content'], 0, 150) . '...'; ?></p>
                            <a class="blog-btn" href="update-detail.php?id=<?php echo $row['id']; ?>">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Previous Button -->
                <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($page - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Next Button -->
                <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($page + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>


    <div class="contact-box">
        <a href="https://wa.me/+919560595146" target="_blank" class="whatsapp-icon" title="Chat with us on WhatsApp">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
        </a>

    </div>
    <div class="call comon_icon">
        <a href="tel:+919560595146" target="_blank">
            <img src="assets/img/telephone.png"></a>
    </div>

    <?php include 'footer.php';?>