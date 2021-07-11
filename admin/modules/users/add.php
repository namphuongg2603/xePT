<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "users";
$data =
    [
        "name" => postInput('name'),
        "email" => postInput('email'),
        "adress" => postInput('adress'),
        "password" => MD5(postInput('password')),
        "phone" => postInput('phone')

    ];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $erro = [];

    if (postInput('name') == '') {
        $erro['name'] = "Mời bạn nhập đầy đủ tên";
    }
    if (postInput('email') == '') {
        $erro['email'] = "Mời bạn nhập email";
    } else {
        $is_check = $db->fetchOne("users", " email = '" . $data['email'] . "' ");
        if ($is_check != NULL) {
            $erro['email'] = "Email đã tồn tại";
        }

    }
    if (postInput('adress') == '') {
        $erro['adress'] = "Mời bạn nhập địa chỉ";
    }
    if (postInput('phone') == '') {
        $erro['phone'] = "Mời bạn nhập số điện thoại";
    }

    if ($data['password'] != MD5(postInput('re_password'))) {
        $erro['password'] = "Mật khẩu không khớp";
    }

    if (postInput('name') != '') {
        if (empty($erro)) {
            $id_insert = $db->insert('users', $data);
            if ($id_insert) {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("users");
            } else {
                $_SESSION['error'] = "Thêm mới không thành công";
                redirectAdmin("users");
            }
        }
    }

}
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới Users
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Bảng Điều Khiển</a>
            </li>
            <li>
                <i></i> <a href="<?php echo(base_url()) ?>admin/modules/category/add.php">Users</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Thêm mới
            </li>
        </ol>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']) ?>
            </div>
        <?php endif ?>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Họ và Tên</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Họ và Tên" name="name"
                           value="<?php echo $data['name'] ?>">
                    <?php if (isset($erro['name'])) : ?>
                        <p class="text-danger"><?php echo $erro['name'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmai13" placeholder="congtoan.it.ltv@gmail.com"
                           name="email" value="<?php echo $data['email'] ?>">
                    <?php if (isset($erro['email'])) : ?>
                        <p class="text-danger"><?php echo $erro['email'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label"> Phone</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmai13" placeholder="0909943262" name="phone"
                           value="<?php echo $data['phone'] ?>">
                    <?php if (isset($erro['phone'])) : ?>
                        <p class="text-danger"><?php echo $erro['phone'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label"> Mật khẩu </label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputEmai13" placeholder="********" name="password"
                           value="<?php echo $data['password'] ?>">
                    <?php if (isset($erro['password'])) : ?>
                        <p class="text-danger"><?php echo $erro['password'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label"> Nhập lại mật khẩu </label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputEmai13" placeholder="********"
                           name="re_password" required="Vui lòng nhập lại mật khẩu">
                    <?php if (isset($erro['re_password'])) : ?>
                        <p class="text-danger"><?php echo $erro['re_password'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Địa chỉ</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="địa chỉ" name="adress"
                           value="<?php echo $data['adress'] ?>">
                    <?php if (isset($erro['adress'])) : ?>
                        <p class="text-danger"><?php echo $erro['adress'] ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               