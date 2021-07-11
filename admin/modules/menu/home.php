<?php
$open = "category";
require_once __DIR__ . "/../../autoload/autoload.php";

$id = intval(getInput('id'));

$editmenu = $db->fetchID('menu', $id);

if (empty($editmenu)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('menu');
}

$home = $editmenu['home'] == 0 ? 1 : 0;


$update = $db->update("menu", array("home" => $home), array("id" => $id));

if ($update > 0) {
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("menu");
} else {
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("menu");
}
?>