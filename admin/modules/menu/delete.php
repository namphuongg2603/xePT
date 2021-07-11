<?php
$open = "category";
require_once __DIR__ . "/../../autoload/autoload.php";

$id = intval(getInput('id'));
$editMenu = $db->fetchID('menu', $id);
if (empty($editMenu)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('menu');
}


$num = $db->delete('menu', $id);
if ($num > 0) {
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("menu");
} else {
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("menu");
}

?>


               