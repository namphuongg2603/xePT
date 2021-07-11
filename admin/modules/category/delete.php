<?php
$open = "category";
require_once __DIR__ . "/../../autoload/autoload.php";

$id = intval(getInput('id'));
$editCategory = $db->fetchID('category', $id);
if (empty($editCategory)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('category');
}

/*kiểm tra danh mục có sản phẩm chưa*/
$kt_product = $db->fetchOne("product", " category_id = $id ");
if ($kt_product == NULL) {
    $num = $db->delete('category', $id);
    if ($num > 0) {
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("category");
    } else {
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("category");
    }
} else {
    $_SESSION['error'] = "Danh mục đang có sản phẩm!  Bạn không thể xóa";
    redirectAdmin("category");
}
/*end kt*/
?>


               