<?php
    require_once __DIR__ . "/autoload/autoload.php";
    $data = [];
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        header("localtion: index.php");
    }

    $dataUpdate = [
        'name' => postInput("name"),
        'email' => postInput("email"),
        'phone' => postInput("phone"),
        'adress' => postInput("adress"),
        'level' => postInput("level")
    ];

    $error = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($dataUpdate['name'] == '') {
            $error['name'] = "Tên không được để chống";
        }
        if ($dataUpdate['email'] == '') {
            $error['email'] = "Email không được để chống";
        }

        if ($dataUpdate['phone'] == '') {
            $error['phone'] = "Số điện thoại không được để chống";
        }
        if ($dataUpdate['adress'] == '') {
            $error['adress'] = "Địa chỉ không được để chống";
        }

        if (empty($error)) {

            $id_update = $db->update("users", $dataUpdate, array('id' => intval($user['id'])));
            $is_check = $db->fetchOne("users", "id = '" . $user['id'] . "'");
            $_SESSION['user'] = $is_check;
            $_SESSION['success'] = "Cập nhật thành công !";
            header("localtion: thong-tin-tai-khoan.php");
        }
    }

    $data = $db->fetchOne("users", "id = '" . $user['id'] . "'");
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="menu-account">
                    <h3>
                        <span>
                            Tài khoản
                        </span>
                    </h3>
                    <ul>
                        <li><a href="thong-tin-tai-khoan.php"><i class="fa fa-fw fa-user"> </i> Thông tin tài khoản</a></li>
                        <li><a href="thong-tin-dat-xe.php"><i class="fa fa-fw fa-truck"> </i> Quản lý thông tin đặt xe</a></li>
                        <li><a href="doi-mat-khau.php"><i class="fa fa-key"> </i>  Đổi mật khẩu </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="" itemscope="" class="home">
                            <a title="Đến trang chủ" href="index.php" itemprop="url"><span
                                    itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Thông tin tài khoản</strong></li>
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
                    <h1 class="title"><span>Thông tin tài khoản</span></h1>
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
                            <form action="" method="POST" class="form-horizontal formcustome" role="form"
                                  style="margin-top: 20px">
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
                                    <div class="col-md-5">
                                        <input type="text" name="name" placeholder="Nguyễn Văn A" class="form-control"
                                               value="<?php echo isset($data['name']) ? $data['name'] : ''?>">
                                        <?php if (isset($error['name'])): ?>
                                            <p class="text-danger"> <?php echo $error['name'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1"> Email</label>
                                    <div class="col-md-5">
                                        <input type="email" name="email" placeholder=" nguyenvana@gmail.com"
                                               class="form-control" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>">
                                        <?php if (isset($error['email'])): ?>
                                            <p class="text-danger"><?php echo $error['email'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
                                    <div class="col-md-5">
                                        <input type="number" name="phone" placeholder=" 09623*****" class="form-control"
                                               value="<?php echo isset($data['phone']) ? $data['phone'] : '' ?>">
                                        <?php if (isset($error['phone'])): ?>
                                            <p class="text-danger"> <?php echo $error['phone'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
                                    <div class="col-md-5">
                                        <input type="text" name="adress" placeholder="Địa chỉ"
                                               class="form-control" value="<?php echo isset($data['adress']) ? $data['adress'] : '' ?>">
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
                                                <?php echo isset($data['level']) && $data['level'] == 2 ? 'checked' : '' ?> value="2" id="level" style="width: 30px; height: 20px"> <span class="partner_level">Trở thành đối tác</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success col-md-2 col-md-offset-4"
                                        style="margin-top: 20px;"> Cập nhật
                                </button>
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