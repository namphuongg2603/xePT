<?php
    require_once __DIR__ . "/autoload/autoload.php";

    $user = $_SESSION['user'];
    $data = [
        'name' => !empty(postInput("name")) ? postInput("name") : $user['name'],
        'email' => !empty(postInput("email")) ? postInput("email") : $user['email'],
        'phone' => !empty(postInput("phone")) ? postInput("phone") : $user['phone'],
        'adress' => !empty(postInput("adress")) ? postInput("adress") : $user['adress'],
    ];

    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        echo " <script>alert('Giỏ hàng rỗng');location.href='index.php' </script> ";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data1 = [
            "status" => 3,
            "note" => postInput("note"),
            "type" => 1
        ];
        $cart = $_SESSION['cart'];
        $listId = [];
        foreach($cart as $value) {
            $id_update = $db->update('transaction', $data1, array('id' => $value['id_transaction']));
            array_push($listId, $id_update);
        }
        unset($_SESSION['cart']);
        if (!empty($listId)) {
            echo " <script>alert('Bạn đã xác nhận đặt hành thành công chúng tôi sẽ liên hệ giao xe sớm nhất có thể cho bạn');location.href='index.php' </script> ";
        }
    }

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
                        <li class="icon-li"><strong>Thanh toán</strong></li>
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
                    <h1 class="title"><span>Xác nhận đặt xe</span></h1>
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

                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <strong></strong> <?php echo $_SESSION['success'];
                                unset($_SESSION['success']) ?>
                            </div>
                        <?php endif ?>
                        <form action="" method="POST" class="form-horizontal formcustome" role="form"
                              style="margin-top: 20px">
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
                                <div class="col-md-5">
                                    <input type="text" readonly name="name" placeholder=" Nguyễn Minh Đăng "
                                           class="form-control" value="<?php echo $data['name'] ?>">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Email</label>
                                <div class="col-md-5">
                                    <input type="email" name="email" placeholder=" nguyendanggh@gmail.com"
                                           class="form-control" value="<?php echo $data['email'] ?>" readonly>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
                                <div class="col-md-5">
                                    <input type="number" name="phone" placeholder=" 0962398345" class="form-control"
                                           value="<?php echo $data['phone'] ?>" readonly> 

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
                                <div class="col-md-5">
                                    <input type="text" name="adress" placeholder="Xuân An-Nghi Xuân-Hà Tĩnh"
                                           class="form-control" value="<?php echo $data['adress'] ?>" readonly>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Ghi chú</label>
                                <div class="col-md-5">
                                    <input type="text" name="note" placeholder="Xuân An-Nghi Xuân-Hà Tĩnh"
                                           class="form-control" value="">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-success col-md-2 col-md-offset-4"
                                    style="margin-top: 20px;">Xác nhận
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
