<?php
require_once __DIR__ . "/autoload/autoload.php";
$data =
    [
        'email' => postInput("email"),
        'password' => postInput("password")
    ];
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($data['email'] == '') {
        $error['email'] = "Email không được để trống";
    }
    if ($data['password'] == '') {
        $error['password'] = "Mật khẩu không được để trống";
    }
    if (empty($error)) {
        $is_check = $db->fetchOne("users", "email= '" . $data['email'] . "' AND password = '" . MD5($data['password']) . "' ");

        if ($is_check != NULL) {
            $_SESSION['name_user'] = $is_check['name'];
            $_SESSION['name_id'] = $is_check['id'];
            $_SESSION['level'] = $is_check['level'];
            $_SESSION['user'] = $is_check;
            $redirect_location = "index.php";
            echo " <script>alert(' Đăng nhập thành công ');location.href='$redirect_location' </script> ";
        } else {
            $_SESSION['error'] = "Đăng nhập thất bại";
        }
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
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="" itemscope="" class="home">
                            <a title="Đến trang chủ" href="index.html" itemprop="url"><span
                                        itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Đăng nhập</strong></li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () {
                        $(this).find(".s-c-n").show();
                    }, function () {
                        $(this).find(".s-c-n").hide();
                    });
                </script>
                <script src="public/frontend/app/services/accountServices.js"></script>
                <script src="public/frontend/app/controllers/accountController.js"></script>
                <div class="login-content clearfix" ng-controller="accountController" ng-init="initController()">
                    <h1 class="title"><span>Đăng nhập hệ thống</span></h1>
                    <div ng-if="IsError" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Đăng nhập</a></h3>
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <strong></strong> <?php echo $_SESSION['success'];
                                    unset($_SESSION['success']) ?>
                                </div>
                            <?php endif ?>
                            <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger">
                                    <strong>Lỗi! </strong><?php echo $_SESSION['error'];
                                    unset($_SESSION['error']) ?>
                                </div>
                            <?php endif ?>
                            <form action="" method="POST" class="form-horizontal formcustome" role="form"
                                  style="margin-top: 20px">
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1"> Email</label>
                                    <div class="col-md-5">
                                        <input type="email" name="email" placeholder=" nguyendanggh@gmail.com"
                                               class="form-control">
                                        <?php if (isset($error['email'])): ?>
                                            <p class="text-danger"><?php echo $error['email'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1"> Mật khẩu</label>
                                    <div class="col-md-5">
                                        <input type="password" name="password" placeholder=" *****"
                                               class="form-control">
                                        <?php if (isset($error['password'])): ?>
                                            <p class="text-danger"><?php echo $error['password'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary"> Đăng nhập</button>
                                        <a href="quen-mat-khau.php">Quên mật khẩu?</a>
                            </form>
                            <!-- Nội dung -->
                        </section>
                    </div>

                    </form>
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