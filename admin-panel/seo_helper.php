<?php
// Ensure site_settings_helper is loaded for connection management
require_once __DIR__ . '/site_settings_helper.php';

/**
 * Ensure page_seo table exists safely
 */
function ensure_seo_table_exists($connection = null) {
    $db = get_active_db_connection($connection);
    if (!$db) return false;

    try {
        $sql = "CREATE TABLE IF NOT EXISTS `page_seo` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `page_name` varchar(255) NOT NULL,
            `page_url` varchar(255) NOT NULL UNIQUE,
            `meta_title` varchar(255) DEFAULT NULL,
            `meta_description` text DEFAULT NULL,
            `meta_keywords` text DEFAULT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        return @$db->query($sql);
    } catch (Throwable $e) {
        return false;
    }
}

/**
 * Fetch SEO details for a given page URL/identifier safely
 */
function get_page_seo($page_identifier = null, $connection = null) {
    $db = get_active_db_connection($connection);
    if (!$db) return null;

    if (empty($page_identifier)) {
        $page_identifier = basename($_SERVER['PHP_SELF'] ?? 'index.php');
    }

    $clean_ident = trim(strtolower($page_identifier));
    $without_php = preg_replace('/\.php$/i', '', $clean_ident);
    $with_php    = $without_php . '.php';

    try {
        ensure_seo_table_exists($db);

        $stmt = @$db->prepare("SELECT * FROM `page_seo` WHERE LOWER(`page_url`) = ? OR LOWER(`page_url`) = ? LIMIT 1");
        if ($stmt) {
            $stmt->bind_param("ss", $with_php, $without_php);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($res && $row = $res->fetch_assoc()) {
                $stmt->close();
                return $row;
            }
            $stmt->close();
        }
    } catch (Throwable $e) {
        // Safe fail
    }

    return null;
}

/**
 * Render HTML SEO meta tags dynamically
 * Only outputs tags if admin has configured them.
 */
function render_seo_tags($page_identifier = null, $connection = null) {
    try {
        $seo = get_page_seo($page_identifier, $connection);
        if (!$seo) {
            return; // Admin ne add nahi kiya toh kuch nahi dikhega
        }

        $output = [];
        if (!empty($seo['meta_title'])) {
            $output[] = '    <title>' . htmlspecialchars($seo['meta_title'], ENT_QUOTES, 'UTF-8') . '</title>';
        }
        if (!empty($seo['meta_description'])) {
            $output[] = '    <meta name="description" content="' . htmlspecialchars($seo['meta_description'], ENT_QUOTES, 'UTF-8') . '">';
        }
        if (!empty($seo['meta_keywords'])) {
            $output[] = '    <meta name="keywords" content="' . htmlspecialchars($seo['meta_keywords'], ENT_QUOTES, 'UTF-8') . '">';
        }

        if (!empty($output)) {
            echo implode("\n", $output) . "\n";
        }
    } catch (Throwable $e) {
        // Safe fallback
    }
}
