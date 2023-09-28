<?php
// 如果 uninstall 沒有從 WordPress 被調用，則退出。
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// 全域資料庫變數
global $wpdb;

// 要刪除的資料表名稱
$table_name = $wpdb->prefix . 'clamav_scan_history';

// 刪除資料表的 SQL 查詢
$wpdb->query("DROP TABLE IF EXISTS $table_name");

// 如有需要，也可以刪除其他選項或資料
// delete_option('your_option_name');
?>
