<?php
$currentPage = basename($_SERVER['PHP_SELF']);

$bootstrap53Pages = ['index.php', 'about.php', 'services.php'];
$noGraphinePages  = ['index.php', 'about.php', 'services.php', 'ceramic-coating.php', 'ppfcoating.php'];
$glassfilPages    = [
    'blog-details.php', 'blogs.php', 'contact.php', 'faq.php', 'gallery.php',
    'garware-ppf.php', 'glassfilm.php', 'privacy-policy.php',
    'successfullysubmitted.php', 'terms-and-condition.php',
    'update-detail.php', 'updates.php', 'windowfilm.php'
];
$servicePages = [
    'services.php', 'ceramic-coating.php', 'graphene-coating.php', 'garware-ppf.php',
    'glassfilm.php', 'windowfilm.php', 'cardetailingservice.php',
    'exterior-detailing-treatment.php', 'bikedetailing.php', 'denting-and-painting.php',
    'car-interior.php', 'hydrodip.php', 'wrapping.php', 'car-service.php'
];
$morePages = ['gallery.php', 'blogs.php', 'blog-details.php', 'updates.php', 'update-detail.php', 'faq.php'];
?>
    <!-- Favicon -->
    <link rel="icon" href="assets/images/logo-web/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo-web/logo.png">

    <!-- Bootstrap CSS -->
<?php if (in_array($currentPage, $bootstrap53Pages)): ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php else: ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php endif; ?>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Third-Party Plugin CSS -->
    <link rel="stylesheet" href="https://unpkg.com/photoswipe/dist/photoswipe.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
<?php if ($currentPage === 'hydrodip.php'): ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet" />
<?php endif; ?>

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/Ceramic.css" rel="stylesheet">
    <link href="assets/css/index.css" rel="stylesheet">
    <link href="assets/css/about.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
<?php if (!in_array($currentPage, $noGraphinePages)): ?>
    <link href="assets/css/graphine.css" rel="stylesheet">
<?php endif; ?>
<?php if (in_array($currentPage, $glassfilPages)): ?>
    <link href="assets/css/glassfil.css" rel="stylesheet">
<?php endif; ?>
<?php if ($currentPage === 'successfullysubmitted.php'): ?>
    <link href="assets/css/thanku.css" rel="stylesheet">
<?php endif; ?>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11492577036"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-11492577036');
      gtag('config', 'AW-11492577036/zqpDCJqS5O0aEIyei-gq', {
        'phone_conversion_number': '+91 9560595146'
      });
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MTC5V2D7');</script>
    <!-- End Google Tag Manager -->
</head>

<body<?= ($currentPage === 'garware-ppf.php') ? ' class="garware-ppf-page"' : '' ?>>

<div class="contact-box">
  <a href="https://wa.me/+919560595146" target="_blank" class="whatsapp-icon" title="Chat with us on WhatsApp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
  </a>
</div>
<div class="call comon_icon">
  <a href="tel:+919560595146" target="_blank">
    <img src="assets/img/telephone.png" alt="Call Us">
  </a>
</div>

<section class="index-topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="social-cre">
          <ul class="wrapper" style="list-style: none; padding: 0; display: inline-flex; gap: 15px; justify-content: center;">
            <li>
              <a class="icon" href="https://www.facebook.com/profile.php?id=61568488280752" target="_blank">
                <div class="tooltip">Facebook</div>
                <i class="fa-brands fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a class="icon" href="https://www.twitter.com/shellautomotiv" target="_blank">
                <div class="tooltip">Twitter</div>
                <img src="assets/images/ui/twitwr.png" alt="twitter">
              </a>
            </li>
            <li>
              <a class="icon" href="https://www.instagram.com/shell.automotiv" target="_blank">
                <div class="tooltip">Instagram</div>
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a class="icon" href="http://www.linkedin.com/in/shellautomotiv" target="_blank">
                <div class="tooltip">Linkedin</div>
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
            <li>
              <a class="icon" href="https://www.youtube.com/@ShellAutomotiv" target="_blank">
                <div class="tooltip">YouTube</div>
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="index-topcontent">
          <div class="top-btn d-flex justify-content-end">
            <a href="https://wa.me/+919560595146">
              <i class="fa-solid fa-headset"></i>
              LET'S TALK
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<nav class="navbar des-nav index-nav navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand mobile-logo" href="index.php"><img src="assets/images/logo-web/logo.png" width="100%" alt="Shell Automotiv"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'index.php') ? 'active' : '' ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'about.php') ? 'active' : '' ?>" href="about.php">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= in_array($currentPage, $servicePages) ? 'active' : '' ?>" href="services.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="services.php">All Services</a></li>
            <li><a class="dropdown-item" href="ceramic-coating.php">Ceramic Coating</a></li>
            <li><a class="dropdown-item" href="graphene-coating.php">Graphene Coating</a></li>
            <li><a class="dropdown-item" href="garware-ppf.php">Garware PPF</a></li>
            <li><a class="dropdown-item" href="glassfilm.php">Glass Film</a></li>
            <li><a class="dropdown-item" href="windowfilm.php">Window Film</a></li>
            <li><a class="dropdown-item" href="cardetailingservice.php">Car Detailing Services</a></li>
            <li><a class="dropdown-item" href="exterior-detailing-treatment.php">Exterior Detailing Treatment</a></li>
            <li><a class="dropdown-item" href="bikedetailing.php">Bike Detailing Services</a></li>
            <li><a class="dropdown-item" href="denting-and-painting.php">Denting and Painting</a></li>
            <li><a class="dropdown-item" href="car-interior.php">Interior Customisation</a></li>
            <li><a class="dropdown-item" href="hydrodip.php">Hydrodip</a></li>
            <li><a class="dropdown-item" href="wrapping.php">Wrapping</a></li>
            <li><a class="dropdown-item" href="car-service.php">Car Service & Repair</a></li>
          </ul>
        </li>
      </ul>
      <a class="navbar-brand desktop-logo" href="index.php"><img src="assets/images/logo-web/logo.png" width="100%" alt="Shell Automotiv"></a>
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'ppfcoating.php') ? 'active' : '' ?>" href="ppfcoating.php">Paint Protection Film</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= in_array($currentPage, $morePages) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="gallery.php">Gallery</a></li>
            <li><a class="dropdown-item" href="blogs.php">Blogs</a></li>
            <li><a class="dropdown-item" href="updates.php">Updates</a></li>
            <li><a class="dropdown-item" href="faq.php">FAQ</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'contact.php') ? 'active' : '' ?>" href="contact.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar mob-nav index-nav navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand mobile-logo" href="index.php"><img src="assets/images/logo-web/logo.png" width="100%" alt="Shell Automotiv"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScrollMobile"
      aria-controls="navbarScrollMobile" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fa-solid fa-bars" style="font-size: 25px; color: #fff; margin-top: 3px;"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScrollMobile">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 400px;">
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'index.php') ? 'active' : '' ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'about.php') ? 'active' : '' ?>" href="about.php">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= in_array($currentPage, $servicePages) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="services.php">All Services</a></li>
            <li><a class="dropdown-item" href="ceramic-coating.php">Ceramic Coating</a></li>
            <li><a class="dropdown-item" href="graphene-coating.php">Graphene Coating</a></li>
            <li><a class="dropdown-item" href="garware-ppf.php">Garware PPF</a></li>
            <li><a class="dropdown-item" href="glassfilm.php">Glass Film</a></li>
            <li><a class="dropdown-item" href="windowfilm.php">Window Film</a></li>
            <li><a class="dropdown-item" href="cardetailingservice.php">Car Detailing Services</a></li>
            <li><a class="dropdown-item" href="exterior-detailing-treatment.php">Exterior Detailing Treatment</a></li>
            <li><a class="dropdown-item" href="bikedetailing.php">Bike Detailing Services</a></li>
            <li><a class="dropdown-item" href="denting-and-painting.php">Denting and Painting</a></li>
            <li><a class="dropdown-item" href="car-interior.php">Interior Customisation</a></li>
            <li><a class="dropdown-item" href="hydrodip.php">Hydrodip</a></li>
            <li><a class="dropdown-item" href="wrapping.php">Wrapping</a></li>
            <li><a class="dropdown-item" href="car-service.php">Car Service & Repair</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'ppfcoating.php') ? 'active' : '' ?>" href="ppfcoating.php">Paint Protection Film</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'gallery.php') ? 'active' : '' ?>" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= in_array($currentPage, ['blogs.php', 'blog-details.php']) ? 'active' : '' ?>" href="blogs.php">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= in_array($currentPage, ['updates.php', 'update-detail.php']) ? 'active' : '' ?>" href="updates.php">Updates</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'faq.php') ? 'active' : '' ?>" href="faq.php">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage === 'contact.php') ? 'active' : '' ?>" href="contact.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.dropdown-toggle').forEach(function(dropdownToggle) {
      dropdownToggle.addEventListener('click', function() {
        const dropdownMenu = this.nextElementSibling;
        if (dropdownMenu && dropdownMenu.classList.contains('show')) {
          const instance = bootstrap.Dropdown.getInstance(this);
          if (instance) {
            instance.hide();
          }
        }
      });
    });
  });
</script>

<!-- Common Get A Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Get A Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process.php" method="post" class="custom-form" id="contactForm">
                    <div class="form-title">
                        <p>FILL IN YOUR DETAILS FOR QUOTES</p>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Your Phone Number" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6Lfvis8rAAAAADH4uPrLG2kDN4uYX1WUmbwWLK5F"></div>
                    <div class="form-error-msg" id="errorMsg" style="color: red; display: none; margin-top: 10px;"></div>
                    <div class="form-group">
                        <button type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
