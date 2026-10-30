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
                    <h3><span>NEWS AND UPDATES</span> </h3>
                   </div>
</section>
<?php
include 'admin-panel/config.php';  // Correct path

// Pagination Variables
$limit = 6; // Number of blogs per page
$page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Total blogs count
$result = $conn->query("SELECT COUNT(*) AS total FROM updates");
$total_blogs = $result->fetch_assoc()['total'];
$total_pages = ceil($total_blogs / $limit);

// Blogs fetch query
$sql = "SELECT * FROM updates ORDER BY created_at DESC LIMIT $offset, $limit";
$query = $conn->query($sql);
?>

<section class="update">
    <div class="container">
        <div class="row">
            <?php while ($row = $query->fetch_assoc()): ?>
                <?php 
                    $images = explode(',', $row['image_paths']);
                ?>
                <div class="col-md-4">
                    <div class="bolg-box">
                        <div class="blog-img">
                            <img src="<?php echo $base_url . trim($images[0]); ?>" width="100%" alt="Blog Image">
                        </div>
                        <div class="blog-text">
                            <div class="text-top">
                                <h6><a href="update-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['services']; ?></a></h6>
                                <span><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></span>
                            </div>
                            <h4><a href="update-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                            <p class="limited-text"><?php echo substr($row['content'], 0, 150) . '...'; ?></p>
                            <a class="blog-btn" href="update-detail.php?id=<?php echo $row['id']; ?>">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- Previous Button -->
                <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($page - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Next Button -->
                <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($page + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>



    <?php include 'footer.php';?>