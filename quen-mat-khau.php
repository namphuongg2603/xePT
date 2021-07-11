<?php
require_once __DIR__ . "/autoload/autoload.php";
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
                        <li><a href="thay-doi-mat-khau.php"><i class="fa fa-key"></i> Quên mật khẩu</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="index.php" itemprop="url"><span
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
                <div class="login-content clearfix ng-scope" ng-controller="accountController"
                     ng-init="initController()">
                    <h1 class="title"><span>Đăng nhập hệ thống</span></h1>

                    <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <form class="form-horizontal ng-pristine ng-valid-email ng-invalid ng-invalid-required"
                              ng-submit="login()">
                            <div class="form-group">
                                <label for="Email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email"
                                           class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required"
                                           ng-model="Email" ng-required="true" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" class="col-sm-4 control-label">Mật khẩu</label>
                                <div class="col-sm-8">
                                    <input type="password"
                                           class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required"
                                           ng-model="Password" ng-required="true" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    <a href="thay-doi-mat-khau.php">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </form>
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
