-- Table structure for table `site_settings`
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) DEFAULT 'Shell Automotiv',
  `logo` varchar(255) DEFAULT 'assets/images/logo-web/logo.png',
  `favicon` varchar(255) DEFAULT 'assets/images/logo-web/logo.png',
  `phone` varchar(50) DEFAULT '+91 9560595146',
  `whatsapp` varchar(50) DEFAULT '+91 9560595146',
  `email` varchar(100) DEFAULT 'shellautomotiv@gmail.com',
  `address` text DEFAULT NULL,
  `maps_link` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `site_settings`
INSERT INTO `site_settings` (`id`, `site_title`, `logo`, `favicon`, `phone`, `whatsapp`, `email`, `address`, `maps_link`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`) 
VALUES (1, 'Shell Automotiv', 'assets/images/logo-web/logo.png', 'assets/images/logo-web/logo.png', '+91 9560595146', '+91 9560595146', 'shellautomotiv@gmail.com', 'D-61 Sector 10 Noida', 'https://maps.app.goo.gl/yo7YCBZcro7q34UT9', 'https://www.facebook.com/profile.php?id=61568488280752', 'https://www.twitter.com/shellautomotiv', 'https://www.instagram.com/shell.automotiv', 'http://www.linkedin.com/in/shellautomotiv', 'https://www.youtube.com/@ShellAutomotiv')
ON DUPLICATE KEY UPDATE `id` = `id`;
