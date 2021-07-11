<?php
require_once __DIR__ . "/autoload/autoload.php";

$data =
    [
        'name' => postInput("name"),
        'email' => postInput("email"),
        'password' => postInput("password"),
        'phone' => postInput("phone"),
        'adress' => postInput("adress"),
        'level' => postInput("level"),
    ];
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($data['name'] == '') {
        $error['name'] = "Tên không được để chống";
    }
    if ($data['email'] == '') {
        $error['email'] = "Email không được để chống";
    } else {
        $is_check = $db->fetchOne("users", "email= '" . $data['email'] . "'  ");
        if ($is_check != NULL) {
            $error['email'] = "Email đã tồn tại";
        }
    }
    if ($data['password'] == '') {
        $error['password'] = "Mật khẩu không được để chống";
    } else {
        $data['password'] = MD5(postInput("password"));
    }
    if ($data['phone'] == '') {
        $error['phone'] = "Số điện thoại không được để chống";
    }
    if ($data['adress'] == '') {
        $error['adress'] = "Địa chỉ không được để chống";
    }

    if (empty($error)) {
        $id_insert = $db->insert("users", $data);
        if ($id_insert > 0) {
            $_SESSION['success'] = "Đăng ký thành công ! Mời sang trang đăng nhập để nhập ";
            header("localtion: dang-nhap.php");
        } else {

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
            <!--cột phải-->
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="index.html" itemprop="url"><span
                                        itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Đăng ký tài khoản</strong></li>
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
                    <h1 class="title"><span>Đăng ký tài khoản</span></h1>
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
                        <h3 class="title-main "><a href=""> Đăng ký</a></h3>
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
                                    <input type="text" name="name" placeholder="Nguyễn Văn A" class="form-control"
                                           value="<?php echo $data['name'] ?>">
                                    <?php if (isset($error['name'])): ?>
                                        <p class="text-danger"> <?php echo $error['name'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Email</label>
                                <div class="col-md-5">
                                    <input type="email" name="email" placeholder=" nguyenvana@gmail.com"
                                           class="form-control" value="<?php echo $data['email'] ?>">
                                    <?php if (isset($error['email'])): ?>
                                        <p class="text-danger"><?php echo $error['email'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Mật khẩu</label>
                                <div class="col-md-5">
                                    <input type="password" name="password" placeholder=" ********" class="form-control"
                                           value="<?php echo $data['password'] ?>">
                                    <?php if (isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
                                <div class="col-md-5">
                                    <input type="number" name="phone" placeholder=" 09623*****" class="form-control"
                                           value="<?php echo $data['phone'] ?>">
                                    <?php if (isset($error['phone'])): ?>
                                        <p class="text-danger"> <?php echo $error['phone'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
                                <div class="col-md-5">
                                    <input type="text" name="adress" placeholder="Địa chỉ"
                                           class="form-control" value="<?php echo $data['adress'] ?>">
                                    <?php if (isset($error['adress'])): ?>
                                        <p class="text-danger"> <?php echo $error['adress'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-md-offset-1"></label>
                                <div class="col-md-5">
                                    <label for="level">
                                        <input type="checkbox" name="level"
                                               class="" value="2" id="level" style="width: 30px; height: 20px"> <span class="partner_level">Trở thành đối tác</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success col-md-2 col-md-offset-4"
                                    style="margin-top: 20px;">Đăng ký
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
