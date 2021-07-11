<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "slide";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "name" => postInput('name')
        ];

    $erro = [];

    if (postInput('name') == '') {
        $erro['name'] = "Mời bạn nhập đầy đủ tên";
    }

    if (!isset($_FILES['thunbar'])) {
        $erro['thunbar'] = "Mời bạn chọn hình ảnh";
    }

    if (postInput('name') != '') {
        if (empty($erro)) {
            if (isset($_FILES['thunbar'])) {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];

                if ($file_erro == 0) {
                    $part = ROOT . "slide/";
                    $data['thunbar'] = $file_name;
                }
            }
            $isset = $db->fetchOne("slide", " name ='" . $data['name'] . "' ");
            if (count($isset) > 0) {
                $_SESSION['error'] = "Tên Slide ảnh đã tồn tại! nhập tên Slide ảnh khác";
            } else {
                $id_insert = $db->insert('slide', $data);
                if ($id_insert > 0) {
                    move_uploaded_file($file_tmp, $part . $file_name);
                    $_SESSION['success'] = "Thêm mới thành công";
                    redirectAdmin("slide");
                } else {
                    $_SESSION['error'] = "Thêm mới không thành công";
                    redirectAdmin("slide");
                }
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
            Thêm mới Hình ảnh banner
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Bảng Điều Khiển</a>
            </li>
            <li>
                <i></i> <a href="<?php echo(base_url()) ?>admin/modules/slide/add.php">banner</a>
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
                <label for="inputEmai13" class="col-sm-2 control-label">Tên baner</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Tên Banner" name="name">
                    <?php if (isset($erro['name'])) : ?>
                        <p class="text-danger"><?php echo $erro['name'] ?></p>
                    <?php endif ?>
                </div>
                <label for="inputEmai13" class="col-sm-1 control-label">Hình ảnh</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control" id="inputEmai13" name="thunbar">
                    <?php if (isset($erro['thunbar'])) : ?>
                        <p class="text-danger"><?php echo $erro['thunbar'] ?></p>
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

               