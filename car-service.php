<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Service and Repair- Shell Automotiv</title>
    <meta name="description" content="Protect your vehicle with Shell Automotiv's ceramic coating. Enjoy a glossy finish, scratch resistance, and long-lasting shine. Book now!">
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
    <link href="assets/css/responsive.css" rel="stylesheet"> <!-- Ensure the path is correct -->
    <link href="assets/css/graphine.css" rel="stylesheet"> <!-- Ensure the path is correct -->

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


<!-- Modal for Service Details -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Service Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Service details will appear here...
            </div>
        </div>
    </div>
</div>

<!-- Existing Quote Form Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Get A Quote</h5>
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

<section class="carinterior" >
  <img src="assets/images/carservice/2.png" width="100%" alt="">
        
                <div class="col-md-8 text-end rtjiurh" data-aos="zoom-in" data-aos-duration="1000">
                    <h3>"Expert Car Repair & Service <br> – Keeping Your Ride Smooth, <br> Safe & Reliable!" </h3>
                </div>
</section>

<section>
     <div class="container">
         
         
 <div class="row justify-content-center"> 
        <div class="col-md-10">
          <div class="contact-form-container">
            <form action="#" method="post" class="contact-form">
              <h2>Get In Touch</h2>

              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Your Name" required class="input-field">

              <label for="phone">Phone No.</label>
              <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required class="input-field">

             
              <label for="message">Message</label>
              <textarea id="message" name="message" placeholder="Your Message" required class="input-field"></textarea>

              <button type="submit" class="submit-btn">Submit</button>
            </form>
          </div>
        </div>
      </div>
     </div>
</section>

<section class="why-index">
 <div class="container">
   <div class="row">

        <div class="col-md-12">
           <div class="why-head text-center">
         
             <h3 class="mt-1"> Why Choose us for your Car Service?</h3>
            </div>
        </div>
   </div>
     <div class="row">
         
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                <div class="why-icon">
                <img src="assets/images/carservice/a.jpeg" width="100%" alt="">

                </div>
                <div class="why-text">
                  <h6>
                  Quality Service
                  </h6>
                  
                </div>
              </div>
            </div>
         </div>

         
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                <div class="why-icon">
                  <img src="assets/images/carservice/b.png" width="100%" alt="">
                </div>
                <div class="why-text">
                  <h6>
                  Convenience 
                  </h6>
                </div>
              </div>
            </div>
         </div>

       
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                <div class="why-icon">
                <img src="assets/images/carservice/c.png" width="100%" alt="">
                </div>
                <div class="why-text">
                  <h6>
                  Genuine Parts
                  </h6>
                  </div>
                </div>
              </div>
         </div>
          
        
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                <div class="why-icon">
                  <img src="assets/images/carservice/d.png" width="100%" alt="">
                </div>
                <div class="why-text">
                  <h6> Expertise </h6>
                </div>
                </div>

              </div>
         </div>  

         
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                <div class="why-icon">
                  <img src="assets/images/carservice/e.png" width="100%" alt="">
                </div>
                <div class="why-text">
                  <h6>
                  Transparency  </h6>
                </div>
                </div>
              </div>
         </div>

         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                <div class="why-icon">
                  <img src="assets/images/carservice/f.png" width="100%" alt="">
                </div>
                <div class="why-text">
                  <h6>
                  Affordable </h6>
                </div>
                </div>
              </div>
         </div>

     </div>
       <div class="row">
             <div class="col-md-12">
              <div class="bestbikeimg">
                <img src="assets/images/carservice/4.jpeg" alt="" width="100%">
              </div>
        </div>
       </div>
       

        <div class="row">

    <div class="col-md-12">
      <div class="why-head text-center">
 
         <h3 class="mt-5"> Best Car Repair and Service in Noida</h3>
         <p>At Shell Automotiv, we offer expert car service and repair solutions to keep your vehicle running smoothly and safely. From engine diagnostics to brake repairs, oil changes, and denting-painting, our skilled technicians ensure top-notch care for every car.</p>
      </div>
    </div>

    <div class="row">
         
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
               
                <div class="why-text">
                  <h6>
                  Engine Diagnostics and Repair
                  </h6>
                  
                </div>
              </div>
            </div>
         </div>

         
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
               
                <div class="why-text">
                  <h6>
                  Oil Change and Fluid Top Up
                  </h6>
                </div>
              </div>
            </div>
         </div>

       
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
              
                <div class="why-text">
                  <h6>
                  Brake Inspection and Repair
                  </h6>
                  </div>
                </div>
              </div>
         </div>
          
        
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                
                <div class="why-text">
                  <h6>  Battery Testing and Replacement</h6>
                </div>
                </div>

              </div>
         </div>  

         
         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
             
                <div class="why-text">
                  <h6>
                  Suspension and Steering Repair </h6>
                </div>
                </div>
              </div>
         </div>

         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
              
                <div class="why-text">
                  <h6>
                  AC Service and Repair </h6>
                </div>
                </div>
              </div>
         </div>

         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
               
                <div class="why-text">
                  <h6>
                  General Service and Maintenance </h6>
                </div>
                </div>
              </div>
         </div>

         <div class="col-md-3">
            <div class="item">
              <div class="why-box text-center">
                <div class="color-layer"></div>
                
                <div class="why-text">
                  <h6>
                  Electrical Fault Repair </h6>
                </div>
                </div>
              </div>
         </div>

     </div>

   </div>
   
 </div>
 
</section>

<section>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="why-head text-center">
              <h3 class="mt-5"> Car servicing Near Me-Shell Automotive</h3>
                <p>At Shell Automotiv, we take pride in offering top-quality car servicing and repair to keep your vehicle running smoothly and efficiently. Whether you need routine maintenance, engine diagnostics, brake repairs, or denting & painting, our expert team ensures precision, reliability, and customer satisfaction.</p>

                <p>With state-of-the-art equipment, genuine parts, and skilled technicians, we guarantee a hassle-free service experience. If you're searching for "Car Servicing Near Me," look no further – visit Shell Automotiv today and give your car the best care it deserves!</p>
            </div>
          </div>
        </div>
    </div>
</section>



    <?php include 'footer.php';?>

    