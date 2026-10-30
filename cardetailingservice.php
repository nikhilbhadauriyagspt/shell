<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <style>

.accordion-button {
    position: relative;
    display: flex
;
    align-items: center;
    width: 100%;
    padding: 1rem 1.25rem;
    font-size: 1rem;
    color: #ffffff;
    text-align: left;
    background-color: #000000;
    border: 0;
    border-radius: 0;
    overflow-anchor: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, border-radius .15s ease;
}
.accordion-button:not(.collapsed) {
    color: var(--blue);
    font-weight: 600;
    background-color: #fff;
    box-shadow: none;
}
.accordion-item {
    /* background-color: #fff; */
    border: 1px solid rgb(0, 0, 0) !important;
}
.accordion-body{
  background:#000;
  border-bottom:1px solid rgba(199, 199, 199, 0.4);
  color:#ddd;
}
    .why-head h4{
    color: var(--blue);
    font-size:35px;
    font-weight: 800;
}
.why-head  ul li{
    font-size: 15px;
    line-height: 20px;
    margin-top:10px;
    color: #ddd;
}
.car-imggg{
    border-radius: 10px;
    overflow: hidden;
    
}
.carwhybox{
  min-height:220px;
  margin-top:20px;
    background: #fff;
    border-radius: 10px;
    padding: 30px 40px 20px;
}
.carwhybox h3{
    font-size: 25px;
    font-weight: 600;
    color: var(--blue);
}
.carwhybox p{
  font-size:14px;
    color: #272727;
}
    .btn-close {
    box-sizing: content-box;
    width: 1em;
    position: absolute;
    height: 1em;
    top: 7px;
    right: 9px;
    padding: .25em .25em;
    color: #000;
    background: transparent url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e) center / 1em auto no-repeat;
    border: 0;
    border-radius: .25rem;
    opacity: 0.5;
}
.accordionp{
    font-size: 17px;
    font-weight: 600;
    color: #ddd;
}
   </style>

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



    
<section class="cardetailing" >
  <img src="assets/images/banner/cardetalingbanner.jpg" width="100%" alt="">
        
                <div class="col-md-8 text-end rtjiurh" data-aos="zoom-in" data-aos-duration="1000">
                    <h3 >Welcome to <span>Shell Automotiv</span> <br> Noida Sector 10!</h3>
                    <p style="color:#ddd; margin:0">Looking for top-tier car detailing, coating and bike detailing services in Noida? Your search ends here! Shell Automotiv is your go-to destination for premium vehicle detailing and protection. With our expertise and high-quality products, we guarantee that your car or bike will receive the ultimate shine, protection, and care it deserves.</p>
</div>
</section>
<section class="aboucaraboucar pt-4">
     <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="why-head text-center">
            <h3>
            BEST <span>CAR DETAILING</span> IN NOIDA  
            </h3>
            <p style="padding:0">Car enthusiasts understand the sheer joy of seeing their prized vehicles gleaming under the sunlight. A well-maintained car not only enhances its visual appeal but also helps retain its value over time. This is where professional car detailing and cleaning services become essential.
</p><p>
If you're in Noida and searching for top-notch car detailing and cleaning services, look no further than Shell Automotiv. With our expertise, keen attention to detail, and passion for perfection, we have become the trusted choice for car enthusiasts who demand the best care for their vehicles.
</p><p>
At Shell Automotiv, we are renowned for delivering exceptional car detailing and cleaning services across Noida, Delhi, and throughout India. Our team of highly skilled technicians understands the intricacies of automotive detailing and strives to provide the highest level of service. From the moment you step into our studio, you’ll experience our unwavering dedication to excellence and customer satisfaction.</p>

           
          </div>
            </div>
            <div class="col-md-2"></div>
        </div>
       <div class="row">
        <div class="col-md-12">
          <div class="sets-head">
            <h3>What <span>Sets us</span> Apart?</h3>
          </div>
        </div>
       <div class="col-md-6 p-0">
            <img src="assets\images\cardenting\carside.jpg" width="100%" alt="">
          </div>
       <div class="col-md-6">
           <div class="car-text mt-4 text-start">
           <p style=" padding:0">What sets Shell Automotiv apart is our unwavering commitment to excellence, ensuring results that consistently exceed customer expectations. Our team of highly skilled professionals brings years of expertise and a passion for perfection, using cutting-edge technology and advanced techniques to deliver showroom-quality finishes and unmatched protection.</p><p>

With a strong customer-centric approach, we offer tailored solutions designed to enhance your vehicle's aesthetics, durability, and overall value. From flawless Paint Protection Film (PPF) installations that shield against scratches and stone chips, to precision ceramic coating that provides long-lasting shine and protection, we execute every service with precision and care. Our meticulous detailing process restores and enhances the beauty of your car, while our expert denting and painting services bring back its original charm.
</p><p>
At Shell Automotiv, we use only premium-grade products and the latest innovations in car care to ensure outstanding and long-lasting results. Our attention to detail, combined with our dedication to quality craftsmanship, ensures that your vehicle receives the best possible treatment.
</p>       
         </div>
          </div>
          
    
       </div>
</section>
<section class="about-main detailingser d-block d-sm-none">
    <div class="container">
      <div class="row" id="about-main">
        <div class="col-md-12">
          <div class="sets-head">
            <h3>Our Detailing<span> Service</span> Packages</h3>
          </div>
        </div>
      </div>
      <div class="row" id="basiccar">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Basic-cleaning.jpg" width="100%" alt="basic-cleaning">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent abt-indexcontent1">
            <h2>Basic Car Cleaning</h2>
            <p>Basic Car Cleaning is essential for maintaining your vehicle's cleanliness and overall appearance. It removes dust, dirt, and grime while enhancing both the interior and exterior, ensuring a fresh and polished look.</p>
            <div class="about-btn2 gap-3">
              <a class="learn-more-btn" data-bs-toggle="modal" data-bs-target="#serviceModal" 
                 data-title="<h1>Basic Car Cleaning</h1>" 
                 data-content='
                 <p>Basic Car Cleaning is essential for maintaining your vehicles cleanliness and overall appearance. It removes dust, dirt, and grime while enhancing both the interior and exterior, ensuring a fresh and polished look.</p>
           
                 <h4 class="">What&apos;s Included in Basic Car Cleaning:</h4>
                 <ul class="small">
                   <li><strong>Foam Wash:</strong> Thorough exterior cleaning with high-quality foam.</li>
                   <li><strong>Interior Vacuuming:</strong> Removal of dust and debris from seats, carpets, and corners.</li>
                   <li><strong>Dashboard & Seats Wipe Down and Dressing:</strong> Cleansing and conditioning for a refreshed look.</li>
                   <li><strong>Exterior Trim & Tyre Polishing:</strong> Enhancing the shine and protection of trims and tyres.</li>
                   <li><strong>Glass Cleaning:</strong> Streak-free cleaning for clear visibility.</li>
                   <li><strong>Paper Mat Placement:</strong> Fresh paper mats for added cleanliness.</li>
                 </ul>'>
                Learn More
              </a>
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
              </a>
             </div>
          </div>
        </div>
      </div>

      <div class="row mt-5" id="carinterior">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/sec.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent">
            <h2>Car Interior Deep Cleaning</h2>
            <p>Car Interior Deep Cleaning is essential for maintaining a fresh, hygienic, and spotless cabin. Using specialized cleaning solutions for leather, plastic, and upholstery, this service removes deep-seated dirt, stains, and odors, restoring your car’s interior to pristine condition.</p>
            <div class="about-btn2 gap-3">
              <a class="learn-more-btn" data-bs-toggle="modal" data-bs-target="#serviceModal" 
                 data-title="<h3>Car Interior Deep Cleaning</h3>" 
                 data-content='
                 <h5 class="">What&apos; Included in Car Interior Deep Cleaning:</h5>
                 <ul class="small">
                   <li><strong>Roof Liner Cleaning:</strong> Removes dust, stains, and grime from the headliner.</li>
                   <li><strong>Seat Cleaning:</strong> Deep cleaning and conditioning for fabric or leather seats.</li>
                   <li><strong>Dashboard & Door Panel Cleaning:</strong> Thorough cleaning and polishing for a refreshed look.</li>
                   <li><strong>Seat Belt Cleaning:</strong> Removes dirt and stains for a neat appearance.</li>
                   <li><strong>Dicky (Boot) Area Cleaning:</strong> Complete vacuuming and dust removal.</li>
                   <li><strong>Floor Cleaning & Vacuuming:</strong> Eliminates dust, debris, and tough stains.</li>
                   <li><strong>Dashboard Dressing:</strong> Adds a polished and protective finish.</li>
                 </ul>'>
                Learn More
              </a>
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
              </a>
             </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/third.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent abt-indexcontent1">
            <h2>Full Car Cleaning</h2>
            <p><a href="#basiccar">Includes Basic Car</a> & <a href="#carinterior">Cleaning Car Interior Deep</a></p>
            <div class="about-btn2 gap-3">
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/four.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent">
            <h2>Compounding and Polishing Treatment</h2>
            <p>Our Car Rubbing and Polishing Service is designed to restore and enhance your vehicle's appearance, making it ideal for white and silver cars. This treatment effectively removes paint imperfections while bringing back the car's original shine and gloss.</p>
            <div class="about-btn2 gap-3">
              <a class="learn-more-btn" data-bs-toggle="modal" data-bs-target="#serviceModal" 
                 data-title="<h4>Compounding and Polishing Treatment</h4>" 
                 data-content='
                 <h4 class="">What&apos;s Included?</h4>
                 <ul class="small">
                   <li><strong>Paint Correction & Scratch Removal:</strong> Eliminates minor scratches, swirl marks, and surface imperfections.</li>
                   <li><strong>Faded Paint Restoration:</strong> Revives dull and oxidized paint for a vibrant finish.</li>
                   <li><strong>Gloss Enhancement:</strong> Achieves a deep, mirror-like shine for a showroom finish.</li>
                   <li><strong>Chrome Polishing:</strong> Restores the brilliance of chrome surfaces.</li>
                   <li><strong>Exterior Wash & Wax:</strong> Adds a protective, glossy coat for long-lasting shine.</li>
                   <li><strong>Interior Deep Cleaning:</strong> Comprehensive vacuuming, dusting, and surface care for a refreshed cabin.</li>
                 </ul>'>
                Learn More
              </a>
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
              </a>
             </div>
          </div>
        </div>
      </div>

      <div class="row mt-5" id="exe">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Exterior.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent abt-indexcontent1">
            <h2>Exterior Detailing Treatment</h2>
            <p>This treatment is a thorough cleaning, restoration, and protection process for a vehicle's exterior surfaces, including the paint, glass, wheels, and trim. It involves washing, decontaminating, paint correction, and applying protective coatings like wax or sealant to enhance shine and durability. This treatment not only improves the car's appearance but also protects it from environmental damage, oxidation, and minor scratches.</p>
            <div class="about-btn2 gap-3">
              <a href="exterior-detailing-treatment.php" class="expl-btn">Learn More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Full.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent">
            <h2>Compounding and Polishing Treatment</h2>
            <p>This will include <a href="#exe">Exterior Detailing Treatment</a> and <a href="#">Interior Intensive Deep Cleaning</a> to give your car a complete inside-out detailing work.</p>
            <div class="about-btn2 gap-3">
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">Book Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Chrome.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent abt-indexcontent1">
            <h2>Chrome Restoration and Polishing</h2>
            <p>This process revives dull, oxidized, or rusted chrome surfaces by removing imperfections and restoring their original shine. Using professional-grade polish and protective coatings, this process enhances durability and maintains a mirror-like finish.</p>
            <div class="about-btn2 gap-3">
              <a href="#" class="expl-btn">Learn More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Wax.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent">
            <h2>Wax Polishing</h2>
            <p>We offer premium car waxes, including spray, cream, liquid, carnauba paste, and ceramic-infused wax from top brands like 3M, Turtle Wax, Meguiar’s, and Sonax. These waxes provide superior protection, deep gloss, and long-lasting durability for all vehicle care needs.</p>
            <div class="about-btn2 gap-3">
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">Book Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/glass.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent">
            <h2>Glass Treatment and Coating</h2>
            <p>Our Glass Treatment enhances glass clarity by removing scratches, swirl marks, and stains through specialized polishing. It improves visibility, restores aesthetics, and protects against future damage, making cleaning easier and driving safer.</p>
            <div class="about-btn2 gap-3">
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">Book Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/anti.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent">
            <h2>Anti-Rust Underbody Coating</h2>
            <p>We offer Anti-Rust Underbody Coating with a 5-year warranty to protect vehicles from corrosion and damage caused by moisture, salt, and road debris. This durable coating creates a protective barrier that extends the car’s lifespan and enhances structural integrity. It also helps reduce road noise and ensures long-term protection, making it a valuable investment for vehicle maintenance.</p>
            <div class="about-btn2 gap-3">
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">Book Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/vecteezy.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent">
            <h2>Premium Wash</h2>
            <p>Our Premium Car Wash is designed for car enthusiasts who want the best, offering a thorough inside-out cleaning along with paint-protecting waxing.</p>
            <div class="about-btn2 gap-3">
              <a class="learn-more-btn" data-bs-toggle="modal" data-bs-target="#serviceModal" 
                 data-title="<h6 class='small'>It includes detailed cleaning of lower parts like alloy wheels, wheel arches, and the engine bay, with engine dressing for a polished finish. The package also ensures a spotless interior with vacuuming and interior dressing, enhancing both cleanliness and aesthetics.</h6>" 
                 data-content='
                 <h4 class="">What&apos;s Included?</h4>
                 <ul class="small">
                   <li><strong>Complete Exterior and Interior Cleaning</strong></li>
                   <li><strong>Waxing for Paint Protection</strong></li>
                   <li><strong>Alloy Wheels and Wheel Arches Cleaning</strong></li>
                   <li><strong>Engine Bay Cleaning with Engine Dressing</strong></li>
                   <li><strong>Interior Vacuuming and Dressing</strong></li>
                 </ul>'>
                Learn More
              </a>
              <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">Book Now</a>
            </div>
          </div>
        </div>
      </div>

    </div>
</section>

<section class="about-main detailingser  d-none d-sm-block">
    <div class="container">
      <div class="row" id="about-main">
      <div class="col-md-12">
          <div class="sets-head">
            <h3>Our Detailing<span> Service</span> Packages</h3>
          </div>
        </div>
      
      </div>
      <div class="row" id="basiccar">
        
      <div class="col-md-6 tyui">
          <div class="abt-indexcontent abt-indexcontent1  ">
            <h2>Basic Car Cleaning </h2>
            <p>Basic Car Cleaning is essential for maintaining your vehicle's cleanliness and overall appearance. It removes dust, dirt, and grime while enhancing both the interior and exterior, ensuring a fresh and polished look.
            </p>
            <div class="about-btn2 gap-3">
            <a class="learn-more-btn"  data-bs-toggle="modal" data-bs-target="#serviceModal" 
                data-title="<h1>Basic Car Cleaning</h1>" 
                data-content='
                <p>Basic Car Cleaning is essential for maintaining your vehicls cleanliness and overall appearance. It removes dust, dirt, and grime while enhancing both the interior and exterior, ensuring a fresh and polished look.
           
                <h4 class="">What&apos;s Included in Basic Car Cleaning:</h4>
    
                <ul class="small">
        <li ><strong>Foam Wash:</strong> Thorough exterior cleaning with high-quality foam.</li>
        <li ><strong>Interior Vacuuming:</strong> Removal of dust and debris from seats, carpets, and corners.</li>
        <li ><strong>Dashboard & Seats Wipe Down and Dressing:</strong> Cleansing and conditioning for a refreshed look.</li>
        <li ><strong>Exterior Trim & Tyre Polishing:</strong> Enhancing the shine and protection of trims and tyres.</li>
        <li ><strong>Glass Cleaning:</strong> Streak-free cleaning for clear visibility.</li>
        <li ><strong>Paper Mat Placement:</strong> Fresh paper mats for added cleanliness.</li>
    </ul>'>
                Learn More
</a>
<a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>


             </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Basic-cleaning.jpg" width="100%" alt="basic-cleaning">
          </div>
        </div>
      
      </div>
      <div class="row mt-5" id="carinterior">
      <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/sec.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent  ">
            <h2>Car Interior Deep Cleaning</h2>
            <p>Car Interior Deep Cleaning is essential for maintaining a fresh, hygienic, and spotless cabin. Using specialized cleaning solutions for leather, plastic, and upholstery, this service removes deep-seated dirt, stains, and odors, restoring your car’s interior to pristine condition.
            </p>
            <div class="about-btn2 gap-3">
            <a class="learn-more-btn"  data-bs-toggle="modal" data-bs-target="#serviceModal" 
                data-title="<h3>Car Interior Deep Cleaning</h3>" 
                data-content='
                <p>Car Interior Deep Cleaning is essential for maintaining a fresh, hygienic, and spotless cabin. Using specialized cleaning solutions for leather, plastic, and upholstery, this service removes deep-seated dirt, stains, and odors, restoring your car’s interior to pristine condition.
            </p>
                <h5 class="">What&apos; Included in Car Interior Deep Cleaning:</h5>
    
                <ul class="small">
    <li><strong>Roof Liner Cleaning:</strong> Removes dust, stains, and grime from the headliner.</li>
    <li><strong>Seat Cleaning:</strong> Deep cleaning and conditioning for fabric or leather seats.</li>
    <li><strong>Dashboard & Door Panel Cleaning:</strong> Thorough cleaning and polishing for a refreshed look.</li>
    <li><strong>Seat Belt Cleaning:</strong> Removes dirt and stains for a neat appearance.</li>
    <li><strong>Dicky (Boot) Area Cleaning:</strong> Complete vacuuming and dust removal.</li>
    <li><strong>Floor Cleaning & Vacuuming:</strong> Eliminates dust, debris, and tough stains.</li>
    <li><strong>Dashboard Dressing:</strong> Adds a polished and protective finish.</li>
</ul>'>
                Learn More
</a>
<a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>


             </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        
        <div class="col-md-6 tyui">
            <div class="abt-indexcontent abt-indexcontent1  ">
              <h2>Full Car Cleaning</h2>
              <p><a href="#basiccar">Includes Basic Car Cleaning </a> & <a href="#carinterior">Car Interior Deep Cleaning</a> </p>
              <div class="about-btn2 gap-3">
             
  <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                          Book Now
                      </a>
  
  
               </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="abtindex-img">
              <img src="assets/images/cardenting/third.jpg" width="100%" alt="">
            </div>
          </div>
          </div>
          <div class="row mt-5">
      <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/four.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent  ">
            <h2>Compounding and Polishing Treatment</h2>
            <p>Our Car Rubbing and Polishing Service is designed to restore and enhance your vehicle's appearance, making it ideal for white and silver cars. This treatment effectively removes paint imperfections while bringing back the car's original shine and gloss. </p>
            <div class="about-btn2 gap-3">
            <a class="learn-more-btn"  data-bs-toggle="modal" data-bs-target="#serviceModal" 
                data-title="<h4>Compounding and Polishing Treatment</h4>" 
                data-content='
                 <p>Our Car Rubbing and Polishing Service is designed to restore and enhance your vehicles appearance, making it ideal for white and silver cars. This treatment effectively removes paint imperfections while bringing back the cars original shine and gloss. </p>
            
                <h4 class="">What&apos;s Included?</h4>
    
                <ul class="small">
    <li><strong>Paint Correction & Scratch Removal:</strong> Eliminates minor scratches, swirl marks, and surface imperfections.</li>
    <li><strong>Faded Paint Restoration:</strong> Revives dull and oxidized paint for a vibrant finish.</li>
    <li><strong>Gloss Enhancement:</strong> Achieves a deep, mirror-like shine for a showroom finish.</li>
    <li><strong>Chrome Polishing:</strong> Restores the brilliance of chrome surfaces.</li>
    <li><strong>Exterior Wash & Wax:</strong> Adds a protective, glossy coat for long-lasting shine.</li>
    <li><strong>Interior Deep Cleaning:</strong> Comprehensive vacuuming, dusting, and surface care for a refreshed cabin.</li>
</ul>'>
                Learn More
</a>
<a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>


             </div>
          </div>
        </div>
      </div>

      <div class="row mt-5 " id="exe">
        
        <div class="col-md-6 tyui">
            <div class="abt-indexcontent abt-indexcontent1  ">
              <h2>Exterior Detailing Treatment</h2>
              <p>This treatment is a thorough cleaning, restoration, and protection process for a vehicle's exterior surfaces, including the paint, glass, wheels, and trim. It involves washing, decontaminating, paint correction, and applying protective coatings like wax or sealant to enhance shine and durability. This treatment not only improves the car's appearance but also protects it from environmental damage, oxidation, and minor scratches. </p>
              <div class="about-btn2 gap-3">
             
  <a href="exterior-detailing-treatment.php" class="expl-btn" >
                       Learn More
                      </a>
  
  
               </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="abtindex-img">
              <img src="assets/images/cardenting/Exterior.jpg" width="100%" alt="">
            </div>
          </div>
          </div>
          <div class="row mt-5">
      <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Full.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent  ">
            <h2>Full Detailing Treatment</h2>
            <p>
            This will include <a href="#exe">Exterior Detailing Treatment</a> and <a href="#">Interior Intensive Deep Cleaning</a> to give your car a complete inside out detailing work.
            </p>  <div class="about-btn2 gap-3">
         
<a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>


             </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        
        <div class="col-md-6 tyui">
            <div class="abt-indexcontent abt-indexcontent1  ">
              <h2>Chrome Restoration and Polishing</h2>
              <p>This process revives dull, oxidized, or rusted chrome surfaces by removing imperfections and restoring their original shine. Using professional-grade polish and protective coatings, this process enhances durability and maintains a mirror-like finish.</p>  
               <div class="about-btn2 gap-3">
  <a href="#" class="expl-btn" >
                       Learn More
                      </a>
  
  
               </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="abtindex-img">
              <img src="assets/images/cardenting/Chrome.jpg" width="100%" alt="">
            </div>
          </div>
          </div>
          <div class="row mt-5">
      <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/Wax.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent  ">
            <h2>Wax Polishing
            </h2>
            <p>We offer premium car waxes, including spray, cream, liquid, carnauba paste, and ceramic-infused wax from top brands like 3M, Turtle Wax, Meguiar’s, and Sonax. These waxes provide superior protection, deep gloss, and long-lasting durability for all vehicle care needs.</p>  <div class="about-btn2 gap-3">
         
<a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>


             </div>
          </div>
        </div>
        <div class="row mt-5">
        
        <div class="col-md-6 tyui">
            <div class="abt-indexcontent abt-indexcontent1  ">
              <h2>Glass Treatment and Coating</h2>
              <p>Our Glass Treatment enhances glass clarity by removing scratches, swirl marks, and stains through specialized polishing. It improves visibility, restores aesthetics, and protects against future damage, making cleaning easier and driving safer.</p>  
               <div class="about-btn2 gap-3">
 
<a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>
  
  
               </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="abtindex-img">
              <img src="assets/images/cardenting/glass.jpg" width="100%" alt="">
            </div>
          </div>
          </div>
          <div class="row mt-5">
      <div class="col-md-6">
          <div class="abtindex-img">
            <img src="assets/images/cardenting/anti.jpg" width="100%" alt="">
          </div>
        </div>
        <div class="col-md-6 tyui">
          <div class="abt-indexcontent  ">
            <h2> Anti-Rust Underbody Coating  </h2>
            <p>We offer Anti-Rust Underbody Coating with a 5-year warranty to protect vehicles from corrosion and damage caused by moisture, salt, and road debris. This durable coating creates a protective barrier that extends the car’s lifespan and enhances structural integrity. It also helps reduce road noise and ensures long-term protection, making it a valuable investment for vehicle maintenance.</p> 
             <div class="about-btn2 gap-3">
         
<a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>


             </div>
          </div>
        </div>
        <div class="row mt-5">
        
        <div class="col-md-6 tyui">
            <div class="abt-indexcontent abt-indexcontent1  ">
              <h2>Premium Wash</h2>
              <p>Our Premium Car Wash is designed for car enthusiasts who want the best, offering a thorough inside-out cleaning along with paint-protecting waxing.</p>  
               <div class="about-btn2 gap-3">
               <a class="learn-more-btn"  data-bs-toggle="modal" data-bs-target="#serviceModal" 
                data-title="<h6 >Premium Wash</h6>" 
                data-content='
                 <p>Our Premium Car Wash is designed for car enthusiasts who want the best, offering a thorough inside-out cleaning along with paint-protecting waxing.</p>  
             
                <p>It includes detailed cleaning of lower parts like alloy wheels, wheel arches, and the engine bay, with engine dressing for a polished finish. The package also ensures a spotless interior with vacuuming and interior dressing, enhancing both cleanliness and aesthetics.</p>
                
               <h4 class="">What&apos;s Included?</h4>

<ul class="small">
    <li><strong>Complete Exterior and Interior Cleaning</strong></li>
    <li><strong>Waxing for Paint Protection</strong></li>
    <li><strong>Alloy Wheels and Wheel Arches Cleaning</strong></li>
    <li><strong>Engine Bay Cleaning with Engine Dressing</strong></li>
    <li><strong>Interior Vacuuming and Dressing</strong></li>
</ul>'>
                Learn More
</a>
                  <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>
               </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="abtindex-img">
              <img src="assets/images/cardenting/vecteezy.jpg" width="100%" alt="">
            </div>
          </div>
          </div>
      </div>
      
       
    </div>
  </section>


<section class="bestcar mt-3" style="background:#181818; ">
    <div class="container">
    <div class="row">
            <div class="col-md-12">
            <div class="why-head text-center">
            <img src="assets/images/logo-web/heamid.png" width="30%" alt="">
            <h3 class="mt-1">
            One Step Car Denting Solution
            </h3>

            <p style=" padding:0">Shell Automotiv is the <strong> <a href="index">best car cleaning and detailing service provider in Noida</a></strong> and Delhi NCR, trusted by over 5,000 satisfied clients. We offer a wide range of premium services, including exterior washing, interior deep cleaning, waxing and polishing, engine bay detailing, wheel and tyre care, and comprehensive car detailing packages. With a commitment to excellence and attention to detail, we ensure that every vehicle receives top-notch treatment, restoring its shine and enhancing its longevity. Whether you need a quick refresh or a full detailing package, Shell Automotiv delivers unmatched quality and customer satisfaction.</p>

<div class="row  justify-content-center">
                <div class="col-md-3 text-center mt-0 " data-aos="zoom-in">
                    <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>
                </div>
            </div>
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
            <h4>Car Detailing Services In Noida</h4>
            <h3 class="mt-1">
           What To Expect?
            </h3>

            <p style=" padding:0">Shell Automotiv is undoubtedly the best car cleaning and detailing service provider in Noida, dedicated to keeping your vehicle in pristine condition. With our extensive range of services, we ensure your car looks and feels as good as new. From thorough interior and exterior detailing to expert engine cleaning, our skilled team delivers exceptional results with precision and care.
</p><p>
When you choose us for car detailing, you can expect a complete top-to-bottom cleaning. Our process includes exterior washing, waxing, interior vacuuming and shampooing, as well as engine bay detailing. We also focus on high-dirt areas like wheels and the undercarriage, ensuring no spot is overlooked.
</p><p>
Beyond our standard cleaning services, we offer advanced treatments to maintain your car’s appearance and protection. Our  <strong><a href="ppfcoating">paint protection film</a></strong> and <strong><a href="ceramic-coating.">ceramic coating services</a></strong> safeguard your vehicle’s paint, while our headlight restoration service revives foggy or yellowed headlights, improving both aesthetics and visibility.
</p><p>
For the best car cleaning and detailing services in Noida, trust Shell Automotiv. We provide expert care to keep your car looking its best. Contact us today to book an appointment!</p>

<div class="row  justify-content-center">
                <div class="col-md-3 text-center mt-0 " data-aos="zoom-in">
                    <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>
                </div>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>


<section class="bestcar " style="background:#000; ">
    <div class="container">
    <div class="row">
            <div class="col-md-12">
            <div class="why-head text-center">
             <h3 class="mt-1">
            About <span style="color:var(--blue)">Car</span> Detailing
            </h3>

            <p style=" padding:0">Before diving into its various aspects, let’s first understand what car detailing actually means.</p>

<p>Car detailing is the comprehensive process of cleaning, restoring, and protecting a vehicle to maintain or even surpass its original condition. This can range from a simple wash and wax to advanced services like full paint correction and engine detailing. Understanding the different types of detailing services available allows you to choose the right level of care for your vehicle based on your needs and budget.</p>

<p>Unlike a basic car wash that involves soap, water, and vacuuming, professional car detailing focuses on the finer aspects—enhancing every small detail to transform your car from "clean" to "showroom fresh."</p>

<p>Car and motorcycle detailing is essentially a deep-cleaning process, targeting every inch of the vehicle to restore its aesthetics and protect its finish. Over time, light scratches, swirl marks, and contaminants can dull the paint, giving it a lackluster appearance. Detailing helps eliminate these imperfections while rejuvenating both the exterior and interior.</p>

<p>While auto detailing doesn’t always include repair work, it can involve paint correction and long-term protection through high-quality coatings like ceramic coating or paint protection film. This ensures your vehicle not only looks great but stays protected against wear and tear.</p>

<p>Shell Automotiv is a trusted car detailing company offering a wide range of specialized services to enhance and maintain all types of vehicles.</p>

<div class="row  justify-content-center">
                <div class="col-md-3 text-center mt-0 " data-aos="zoom-in">
                    <a href="#" class="expl-btn" data-bs-toggle="modal" data-bs-target="#quoteModal">
                        Book Now
                    </a>
                </div>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>
<section class="why-index">
    <div class="container">
    <div class="row">
            <div class="col-md-7">
            <div class="why-head text-start">
           <h3 class="mt-1">
            Benefits of<span style="color:var(--blue)"> Getting Your Vehicle</span> Detailed at <span style="color:var(--blue)">Shell Automotiv: </span>
            </h3>
            <ul>

    <li>✅ Every inch of your vehicle is meticulously inspected, cleaned, and restored to perfection.</li>
    <li>✅ Revives an old car, bringing it back to a like-new finish.</li>
    <li>✅ Even new cars benefit from detailing, as it removes factory sanding marks.</li>
    <li>✅ Reduces the appearance of scratches, swirl marks, and stubborn spots.</li>
    <li>✅ Thorough decontamination eliminates dirt, road grime, and other surface impurities.</li>
    <li>✅ Uses professional-grade tools and products, including detailing brushes, rotary polishers, microfibers, and specialized perfection fluids.</li>
  
    <li>✅ Helps maintain your vehicle in top condition for longer, preserving its resale value.</li>
    <li>✅ Improves your car’s appearance from ordinary to extraordinary with expert detailing.</li>
   
</ul>

          </div>
            </div>
            <div class="col-md-5 d-flex align-items-center">
 <div class="car-imggg">
  <img src="assets/images/cardenting/benifit.jpg" width="100%" alt="">
 </div>
            </div>
        </div>
    </div>
</section>

  <!-- whjy us start here -->
  <section class="pt-5 pb-5" >
    <div class="container">
   <div class="row">
   <div class="why-head p-0 text-center">
            <img src="assets/images/logo-web/heamid.png" width="50%" alt="">
            <h3 class="mt-3">
            Why Shell Automotiv is the Best Car Detailing Service Provider in Noida ?
            </h3>
            <p>For the finest car detailing experience in Noida, Shell Automotiv is your go-to destination. Contact us today to give your car the treatment it deserves!</p>

   </div>
   <div class="col-md-7">
   

   <div class="row">
    <div class="col-md-6">
      <div class="carwhybox">
        <h3>Expertise & Experience</h3>
        <p>With years of experience and thousands of satisfied customers, Shell Automotiv has established itself as a leader in car detailing and protection services.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="carwhybox">
        <h3>Comprehensive Services</h3>
      <p>From basic washes to advanced treatments like ceramic coating, PPF (Paint Protection Film), and paint correction, we offer a complete range of detailing solutions tailored to your vehicle's needs.
      </p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="carwhybox">
        <h3>High-Quality Products & Equipment </h3>
      <p>We use professional-grade tools, premium detailing products, and advanced technology to deliver exceptional results that enhance and protect your car.</p> 
      </div>
    </div>
    <div class="col-md-6">
      <div class="carwhybox">
        <h3>Attention to Detail</h3>
     <p>Every inch of your vehicle is meticulously cleaned and restored, ensuring a flawless, showroom-like finish. Our experts focus on every minor detail to achieve perfection.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="carwhybox">
        <h3>Customer Satisfaction Guarantee</h3>
      <p> We are committed to delivering top-notch service with 100% customer satisfaction, ensuring your vehicle gets the best care possible.
      </p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="carwhybox">
        <h3>Trusted by Thousands</h3>
<p>With 5,000+ satisfied customers and a reputation for excellence, Shell Automotiv is a trusted name in Noida’s car detailing industry.    </p>
      </div>
    </div>
   </div>
   </div>
   <div class="col-md-5 d-flex align-items-center">
  <img src="assets/images/cardenting/whyside.jpg" width="100%" alt="">
</div>
      </div>
    </div>
  </section>

  <section style="background:#181818; ">
    <div class="container pt-5">
    <div class="row">
    <div class="why-head text-center">
           
            <h3 class="mt-1">
            How much does it cost to get your car detailed by
            </h3>
            <img src="assets/images/logo-web/heamid.png" width="40%" alt="">
            <p class="mt-3 ">At Shell Automotiv, our exterior detailing treatment starts at ₹4,000 for a small car and goes up to ₹8,000 for a luxury SUV, ensuring a deep-cleaned, polished, and well-protected finish. Our detailing process includes thorough washing, decontamination, polishing, and waxing to restore the paint’s shine and protect it from environmental damage. Prices vary depending on the vehicle’s size, condition, and additional services like ceramic coating, PPF, and interior detailing, which can be customized for an even more premium finish.</p>
</div>
         
        </div>
      
    </div>
  </section>
  
<section class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
<div class="why-head text-center">
  <h3>FAQs  <span style="color:var(--blue)">About Car</span> Detailing</h3>
</div>
      <div class="accordion" id="faqAccordion">
   
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqHeadingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                1. What is car detailing, and how is it different from a regular car wash?
            </button>
        </h2>
        <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Car detailing is a deep cleaning and restoration process that enhances both the interior and exterior of your vehicle. Unlike a basic car wash, detailing includes paint correction, interior deep cleaning, engine bay cleaning, and protection treatments like ceramic coating or PPF.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="faqHeadingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                2. How often should I get my car detailed?
            </button>
        </h2>
        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                It depends on your driving habits and environmental exposure. Generally, a full car detailing every 4-6 months is recommended to maintain your vehicle’s appearance and protect its paint. However, regular exterior washes and interior cleaning can be done more frequently.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="faqHeadingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                3. Will car detailing remove scratches from my vehicle?
            </button>
        </h2>
        <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Yes, but it depends on the depth of the scratches. Light scratches and swirl marks can be removed through paint correction and polishing, but deeper scratches may require repainting or touch-up work.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="faqHeadingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                4. Is car detailing worth the cost?
            </button>
        </h2>
        <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                Absolutely! Professional detailing not only enhances your car’s look but also protects its paint, prevents long-term damage, improves resale value, and extends its lifespan. It’s an investment in your vehicle’s upkeep.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="faqHeadingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                5. How long does a full car detailing session take?
            </button>
        </h2>
        <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                The time required depends on the service. A basic exterior and interior detailing may take 2-4 hours, while more advanced services like paint correction or ceramic coating can take a full day or more for the best results.
            </div>
        </div>
    </div>
</div>

<p class="mt-4 accordionp">Need expert detailing for your car? Visit <strong>Shell Automotiv</strong> today!</p>

      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</section>


    <?php include 'footer.php';?>
