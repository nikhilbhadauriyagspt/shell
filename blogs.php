<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h3><span>Our Blogs</span> </h3>
                   </div>
</section>

<?php
include 'admin-panel/config.php';  // Correct path

// Pagination
$limit = 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Total blogs count
$result = $conn->query("SELECT COUNT(*) AS total FROM blogs");
$total_blogs = $result->fetch_assoc()['total'];
$total_pages = ceil($total_blogs / $limit);

// Blogs fetch query
$sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT $offset, $limit";
$query = $conn->query($sql);
?>

<section class="boll">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <?php while ($row = $query->fetch_assoc()): ?>
                <?php 
                    $images = explode(',', $row['images']);
                   
                ?>
                <div class="col-md-6">
                    
                    <div class="bolg-box">
                        <div class="blog-img">
                         
                        <?php 
                        // Strip everything except <img> tags
$imagesOnly = strip_tags($row['content'], '<img>');

                        ?>
                      
                            <!-- Base URL se image load -->
                        
                            <img src="<?php echo $base_url . trim($images[0]); ?>" width="100%" alt="Blog Image">

                        </div>
                        <div class="blog-text">
                            <div class="text-top">
                                <h6><a href="blog-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['services']; ?></a></h6>
                                <span><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></span>
                            </div>
                            <h4><a href="blog-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>

                        <div class="limited-text">
                            
                        <p class=""><?php echo $row['content'] . '...'; ?></p>
                          
                            
                        </div>
                            <a class="blog-btn" href="blog-details.php?id=<?php echo $row['id']; ?>">Read More</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo ($page - 1); ?>">&laquo; Previous</a>
                    </li>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next &raquo;</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Recent Blogs -->
        <div class="col-md-4 border-left">
       
            <div class="recent-blog">
            <div class="blog-head">
                    <h3>Recent Blogs</h3>
                </div>
                <?php
                $recent_query = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5");
                while ($recent = $recent_query->fetch_assoc()):
                    $recent_images = explode(',', $recent['images']);
                ?>
                <div class="bolg-box">
                    <div class="blog-img">
                        <!-- Recent blog image with base URL -->
                        <img src="<?php echo $base_url . trim($recent_images[0]); ?>" width="100%" alt="Recent Blog">
                    </div>
                    <div class="blog-text">
                        <div class="text-top">
                        <h6><a href="blog-details.php?id=<?php echo $recent['id']; ?>"><?php echo $recent['services']; ?></a></h6>
                        <span><?php echo date('d/m/Y', strtotime($recent['created_at'])); ?></span>
                      
                        </div>
                        <h4><a href="blog-details.php?id=<?php echo $recent['id']; ?>"><?php echo $recent['title']; ?></a></h4>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

</section>




<?php include 'footer.php';?>
