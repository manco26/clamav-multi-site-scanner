<?php
// install.php

global $wpdb;
$table_name = $wpdb->prefix . 'clamav_scan_history';

// 建立新的資料庫表格
$sql = "CREATE TABLE $table_name (
    id int(11) NOT NULL AUTO_INCREMENT,
    scan_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    site_id int(11) NOT NULL,
    scan_result text NOT NULL,
    PRIMARY KEY  (id)
);";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
?>
