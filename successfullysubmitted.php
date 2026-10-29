<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!! - Shellcarcare</title>
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
    <link rel="stylesheet" href="assets/css/thanku.css">

    <!-- custom owl caruosel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
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

  



    <div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quoteModalLabel">Book Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process.php" class="custom-form" method="post" id="custom-form">
                        <div class="form-title">
                            <p>FILL IN YOUR DETAILS FOR QUOTES</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" id="user-name" placeholder="Name*" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="tel" name="phone" id="user-phone" placeholder="Mobile*" required
                                        pattern="[0-9()#&amp;+*-=.]+"
                                        title="Only numbers and phone characters (#, -, *, etc) are accepted.">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="user-message" rows="4"
                                        placeholder="Message"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'header.php' ?>

    <section class="thanku">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <img src="assets\images\glassfilm\thank.png" alt="" width="100%">
                </div>
            </div>
        </div>
</section>

<section class="thankumsg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Thank You for Your Submission!</h1>
        <p>Your query has been successfully submitted.</p>
      </div>
    </div>
  </div>
</section>

<section class="thankudetails">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>What's Next?</h2>
        <p>Our team will review your query. <br>You will receive an email confirmation shortly.</p>
      </div>
      <div class="col-md-4">
        <h2>Contact Us</h2>
        <p>If you have any questions or need further assistance, <br>please feel free to <a href="">contact us</a>.</p>
      </div>
      <div class="col-md-4">
        <h2>Explore More</h2>
        <p>While you wait, why not explore our website to learn more <br>about our other services?</p>
      </div>
    </div>
  </div>
</section>



<?php include 'footer.php';?>
