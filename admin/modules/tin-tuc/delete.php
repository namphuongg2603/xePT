<?php
$open = "tin-tuc";
require_once __DIR__ . "/../../autoload/autoload.php";

$id = intval(getInput('id'));
$editNews = $db->fetchID('posts', $id);
if (empty($editNews)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('tin-tuc');
}

$num = $db->delete('posts', $id);
if ($num > 0) {
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("tin-tuc");
} else {
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("tin-tuc");
}

?>


               