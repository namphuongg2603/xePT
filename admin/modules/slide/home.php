<?php
$open = "slide";
require_once __DIR__ . "/../../autoload/autoload.php";

$id = intval(getInput('id'));

$editslide = $db->fetchID('slide', $id);

if (empty($editslide)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('slide');
}

$home = $editslide['home'] == 0 ? 1 : 0;


$update = $db->update("slide", array("home" => $home), array("id" => $id));

if ($update > 0) {
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("slide");
} else {
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("slide");
}
?>