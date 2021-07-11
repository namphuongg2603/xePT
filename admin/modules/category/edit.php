<?php
require_once __DIR__ . "/../../autoload/autoload.php";

$id = intval(getInput('id'));
$editCategory = $db->fetchID('category', $id);
if (empty($editCategory)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('category');
}

$open = "category";
$slide = $db->fetchAll("category");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];
    $erro = [];

    if (postInput('name') == '') {
        $erro['name'] = "Mời bạn nhập đầy đủ tên danh mục";
    }
    if (postInput('name') != '') {
        if (empty($erro)) {
            if ($editCategory['name'] != $data['name']) {
                $isset = $db->fetchOne("category", " name ='" . $data['name'] . "' ");
                if (count($isset) > 0) {
                    $_SESSION['error'] = "Tên danh mục đã tồn tại! nhập tên danh mục khác";
                } else {
                    $id_update = $db->update('category', $data, array('id' => $id));
                    if ($id_update > 0) {
                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("category");
                    } else {
                        $_SESSION['error'] = "Dữ liệu không thay đổi";
                        redirectAdmin("category");
                    }
                }
            } else {
                $id_update = $db->update('category', $data, array('id' => $id));
                if ($id_update > 0) {
                    $_SESSION['success'] = "Cập nhật thành công";
                    redirectAdmin("category");
                } else {
                    $_SESSION['error'] = "Dữ liệu không thay đổi";
                    redirectAdmin("category");
                }
            }
        }
    }

}
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<div id="page-wrapper">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Cập nhật Danh Mục
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bảng Điều Khiển</a>
                </li>
                <li>
                    <i></i> <a href="<?php echo(base_url()) ?>admin/modules/category/add.php">Danh Mục</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Cập nhật
                </li>
            </ol>
            <div class="clearfix"></div>
            <!--thông báo lỗi-->
            <?php require_once __DIR__ . "/../../../partials/notification.php"; ?>
            <!--end thông báo-->
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Tên Danh Mục</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmai13" placeholder="Tên danh mục" name="name"
                               value="<?php echo $editCategory['name'] ?>">
                        <?php if (isset($erro['name'])) : ?>
                            <p class="text-danger"><?php echo $erro['name'] ?></p>
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
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               