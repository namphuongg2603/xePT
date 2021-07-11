<?php
session_start();
require_once __DIR__ . "/../libraries/database.php";
require_once __DIR__ . "/../libraries/Function.php";
require_once __DIR__ . "/Url.php";

$db = new Database;

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . "/xehaidang/public/uploads/");

$category = $db->fetchAll('category');

/*LẤY DS SẢN PHẨM MỚI NHẤT*/
$sqlnew = "SELECT * FROM product WHERE 1 ORDER BY id DESC LIMIT 4";
$productNew = $db->fetchsql($sqlnew);
/*LẤY DS SẢN PHẨM KHUYẾN MÃI*/
$sqlnewKM = "SELECT * FROM product WHERE sale>0 ORDER BY id DESC LIMIT 3";
$productNewKM = $db->fetchsql($sqlnewKM);
// danh sách menu
$MENULIST = $db->fetchAll('menu');
// lấy danh sách sản phẩm xe 7 chổ
$sqlsp7 = "SELECT product.*,category_chil.fixcate from product LEFT JOIN category_chil on category_chil.id=product.category_id_chil WHERE category_chil.fixcate = 1 ORDER BY product.id DESC LIMIT 4";
$listproduct7 = $db->fetchsql($sqlsp7);

$sqltr8 = "SELECT product_id FROM transaction WHERE status = 2";
$listTransaction = $db->fetchsql($sqltr8);
$listProductTr = [];
foreach($listTransaction as $valua) {
    array_push($listProductTr, $valua['product_id']);
}
$listProductTrCount = array_count_values($listProductTr);

$data = [];
if(!empty($listProductTrCount)) {
    foreach($listProductTrCount as $key => $item) {
        array_push($data, ['id_product' => $key, 'total' =>  $item]);
    }
}
usort($data, function ($a, $b) {return $a['total'] < $b['total'];});

$listproduct8 = [];
foreach($data as $key => $pro) {
    $sql = "SELECT product.*,category_chil.fixcate from product LEFT JOIN category_chil on category_chil.id=product.category_id_chil WHERE  product.id = " . $pro['id_product'];
    $p = $db->fetchsql($sql);
    if(isset($p[0])) {
    $listproduct8[$key] =  $p[0];
    }
}

// lấy danh sách sản phẩm xe 4 chổ
$sqlsp4 = "SELECT product.*,category_chil.fixcate from product LEFT JOIN category_chil on category_chil.id=product.category_id_chil WHERE category_chil.fixcate = 0 ORDER BY product.id DESC LIMIT 4";
$listproduct4 = $db->fetchsql($sqlsp4);



//xử lý category con
$categorychill = $db->fetchAll('category_chil');
function showMenuLi($categorychill, $id_parent = 0)
{
    # BƯỚC 1: LỌC DANH SÁCH MENU VÀ CHỌN RA NHỮNG MENU CÓ ID_PARENT = $id_parent

    // Biến lưu menu lặp ở bước đệ quy này
    $menu_tmp = array();

    foreach ($categorychill as $key => $item) {
        // Nếu có parent_id bằng với parrent id hiện tại
        if ((int)$item['category_id'] == (int)$id_parent) {
            $menu_tmp[] = $item;
            // Sau khi thêm vào biên lưu trữ menu ở bước lặp
            // thì unset nó ra khỏi danh sách menu ở các bước tiếp theo
            unset($categorychill[$key]);
        }
    }

    # BƯỚC 2: lẶP MENU THEO DANH SÁCH MENU Ở BƯỚC 1

    // Điều kiện dừng của đệ quy là cho tới khi menu không còn nữa
    if ($menu_tmp) {
        echo '<ul class="level1">';
        foreach ($menu_tmp as $item) {
            echo '<li class="level1">';
            echo '<a class="" href="san-pham.php?danh-muc=' . $item["id"] . '">';
            echo '<span>' . $item['name'] . ' </span></a>';

            // Gọi lại đệ quy
            // Truyền vào danh sách menu chưa lặp và id parent của menu hiện tại
//                showMenuLi($categorychill, $item['category_id']);
            echo '</li>';
        }
        echo '</ul class="level1">';
    }
}

?>
