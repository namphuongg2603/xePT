<?php
$open = "slide";
require_once __DIR__ . "/../../autoload/autoload.php";


$id = intval(getInput('id'));

$editslide = $db->fetchID('slide', $id);
if (empty($editslide)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('slide');
}

if ($editslide['active_slide'] == "active") {
    $_SESSION['error'] = "Mặc định hình slide này không được xóa";
    redirectAdmin("slide");
} else {
    $num = $db->delete('slide', $id);
    if ($num > 0) {
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("slide");
    } else {
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("slide");
    }
}

?>


               