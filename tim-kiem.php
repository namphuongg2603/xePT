<?php
require_once __DIR__ . "/autoload/autoload.php";
$sql = "SELECT * FROM product WHERE 1";
$keyword = '';
if (isset($_GET['k'])) {
    $keyword = $_GET['k'];
    $sql .= " AND name LIKE '%$keyword%' ";
}

if (isset($_GET['price'])) {
    $price = $_GET['price'];
    if ($price == 1) {
        $sql .= " AND price <  100000000 ";
    } elseif ($price == 2) {
        $sql .= ' AND price BETWEEN  100000000 AND 300000000';
    } elseif ($price == 3) {
        $sql .= ' AND price BETWEEN  300000000 AND 500000000';
    } else {
        $sql .= " AND price >  500000000 ";
    }
}

$kqtk = $db->fetchsql($sql, $debug = false);

?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
    <style>
        .section-heading:before {
            top: 40%;
        }
    </style>
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
                                                <h2 title="Kết quả tìm kiếm" style="margin-top: 20px;">Kết quả tìm kiếm</h2>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="" class="">
                                            <?php foreach ($kqtk as $product) : ?>
                                                <div class="col-md-3 article_item">
                                                    <div class="article_img">
                                                        <a href="chi-tiet-san-pham.php?id= <?php echo $product['id'] ?>">
                                                            <img src="public/uploads/product/<?php echo $product['thunbar'] ?>"
                                                                 class="">
                                                        </a>
                                                    </div>
                                                    <div class="article_content clearfix">
                                                        <div class="title">
                                                            <h4>
                                                                <a href="chi-tiet-san-pham.php?id= <?php echo $product['id'] ?>"> <?php echo $product['name']; ?></a>
                                                            </h4>
                                                        </div>
                                                        <a class="readmore" href="chi-tiet-san-pham.php">Xem chi tiết<i
                                                                    class="fa fa-angle-double-right"
                                                                    aria-hidden="true"></i></a>
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