<?php
require_once __DIR__ . "/autoload/autoload.php";
$data =
    [
        'name' => postInput("name"),
        'email' => postInput("email"),
        'content' => postInput("content"),
    ];

$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $db->insert("user_contact", $data);
    if ($id) {
        $_SESSION['success'] = " Gủi thông tin liên hệ thành công! Chúng tôi sẽ sớm liên hệ với bạn";
        header("localtion: " . base_url());
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
                            <a title="Đến trang chủ" href="" itemprop="url"><span
                                        itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Liên hệ</strong></li>
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
                    <div ng-if="IsError" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div class="col-md-9 bor">
                        <section class="box-main1">
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
                            <!-- Nội dung -->
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="name">Họ tên:</label>
                                    <input type="text" class="form-control" required="" placeholder="Họ tên .."
                                           name="name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email:</label>
                                    <input type="email" class="form-control" required="" placeholder="Email .."
                                           name="email">
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung liên hệ:</label>
                                    <textarea class="form-control" placeholder="Nhập nội dung ..." name="content"
                                              required=""></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Xác nhận</button>
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