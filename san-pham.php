<?php
require_once __DIR__ . "/autoload/autoload.php";
$sql = "SELECT * FROM product WHERE 1";

$keyword = '';
if (isset($_GET['k'])) {
    $keyword = $_GET['k'];
    $sql .= " AND name LIKE '%$keyword%' ";
}

$cate = 0;
if (isset($_GET['danh-muc'])) {
    $cate = $_GET['danh-muc'];
}
$categoryCurrent = [];
if ($cate) {
    $sql .= " AND category_id_chil =  " . $cate;
    $categoryCurrent = $db->fetchID('category', $cate);
    if (!$categoryCurrent) {
        $categoryCurrent = $db->fetchID('category_chil', $cate);
    }
}

//    dd($categoryCurrent);
$products = [];
$products = $db->fetchsql($sql, $debug = false);
?>

<?php require_once __DIR__ . "/layouts/header.php"; ?>

<div class="main">
    <div class="container">
        <!--NỘI DUNG TRANG ĐĂNG KÝ , PHẦN NÀY SẼ THAY ĐỔI THEO TRANG -->
        <div class="row">
            <!--THƯỜNG THÌ NÓ DÙNG ĐỂ QUẢNG CÁO CÁC ĐỐI TÁC-->
            <div class="partner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!--Blog-->
                            <section id="blog_index" class="container m-b-20">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="section-heading">
                                            <h2 title="Tin tức nổi bật">
                                                <?php if (empty($categoryCurrent)) : ?>
                                                    <span>Sản phẩm</span>
                                                <?php else : ?>
                                                    <span><?= $categoryCurrent['name'] ?></span>
                                                <?php endif; ?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="" class="">
                                        <?php foreach ($products as $product) : ?>
                                            <div class="col-md-3 article_item">
                                                <div class="article_img">
                                                    <a href="chi-tiet-san-pham.php?id= <?php echo $product['id'] ?>">
                                                        <img style='width:220px; height: 220px' src="public/uploads/product/<?php echo $product['thunbar'] ?>"
                                                             class="">
                                                    </a>
                                                </div>
                                                <div class="article_content clearfix">
                                                    <div class="title">
                                                        <h4>
                                                            <a href="chi-tiet-san-pham.php?id= <?php echo $product['id'] ?>"> <?php echo $product['name']; ?></a>
                                                        </h4>
                                                    </div>
                                                    <a class="readmore" href="chi-tiet-san-pham.php?id= <?php echo $product['id'] ?>">Xem chi tiết<i
                                                                class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </section>
                            <!--EndBlog-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/layouts/footer.php"; ?>
<!--hiển thị menu TRANG INDEX.PHP-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".menu-quick-select ul").hide();
        $(".menu-quick-select").hover(function () {
            $(".menu-quick-select ul").show();
        }, function () {
            $(".menu-quick-select ul").hide();
        });
    });
</script>