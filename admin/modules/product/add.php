<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "product";

if (!isset($_SESSION['user'])) {
    return redirectStyle('index.php');
}
if (!empty($_SESSION['user']) && isset($_SESSION['level']) && $_SESSION['level'] == 1 || $_SESSION['level'] == 2) {
    $user = $_SESSION['user'];
} else {
    return redirectStyle('index.php');
}

$category = $db->fetchAll('category');
$categorychil = $db->fetchAll('category_chil');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name')),
            "category_id_chil" => postInput('category_id_chil'),
            "price" => postInput('price'),
            "number" => postInput('number'),
            "note" => postInput('note'),
            "sale" => postInput('sale')
        ];
    $erro = [];

    if (postInput('name') == '') {
        $erro['name'] = "Mời bạn nhập đầy đủ tên danh mục";
    }
    if (postInput('category_id_chil') == '') {
        $erro['category_id_chil'] = "Mời bạn chọn tên danh mục";
    }
    if (postInput('price') == '') {
        $erro['price'] = "Mời bạn nhập giá sản phẩm";
    }
    if (postInput('number') == '') {
        $erro['number'] = "Mời bạn nhập số lượng";
    }
    if (postInput('sale') == '') {
        $erro['sale'] = "Mời bạn nhập giảm giá ! nếu không thì nhập 0";
    }

    if (postInput('note') == '') {
        $erro['note'] = "Mời bạn nhập ghi chú";
    }


    if (!isset($_FILES['thunbar'])) {
        $erro['thunbar'] = "Mời bạn chọn hình ảnh";
    }
    $data['user_id'] = $_SESSION['user']['id'];

    if (postInput('name') != '') {
        if (empty($erro)) {
            if (isset($_FILES['thunbar'])) {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];

                if ($file_erro == 0) {
                    $part = ROOT . "product/";
                    $data['thunbar'] = $file_name;
                }
            }

            $id_insert = $db->insert('product', $data);
            if ($id_insert) {
                move_uploaded_file($file_tmp, $part . $file_name);
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("product");
            } else {
                $_SESSION['error'] = "Thêm mới không thành công";
                redirectAdmin("product");
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
                Thêm mới Sản Phẩm
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bảng Điều Khiển</a>
                </li>
                <li>
                    <i></i> <a href="<?php echo(base_url()) ?>admin/modules/category/add.php">Sản Phẩm</a>
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
                    <label for="inputEmai13" class="col-sm-2 control-label">Danh mục</label>
                    <div class="col-sm-8">
                        <select class="form-control col-md-8" name="category_id_chil">
                            <option value="">-Mời bạn chọn danh mục dịch vụ xe-</option>
                            <?php foreach ($categorychil as $item): ?>
                                <option value="<?php echo $item['id'] ?>">
                                    <?php echo $item['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($erro['category_chil'])) : ?>
                            <p class="text-danger"><?php echo $erro['category_chil'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Tên Xe</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmai13" placeholder="Tên Sản Phẩm" name="name">
                        <?php if (isset($erro['name'])) : ?>
                            <p class="text-danger"><?php echo $erro['name'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Giá Xe</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputEmai13" placeholder="9.000.000" name="price">
                        <?php if (isset($erro['price'])) : ?>
                            <p class="text-danger"><?php echo $erro['price'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label"> Số lượng</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputEmai13" placeholder="100" name="number">
                        <?php if (isset($erro['number'])) : ?>
                            <p class="text-danger"><?php echo $erro['number'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label"> Ghi chú</label>
                    <div class="col-sm-8">
                        <textarea name="note" id="" cols="30" rows="4" class="form-control"></textarea>
                        <?php if (isset($erro['note'])) : ?>
                            <p class="text-danger"><?php echo $erro['note'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Giảm giá</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="inputEmai13" placeholder="10%" name="sale"
                               value="0">
                        <?php if (isset($erro['sale'])) : ?>
                            <p class="text-danger"><?php echo $erro['sale'] ?>%</p>
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
    <div id="page-wrapper">
        <?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               