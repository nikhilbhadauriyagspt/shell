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
                    <h3><span>Explore Our Stunning Gallery</span> </h3>
                    <h5>Experience the perfection of Ceramic & Graphene Coating, PPF protection, and premium Bike makeovers. Browse through our exclusive collection showcasing top-notch craftsmanship and attention to detail.</h5>
                </div>
</section>
<?php
include 'admin-panel/config.php';

// Fetch all images
$sql = "SELECT * FROM gallery ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
$images = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}
$conn->close();
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

<?php include 'footer.php';?>
