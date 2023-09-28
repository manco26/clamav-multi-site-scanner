<?php
// admin-interface.php

// 管理介面
function clamav_admin_interface() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'clamav_scan_history';

    // 處理掃描按鈕按下後的動作
    if (isset($_POST['start_scan'])) {
        // 假設這裡有執行掃描的程式碼，並將結果存入$scan_result
        $scan_result = '假設的掃描結果';

        // 將掃描結果存入資料庫
        $wpdb->insert(
            $table_name,
            array(
                'scan_date' => current_time('mysql'),
                'scan_result' => $scan_result
            )
        );
    }

    // 從資料庫讀取歷史紀錄
    $history = $wpdb->get_results("SELECT * FROM $table_name");

    // HTML介面
    echo '<div class="wrap">';
    echo '<h1>ClamAV 多站台掃描</h1>';

    echo '<form method="post">';
    echo '<input type="submit" name="start_scan" class="button button-primary" value="開始掃描">';
    echo '</form>';

    echo '<h2>掃描歷史</h2>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>掃描日期</th><th>掃描結果</th></tr></thead>';
    echo '<tbody>';

    foreach ($history as $record) {
        echo '<tr>';
        echo '<td>' . $record->scan_date . '</td>';
        echo '<td>' . $record->scan_result . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

// 將這個函式添加到WordPress後台選單
add_action('admin_menu', 'clamav_menu');

function clamav_menu() {
    add_menu_page(
        'ClamAV 多站台掃描', 
        'ClamAV 掃描', 
        'manage_options', 
        'clamav-multi-site-scanner', 
        'clamav_admin_interface'
    );
}
?>
