<?php
/**
 * Safely get an active MySQLi database connection
 */
function get_active_db_connection($passed_conn = null) {
    global $conn;

    // Check passed connection
    if ($passed_conn instanceof mysqli) {
        try {
            if (!@$passed_conn->connect_errno && @$passed_conn->ping()) {
                return $passed_conn;
            }
        } catch (Throwable $e) {
            // Connection is closed or errored
        }
    }

    // Check global $conn
    if (isset($conn) && ($conn instanceof mysqli)) {
        try {
            if (!@$conn->connect_errno && @$conn->ping()) {
                return $conn;
            }
        } catch (Throwable $e) {
            // Connection is closed or errored
        }
    }

    // Re-connect to database
    $host = "localhost";
    $username = "root";    
    $password = "";         
    $dbname = "shell";

    $config_path = __DIR__ . '/config.php';
    if (file_exists($config_path)) {
        @include $config_path;
    }

    try {
        $new_conn = @new mysqli($host, $username, $password, $dbname);
        if (!$new_conn->connect_error) {
            $conn = $new_conn;
            return $conn;
        }
    } catch (Throwable $e) {
        // Fallback
    }

    return null;
}

/**
 * Fetch all site settings with defaults and automatic table creation if missing
 */
function get_site_settings($connection = null, $force_refresh = false) {
    static $cached_settings = null;

    if ($cached_settings !== null && !$force_refresh) {
        return $cached_settings;
    }

    // Default values matching original website
    $defaults = [
        'id' => 1,
        'site_title' => 'Shell Automotiv',
        'logo' => 'assets/images/logo-web/logo.png',
        'favicon' => 'assets/images/logo-web/logo.png',
        'phone' => '+91 9560595146',
        'whatsapp' => '+91 9560595146',
        'email' => 'shellautomotiv@gmail.com',
        'address' => 'D-61 Sector 10 Noida',
        'maps_link' => 'https://maps.app.goo.gl/yo7YCBZcro7q34UT9',
        'facebook' => 'https://www.facebook.com/profile.php?id=61568488280752',
        'twitter' => 'https://www.twitter.com/shellautomotiv',
        'instagram' => 'https://www.instagram.com/shell.automotiv',
        'linkedin' => 'http://www.linkedin.com/in/shellautomotiv',
        'youtube' => 'https://www.youtube.com/@ShellAutomotiv'
    ];

    $db = get_active_db_connection($connection);
    if (!$db) {
        $cached_settings = $defaults;
        return $cached_settings;
    }

    try {
        // Query setting row 1
        $res = @$db->query("SELECT * FROM `site_settings` WHERE `id` = 1 LIMIT 1");
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            foreach ($defaults as $k => $v) {
                if (isset($row[$k]) && $row[$k] !== null && $row[$k] !== '') {
                    $defaults[$k] = $row[$k];
                }
            }
        } else {
            // Auto-create table if it does not exist
            @$db->query("CREATE TABLE IF NOT EXISTS `site_settings` (
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
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            $stmt = @$db->prepare("INSERT INTO `site_settings` (`id`, `site_title`, `logo`, `favicon`, `phone`, `whatsapp`, `email`, `address`, `maps_link`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`) VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param(
                    "sssssssssssss",
                    $defaults['site_title'],
                    $defaults['logo'],
                    $defaults['favicon'],
                    $defaults['phone'],
                    $defaults['whatsapp'],
                    $defaults['email'],
                    $defaults['address'],
                    $defaults['maps_link'],
                    $defaults['facebook'],
                    $defaults['twitter'],
                    $defaults['instagram'],
                    $defaults['linkedin'],
                    $defaults['youtube']
                );
                $stmt->execute();
                $stmt->close();
            }
        }
    } catch (Throwable $e) {
        // Fallback to defaults on any database error
    }

    $cached_settings = $defaults;
    return $cached_settings;
}
