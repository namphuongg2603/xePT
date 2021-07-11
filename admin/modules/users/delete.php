<?php
$open = "users";
require_once __DIR__ . "/../../autoload/autoload.php";

$id = intval(getInput('id'));
$editadmin = $db->fetchID('users', $id);
if (empty($editadmin)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('users');
}

$num = $db->delete('users', $id);
if ($num > 0) {
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("users");
} else {
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("users");
}
?>


               