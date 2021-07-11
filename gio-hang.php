<?php
require_once __DIR__ . "/autoload/autoload.php";
require_once __DIR__ . "/libraries/function.php";

$sum = 0;
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo " <script>alert('Giỏ hàng rỗng');location.href='index.php' </script> ";
}
//dd($_SESSION['cart']); die;
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<div class="main">
    <div class="container">
        <!--NỘI DUNG TRANG ĐĂNG KÝ , PHẦN NÀY SẼ THAY ĐỔI THEO TRANG -->
        <div class="row">
            <div class="col-md-3">
                <div class="menu-account">
                    <h3>
                        <span>
                            Tài khoản
                        </span>
                    </h3>
                    <ul>
                        <li><a href="dang-nhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                        <li><a href="dang-ky.php"><i class="fa fa-key"></i> Đăng ký</a></li>
                        <li><a href="quen-mat-khau.php"><i class="fa fa-key"></i> Quên mật khẩu</a></li>
                    </ul>
                </div>
            </div>
            <!--cột phải-->
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="index.html" itemprop="url"><span
                                        itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Giỏ hàng của bạn</strong></li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () {
                        $(this).find(".s-c-n").show();
                    }, function () {
                        $(this).find(".s-c-n").hide();
                    });
                </script>
                <!--tại đây có hai mục js mà mình chưa chỉnh -->
                <script src="public/frontend/app/services/accountServices.js"></script>
                <script src="public/frontend/app/controllers/accountController.js"></script>
                <div class="register-content clearfix" ng-controller="accountController"
                     ng-init="initRegisterController()">
                    <h1 class="title"><span>Thông tin xe của bạn</span></h1>
                    <div ng-if="IsError" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div ng-if="IsSuccess" class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-check"></i>
                        <strong>Success!</strong> Đăng ký thành công.
                    </div>
                    <div ng-if="InValid" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div class="col-md-9 bor">
                    </div>
                    <section class="box-main1">
<!--                        <h3 class="title-main "><a href=""> Xe của bạn</a></h3>-->
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <strong></strong> <?php echo $_SESSION['success'];
                                unset($_SESSION['success']) ?>
                            </div>
                        <?php endif ?>
                        <table class="table table-hover" id="shoppingcart_info">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên xe</th>
                                <th>Hình ảnh</th>
                                <th>Ngày nhận xe</th>
                                <th>Ngày trả xe</th>
                                <th>Số ngày</th>
                                <th>Giá</th>
                                <th>Tổng tiền</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 1;
                            foreach ($_SESSION['cart'] as $key => $value): ?>
                                <tr>
                                    <td ><?php echo $stt ?></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td>
                                        <img src="public/uploads/product/<?php echo $value['thunbar'] ?>" width="80px"
                                             height="100px" alt="">
                                    </td>
                                    <td><?= $value['datetime1'] ?></td>
                                    <td><?= $value['datetime2'] ?></td>
                                    <td>
                                        <?php echo $value['qty'] ?>
                                    </td>
                                    <td><?php echo formatPrice($value['price']) ?></td>
                                    <td><?php echo formatPrice($value['price'] * $value['qty']) ?></td>
                                    <td>
                                        <a href="remote.php?key=<?php echo $key ?>&action=0" class="btn btn-xs btn-danger"><i
                                                    class="fa fa-remove"></i> Bỏ</a>
                                    </td>
                                </tr>
                                <?php $sum += $value['price'] * $value['qty'];
                                $_SESSION['tongtien'] = $sum; ?>

                                <?php $stt++; endforeach ?>
                            </tbody>
                        </table>
                        <div class="col-md-5 pull-right">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h3>Thông tin đặt xe</h3>
                                </li>
<!--                                <li class="list-group-item" style="height: auto">-->
<!--                                    --><?php //foreach ($_SESSION['cart'] as $key => $value): ?>
<!--                                        <span class="badge">--><?php //echo $value['name'] ?><!--</span>-->
<!--                                            Tên xe-->
<!--                                        --><?php //$stt++; endforeach ?>
<!--                                </li>-->
<!--                                <li class="list-group-item">-->
<!--                                    <span id=""class="badge" >--><?php //echo $value['qty'] ?><!--</span>-->
<!--                                    Số ngày-->
<!--                                </li>-->
                                <li class="list-group-item">
                                    <span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
                                    Số tiền
                                </li>

                                <li class="list-group-item">
                                    <span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'];
                                        echo formatPrice($_SESSION['total']) ?></span>
                                    Tổng tiền thanh toán
                                </li>

                                <li class="list-group-item">
                                    <button onclick="location.href='index.php'" type="submit" class="btn btn-danger">Trả xe</button>
                                    <button onclick="location.href='thanh-toan.php'" class="btn btn-success">Đặt xe</button>
                                    <button onclick="location.href='vnpay_php/index.php'" class="btn btn-primary">Đặt xe và thanh toán</button>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--hiển thị menu TRANG INDEX.PHP-->
<script type="text/javascript">

    // function updateQuantity(input_field){;
    //     $key = "#btn-update-"+ input_field;
    //     $currentValue = $("#qty-" + input_field).val()
    //     $($key).attr("href","remote.php?key=" + input_field + "&action=1&qty=" + $currentValue);
    // }

    $(document).ready(function () {
        $(".menu-quick-select ul").hide();
        $(".menu-quick-select").hover(function () {
            $(".menu-quick-select ul").show();
        }, function () {
            $(".menu-quick-select ul").hide();
        });
    });
</script>
