<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Automotive Care Tips, Guides & Insights | Blog - Shellcarcare</title>

<meta name="description" content="Explore expert tips, in-depth guides, and the latest updates on automotive detailing, ceramic coating, PPF, and vehicle care from Shellcarcare. Stay informed and keep your vehicle in top condition.">

<meta name="keywords" content="Car Care Blog, Bike Detailing Tips, Ceramic Coating Guide, PPF Information, Vehicle Protection Tips, Automotive News, Shellcarcare Blog, Auto Detailing Insights, Car Maintenance Tips, Vehicle Shine Tips">

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



<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MTC5V2D7');</script>
<!-- End Google Tag Manager -->


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

  