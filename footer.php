




  <section class="neww">
    <div class="container">
      <div class="row fdgfdh">
        <div class="col-md-7">
          <div class="news-box">
            <h2>Subscribe</h2>
            <p>
              Transform your ride with Shell Automotiv's expert detailing—clean, polish, and restore to perfection!
            </p>
          </div>
        </div>
      
        <div class="col-md-5">
          <div class="news-form">
          <?php
          if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["subscribe_email"])) {
              $sub_email = filter_var(trim($_POST["subscribe_email"]), FILTER_SANITIZE_EMAIL);
              if (filter_var($sub_email, FILTER_VALIDATE_EMAIL)) {
                  include "admin-panel/config.php";
                  if (isset($conn) && !$conn->connect_error) {
                      $stmt_sub = $conn->prepare("INSERT INTO subscribed_emails (email, status) VALUES (?, 'new')");
                      if ($stmt_sub) {
                          $stmt_sub->bind_param("s", $sub_email);
                          $stmt_sub->execute();
                          $stmt_sub->close();
                      }
                      $conn->close();
                      echo "<script>alert('Thank you for subscribing!');</script>";
                  }
              }
          }
          ?>
          <form action="" method="POST">
        <input type="email" name="subscribe_email" placeholder="Enter Your Mail" required>
        <button type="submit">Submit Now</button>
        </form>
      

   
          </div>
        </div>
      </div>
    </div>
  </section>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="footer-box">
          <img src="assets/images/logo-web/creatine-logo.png" width="100%" alt="">
          <p>Experience top-tier detailing with Shell Automotiv—cleaning, polishing, and restoring your vehicle to perfection.</p>
          <div class="soci-icon">
            <!-- Facebook -->
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>

            <!-- Twitter -->
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>

            <!-- Instagram -->
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>

            <!-- LinkedIn -->
            <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>

            <!-- YouTube -->
            <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>

          </div>
        </div>
      </div>
  <div class="col-md-5">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="footer-box">
          <h4>
            Quick links
          </h4>
          <ul>
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="about.php">About Us</a>
            </li>
            <li>
              <a href="blogs.php">Blog </a>
            </li>
            <li>
              <a href="updates.php">Update </a>
            </li>
            <li>
              <a href="gallery.php">Our Gallery</a>
            </li>
            <li>
              <a href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-5">
        <div class="footer-box">
          <h4>
           Our Services
          </h4>
          <ul>
          <li><a  href="services.php">All Services</a></li>
              <li><a  href="ceramic-coating.php">Ceramic Coating</a></li>
              <li><a  href="graphene-coating.php">Graphene Coating</a></li>
              <li><a  href="glassfilm.php">Glass Film</a></li>
              <li><a  href="cardetailingservice.php">Car Detailing Services</a></li>
              <li><a  href="bikedetailing.php">Bike Detailing Services</a></li>
              <li><a  href="denting-and-painting.php">Denting and Painting</a></li>
              <li><a  href="car-interior.php">Interior Customisation</a></li>
              <li><a  href="hydrodip.php">Hydrodip</a></li>
              <li><a  href="wrapping.php">Wrapping</a></li>
              <li><a  href="car-service.php">Car Service & Repair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
   <div class="footer-box">
    <h4>
      Our Gallery
    </h4>
    <ul class="containergrid1">
      <li><img src="assets/images/gallery/eath.jpg" alt="" width="100%"></li>
      <li><img src="assets/images/gallery/first.jpg" alt="" width="100%"></li>
      <li><img src="assets/images/gallery/five.jpg" alt="" width="100%"></li>
    </ul>
    <ul class="containergrid1 mt-3">
      <li><img src="assets/images/gallery/fourth.jpg" alt="" width="100%"></li>
      <li><img src="assets/images/gallery/seven.jpg" alt="" width="100%"></li>
      <li><img src="assets/images/gallery/six.jpg" alt="" width="100%"></li>
    </ul>
   </div>
  </div>
    </div>
  </div>
  <div class="container">
    <div class="row foot-line">
      <div class="col-md-6">
        <div class="footer-bottom">
          <p>© 2024 Shell Automotiv is powered by <a href="www.successsign.com" target="_blank">Success Sign</a> Brands are the property of their respective owners.</p>
        </div>
      </div>
      <div class="col-md-6 text-end">
      <div class="footer-right">
        <a href="privacy-policy.php">
          Privacy Policy
       </a>
       <a href="terms-and-condition.php">
           Term & condition
       </a>
      </div>
      </div>
    </div>
  </div>
</footer>

    <!-- jquery ...........................................................     -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
    <!-- bootstrap js............................................................... -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- aos animation js cdn ........................................................-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/photoswipe/dist/photoswipe.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    

  <!-- custom JS -->
  <script src="assets/js/custom.js"></script>
  
  
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTC5V2D7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  
<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6761303c49e2fd8dfef95350/1if9q8rjr';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->

<!--End of Tawk.to Script-->
  <script>
    $(document).ready(function () {
      $('.blog-slide').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        autoplay: true,
        dots: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 3
          }
        }
      });
    });
    $(document).ready(function () {
      $('.logo-slide').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        dots: true,
        responsive: {
          0: {
            items: 3
          },
          600: {
            items: 3
          },
          1000: {
            items: 6
          }
        }
      });
    });
    $(document).ready(function () {
      $('.partner-slide').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 4
          }
        }
      });
    });
    $(document).ready(function () {
      $('.why-slide').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        responsive: {
          0: {
            items: 2
          },
          600: {
            items: 2
          },
          1000: {
            items: 4
          }
        }
      });
    });


  </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var video = document.getElementById("myVideo");
        var poster = document.getElementById("posterImage");

        video.oncanplaythrough = function () {
            poster.style.display = "none";  // Hide poster when video is ready
            video.style.display = "block";  // Show video
            video.play(); // Auto-play
        };
    });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("serviceModal");
    const modalTitle = modal.querySelector(".modal-title");
    const modalBody = modal.querySelector(".modal-body");

    document.querySelectorAll(".learn-more-btn").forEach(button => {
        button.addEventListener("click", function () {
            const title = this.getAttribute("data-title");
            const content = this.getAttribute("data-content");

            modalTitle.innerHTML = title;   // Title as plain text
            modalBody.innerHTML = content;    // Content as HTML
        });
    });
});
</script>
<script>
  document.querySelectorAll('.faq-item').forEach((item) => {
    item.addEventListener('click', () => {
      item.classList.toggle('open');
      
    });
  });
</script>
<script>
     function toggleContent() {
        const moreText = document.getElementById("more");
        const readMoreLink = document.getElementById("readMore");

        if (moreText.classList.contains("hidden")) {
            moreText.classList.remove("hidden");
            readMoreLink.textContent = "...read less";
        } else {
            moreText.classList.add("hidden");
            readMoreLink.textContent = "...read more";
        }
    }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("serviceModal");
    const modalTitle = modal.querySelector(".modal-title");
    const modalBody = modal.querySelector(".modal-body");

    document.querySelectorAll(".learn-more-btn").forEach(button => {
        button.addEventListener("click", function () {
            const title = this.getAttribute("data-title");
            const content = this.getAttribute("data-content");

            modalTitle.innerHTML = title;   // Title as plain text
            modalBody.innerHTML = content;    // Content as HTML
        });
    });
});
</script>
<script>
        // Function to close the popup
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        // If popup is set, show it
        <?php if ($showPopup): ?>
            document.getElementById('popup').style.display = 'flex';
        <?php endif; ?>
    </script>
    <script>
    // Initialize AOS
    AOS.init();

    // Initialize LightGallery
    lightGallery(document.getElementById('allGallery'));
    lightGallery(document.getElementById('ceramicGallery'));
    lightGallery(document.getElementById('ppfGallery'));
    lightGallery(document.getElementById('bikeGallery'));



    document.querySelectorAll('.faq-item').forEach((item) => {
    item.addEventListener('click', () => {
      item.classList.toggle('open');
      
    });
  });


  const slider = document.getElementById('slider');
  const divisor = document.getElementById('divisor');
  const circleHandle = document.getElementById('circle-handle');

  function moveDivisor() {
    const value = slider.value;
    divisor.style.width = value + '%';
    
    // Circle handle ko center me move karna
    circleHandle.style.left = value + '%';
  }
</script>

<!-- Submit & WhatsApp Conversion Tracking -->
<script>
  // Track ceramic coating form submission
  document.querySelectorAll('.ceramic-submit-success').forEach(form => {
    form.addEventListener('submit', function() {
      gtag('event', 'conversion', {'send_to': 'AW-11492577036/yo-KCJe_5O0aEIyei-gq'});
    });
  });

  // Track PPF form submission
  document.querySelectorAll('.ppf-submit-success').forEach(form => {
    form.addEventListener('submit', function() {
      gtag('event', 'conversion', {'send_to': 'AW-11492577036/F0-rCJ6g5O0aEIyei-gq'});
    });
  });

  // Track WhatsApp button click
  document.querySelectorAll('.whatsapp-button').forEach(btn => {
    btn.addEventListener('click', function() {
      gtag('event', 'conversion', {'send_to': 'AW-11492577036/WGZbCL2f5O0aEIyei-gq'});
    });
  });
</script>


           <!-- Google reCAPTCHA & Universal Contact Form Handler -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form[action="process.php"]');

    forms.forEach(function(form) {
        // Ensure an error message container exists inside each form
        let errorBox = form.querySelector('.form-error-msg, #errorMsg');
        if (!errorBox) {
            errorBox = document.createElement('div');
            errorBox.className = 'form-error-msg';
            errorBox.style.cssText = 'color: #dc2626; font-weight: 500; display: none; margin: 10px 0;';
            const submitBtn = form.querySelector('button[type="submit"], button');
            if (submitBtn) {
                submitBtn.parentNode.insertBefore(errorBox, submitBtn);
            } else {
                form.appendChild(errorBox);
            }
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            errorBox.style.display = 'none';

            const formData = new FormData(form);
            const recaptchaToken = formData.get('g-recaptcha-response');

            if (!recaptchaToken || recaptchaToken.trim().length === 0) {
                errorBox.textContent = 'Please check the reCAPTCHA to submit the form!';
                errorBox.style.display = 'block';
                const recaptchaEl = form.querySelector('.g-recaptcha');
                if (recaptchaEl) recaptchaEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"], button');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Sending...';
            }

            fetch('process.php', {
                method: 'POST',
                body: formData
            })
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data.error) {
                    errorBox.textContent = data.error;
                    errorBox.style.display = 'block';
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                } else {
                    window.location.href = 'successfullysubmitted.php';
                }
            })
            .catch(function(err) {
                errorBox.textContent = 'Something went wrong. Please try again!';
                errorBox.style.display = 'block';
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
                console.error('Form error:', err);
            });
        });
    });
});
</script>

</body>

</html>