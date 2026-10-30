<?php
$currentAdminPage = basename($_SERVER['PHP_SELF']);
$isGalleryPage = in_array($currentAdminPage, ['add-gallery.php', 'manage-gallery.php']);
$isBlogPage = in_array($currentAdminPage, ['add-blog.php', 'manage-blog.php', 'edit_blog.php']);
$isUpdatePage = in_array($currentAdminPage, ['add-update.php', 'manage-update.php', 'edit-update.php']);
$isFaqPage = in_array($currentAdminPage, ['add-faq.php', 'manage_faqs.php', 'edit_faq.php']);
?>
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
            <a href="dashboard.php" class="text-decoration-none d-flex flex-column align-items-center gap-1">
                <img class="toplogo" src="../assets/images/logo-web/logo.png" alt="Shell Logo">
                <img class="bottomlogo" src="../assets/images/logo-web/heamid.png" alt="Shell Automotive">
            </a>
        </div>

        <div class="sidebar-nav-label">Main Menu</div>
        <div class="list-group list-group-flush">
            <a href="dashboard.php" class="list-group-item list-group-item-action <?= $currentAdminPage === 'dashboard.php' ? 'active-item' : '' ?>">
                <i class="fas fa-chart-pie nav-icon"></i>
                <span>Dashboard</span>
            </a>

            <!-- Gallery Dropdown -->
            <div class="dropdown <?= $isGalleryPage ? 'open' : '' ?>">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="galleryDropdown">
                    <i class="fas fa-images nav-icon"></i>
                    <span>Gallery</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                    <li><a class="dropdown-item <?= $currentAdminPage === 'add-gallery.php' ? 'active-sub' : '' ?>" href="add-gallery.php"><i class="fas fa-plus-circle fa-xs"></i> Add Gallery</a></li>
                    <li><a class="dropdown-item <?= $currentAdminPage === 'manage-gallery.php' ? 'active-sub' : '' ?>" href="manage-gallery.php"><i class="fas fa-folder-open fa-xs"></i> Manage Gallery</a></li>
                </ul>
            </div>

            <!-- Blogs Dropdown -->
            <div class="dropdown <?= $isBlogPage ? 'open' : '' ?>">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="blogsDropdown">
                    <i class="fas fa-newspaper nav-icon"></i>
                    <span>Blogs</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="blogsDropdown">
                    <li><a class="dropdown-item <?= $currentAdminPage === 'add-blog.php' ? 'active-sub' : '' ?>" href="add-blog.php"><i class="fas fa-plus-circle fa-xs"></i> Add Blog</a></li>
                    <li><a class="dropdown-item <?= in_array($currentAdminPage, ['manage-blog.php', 'edit_blog.php']) ? 'active-sub' : '' ?>" href="manage-blog.php"><i class="fas fa-list-ul fa-xs"></i> Manage Blogs</a></li>
                </ul>
            </div>

            <!-- Updates Dropdown -->
            <div class="dropdown <?= $isUpdatePage ? 'open' : '' ?>">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="updatesDropdown">
                    <i class="fas fa-bullhorn nav-icon"></i>
                    <span>Updates</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="updatesDropdown">
                    <li><a class="dropdown-item <?= $currentAdminPage === 'add-update.php' ? 'active-sub' : '' ?>" href="add-update.php"><i class="fas fa-plus-circle fa-xs"></i> Add Update</a></li>
                    <li><a class="dropdown-item <?= in_array($currentAdminPage, ['manage-update.php', 'edit-update.php']) ? 'active-sub' : '' ?>" href="manage-update.php"><i class="fas fa-list-ul fa-xs"></i> Manage Updates</a></li>
                </ul>
            </div>

            <!-- FAQ Dropdown -->
            <div class="dropdown <?= $isFaqPage ? 'open' : '' ?>">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" id="faqDropdown">
                    <i class="fas fa-circle-question nav-icon"></i>
                    <span>FAQ</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="faqDropdown">
                    <li><a class="dropdown-item <?= $currentAdminPage === 'add-faq.php' ? 'active-sub' : '' ?>" href="add-faq.php"><i class="fas fa-plus-circle fa-xs"></i> Add FAQ</a></li>
                    <li><a class="dropdown-item <?= in_array($currentAdminPage, ['manage_faqs.php', 'edit_faq.php']) ? 'active-sub' : '' ?>" href="manage_faqs.php"><i class="fas fa-list-ul fa-xs"></i> Manage FAQs</a></li>
                </ul>
            </div>

            <div class="sidebar-nav-label mt-2">Inquiries & Leads</div>

            <a href="contact-entries.php" class="list-group-item list-group-item-action <?= $currentAdminPage === 'contact-entries.php' ? 'active-item' : '' ?>">
                <i class="fas fa-envelope-open-text nav-icon"></i>
                <span>Contact Entries</span>
            </a>

            <a href="subscribed_emails.php" class="list-group-item list-group-item-action <?= $currentAdminPage === 'subscribed_emails.php' ? 'active-item' : '' ?>">
                <i class="fas fa-users nav-icon"></i>
                <span>Subscribed Emails</span>
            </a>

            <div class="sidebar-nav-label mt-2">Quick Links</div>

            <a href="../index.php" target="_blank" class="list-group-item list-group-item-action">
                <i class="fas fa-external-link-alt nav-icon"></i>
                <span>Visit Website</span>
            </a>
        </div>
    </div>
