<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>

    <section class="carinterior" >
  <img src="assets/img/contact/contact.png" width="100%" alt="">
        
                <div class="col-md-8 text-end rtjiurh" data-aos="zoom-in" data-aos-duration="1000">
                    <h3><span>Needs Help? Let's Get In Touch</span> </h3>
                    <h5>We are here to assist you with all your needs. <br>Get in touch with us for any inquiries, support, or suggestions!</h5>
                </div>
</section>


<div class="container">    
    <div class="row">
        <div class="col-md-4">
             <a href="<?= htmlspecialchars($site_settings['maps_link'] ?? 'https://maps.app.goo.gl/yo7YCBZcro7q34UT9') ?>" target="_blank" class="map-link">
          <div class="media single-contact-info">
            <div class="media-left thumb">
              <img src="assets/img/contact/address.png" width="100%" alt="img">
            </div>
            <div class="media-body details">
                <h3>Our Location</h3>
                <p><?= nl2br(htmlspecialchars($site_settings['address'] ?? 'D-61 Sector 10 Noida')) ?></p>
            </div>
          </div>
           </a>
        </div>
        <div class="col-md-4">
            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $site_settings['phone'] ?? '+919560595146') ?>">
          <div class="media single-contact-info">
            <div class="media-left thumb">
                <img src="assets/img/contact/contactus.png" width="100%" alt="img">
            </div>
            <div class="media-body details">
                <h3>Contact Us</h3>
                  <p><?= htmlspecialchars($site_settings['phone'] ?? '+91 9560595146') ?></p>
            </div>
          </div>
          </a>
        </div>
        <div class="col-md-4">
            <a href="mailto:<?= htmlspecialchars($site_settings['email'] ?? 'shellautomotiv@gmail.com') ?>">
          <div class="media single-contact-info">
            <div class="media-left thumb">
                <img src="assets/img/contact/email.png" width="100%" alt="img">
            </div>
            <div class="media-body details">
                <h3>Email</h3>
                 <p><?= htmlspecialchars($site_settings['email'] ?? 'shellautomotiv@gmail.com') ?></p>
            </div>
          </div>
          </a>
        </div>
    </div>

            
        <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="contact-form-container">
            <form action="process.php" method="post" class="contact-form" id="contactForm">
              <h2>Get In Touch</h2>

              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Your Name" required class="input-field">

              <label for="phone">Phone</label>
              <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required class="input-field">

              <label for="message">Message</label>
              <textarea id="message" name="message" placeholder="Your Message" required class="input-field"></textarea>
                   <!-- reCAPTCHA widget -->
    <div class="g-recaptcha" data-sitekey="6Lfvis8rAAAAADH4uPrLG2kDN4uYX1WUmbwWLK5F"></div>

    <!-- Error message div -->
    <div id="errorMsg" style="color: red; display: none; margin-top: 10px;"></div>

              <button type="submit" class="submit-btn">Submit</button>
            </form>
          </div>
        </div>
      </div>
      </div>  
      </div>
            
      
    </div>  
</div>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.2899329341794!2d77.33256057495521!3d28.591243285955485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce57cb285c3c1%3A0xd9d36412df30e01d!2sShell%20Automotiv%20-%20Car%20Detailing%20%7C%20Paint%20Protection%20Film%20(PPF)%20%7C%20Ceramic%20%26%20Graphene%20Coating%20%7C%20Denting%20Painting%20in%20Noida!5e1!3m2!1sen!2sin!4v1747296978227!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    



  


<?php include 'footer.php';?>
