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
                    <h3><span>Explore Our Stunning Gallery</span> </h3>
                    <h5>Experience the perfection of Ceramic & Graphene Coating, PPF protection, and premium Bike makeovers. Browse through our exclusive collection showcasing top-notch craftsmanship and attention to detail.</h5>
                </div>
</section>
<?php
// Database connection
$host = "localhost";
$username = "u490430121_shellautomotiv";    
$password = "Asdf@#%54321";         
$dbname = "u490430121_shellautomotiv";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all images
$sql = "SELECT * FROM gallery";
$result = $conn->query($sql);
$images = [];
while ($row = $result->fetch_assoc()) {
    $images[] = $row;
}
$conn->close();

// Define base URL dynamically
$base_url = "admin-panel/";
?>

<section>
<div class="container">
    <ul class="nav nav-tabs justify-content-center" id="galleryTabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab">All</a></li>
        <li class="nav-item"><a class="nav-link" id="ceramic-tab" data-bs-toggle="tab" href="#ceramic" role="tab">Ceramic/Graphene Coating</a></li>
        <li class="nav-item"><a class="nav-link" id="ppf-tab" data-bs-toggle="tab" href="#ppf" role="tab">PPF</a></li>
        <li class="nav-item"><a class="nav-link" id="bike-tab" data-bs-toggle="tab" href="#bike" role="tab">Bike</a></li>
    </ul>

    <div class="tab-content" id="galleryContent">
        
        <!-- All Images -->
        <div class="tab-pane fade show active" id="all" role="tabpanel">
            <div class="row g-4" data-aos="fade-up">
                <?php foreach ($images as $img): ?>
                    <div class="col-md-4">
                        <a href="<?= $base_url . $img['image_path'] ?>" data-fancybox="gallery">
                            <img src="<?= $base_url . $img['image_path'] ?>" width="100%" alt="<?= $img['category'] ?> Image">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Ceramic -->
        <div class="tab-pane fade" id="ceramic" role="tabpanel">
            <div class="row g-4" data-aos="fade-up">
                <?php foreach ($images as $img): ?>
                    <?php if ($img['category'] === 'Ceramic/Graphene Coating'): ?>
                        <div class="col-md-4">
                            <a href="<?= $base_url . $img['image_path'] ?>" data-fancybox="gallery">
                                <img src="<?= $base_url . $img['image_path'] ?>" width="100%" alt="Ceramic Image">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- PPF -->
        <div class="tab-pane fade" id="ppf" role="tabpanel">
            <div class="row g-4" data-aos="fade-up">
                <?php foreach ($images as $img): ?>
                    <?php if ($img['category'] === 'PPF'): ?>
                        <div class="col-md-4">
                            <a href="<?= $base_url . $img['image_path'] ?>" data-fancybox="gallery">
                                <img src="<?= $base_url . $img['image_path'] ?>" width="100%" alt="PPF Image">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Bike -->
        <div class="tab-pane fade" id="bike" role="tabpanel">
            <div class="row g-4" data-aos="fade-up">
                <?php foreach ($images as $img): ?>
                    <?php if ($img['category'] === 'Bike'): ?>
                        <div class="col-md-4">
                            <a href="<?= $base_url . $img['image_path'] ?>" data-fancybox="gallery">
                                <img src="<?= $base_url . $img['image_path'] ?>" width="100%" alt="Bike Image">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
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

   