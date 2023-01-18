<?php

/**
 * Một tập lệnh PHP cho phép thực thi các tập lệnh Python trên máy chủ PHP.
 */

$get_uri = $_SERVER['REQUEST_URI'];
$get_uri_segments = explode('/', $get_uri);

# Thư mục chứa các tập lệnh Python
$py_dir = 'python';
# Quét tất cả các tập tin .py
$py_files = glob($py_dir . '/*.py');
$py_path = $get_uri_segments[2];
if (empty($py_path)) {
    $py_path = 'index.php';
}
# Kiểm tra xem tập lệnh Python có tồn tại không
if (file_exists($py_dir . '/' . $py_path)) {
    # Quay lại trang chủ
    echo '<a href=".">Quay lại trang chủ</a><br/><hr/>';
    # Nếu có, thực thi tập lệnh Python
    $py = shell_exec('python ' . $py_dir . '/' . $py_path);
    # In kết quả
    echo $py;
} else {
    echo '<h1>Danh sách tập lệnh Python</h1>';
    # Báo lỗi nếu tập lệnh Python không tồn tại
    if (substr($py_path, -3) == '.py') {
        echo '<p style="font-weight:700">[ Tập lệnh <span style="color:red">'. $py_path . '</span> không tồn tại ]</p>';
    }
    # Đếm số tập lệnh Python
    $py_files_count = count($py_files);
    # Trả về danh sách tập lệnh Python
    if ($py_files_count > 0) {
        echo '<ul>';
        foreach ($py_files as $py_file) {
            $py_file_name = basename($py_file);
            echo '<li><a href="' . $py_file_name . '">' . $py_file_name . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'Không có tập lệnh Python nào.';
    }
}

