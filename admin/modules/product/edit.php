<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "product";

$id = intval(getInput('id'));
$editproduct = $db->fetchID('product', $id);

if (empty($editproduct)) {
    $_SESSION['erro'] = "Dữ liệu không tồn tại";
    redirectAdmin('product');
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
            "sale" => postInput('sale'),
            "note" => postInput('note')

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
        $erro['sale'] = "Mời bạn nhập phần trăm giảm giá";
    }
    if (postInput('note') == '') {
        $erro['note'] = "Mời bạn nhập ghi chú";
    }

    $data['user_id'] = $_SESSION['user']['id'];

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
        $id_update = $db->update('product', $data, array('id' => $id));
        if ($id_update > 0) {
            move_uploaded_file($file_tmp, $part . $file_name);
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdmin("product");
        } else {
            $_SESSION['error'] = "Dữ liệu không thay đổi";
            redirectAdmin("product");
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
                Cập nhật Sản Phẩm
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bảng Điều Khiển</a>
                </li>
                <li>
                    <i></i> <a href="<?php echo(base_url()) ?>admin/modules/category/add.php">Sản Phẩm</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Cập nhật
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
                            <option value="">-Mời bạn chọn dịch vụ xe-</option>
                            <?php foreach ($categorychil as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php echo $editproduct['category_id_chil'] == $item['id'] ? "selected = 'selected'" : '' ?>><?php echo $item['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($erro['category_chil'])) : ?>
                            <p class="text-danger"><?php echo $erro['category_chil'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Tên xe</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmai13" placeholder="Tên Sản Phẩm" name="name"
                               value="<?php echo $editproduct['name'] ?>">
                        <?php if (isset($erro['name'])) : ?>
                            <p class="text-danger"><?php echo $erro['name'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Giá xe</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputEmai13" placeholder="9.000.000" name="price"
                               value="<?php echo $editproduct['price'] ?>">
                        <?php if (isset($erro['price'])) : ?>
                            <p class="text-danger"><?php echo $erro['price'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label"> Số lượng</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputEmai13" placeholder="100" name="number"
                               value="<?php echo $editproduct['number'] ?>">
                        <?php if (isset($erro['number'])) : ?>
                            <p class="text-danger"><?php echo $erro['number'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label"> Ghi chú</label>
                    <div class="col-sm-8">
                        <textarea name="note" id="" cols="30" rows="4"
                                  class="form-control"><?= $editproduct['note'] ?></textarea>
                        <?php if (isset($erro['note'])) : ?>
                            <p class="text-danger"><?php echo $erro['note'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Giảm giá</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="inputEmai13" placeholder="9.000.000" name="sale"
                               value="<?php echo $editproduct['sale'] ?>">
                        <?php if (isset($erro['sale'])) : ?>
                            <p class="text-danger"><?php echo $erro['sale'] ?></p>
                        <?php endif ?>
                    </div>
                    <label for="inputEmai13" class="col-sm-1 control-label">Hình ảnh</label>
                    <div class="col-sm-2">
                        <input type="file" class="form-control" id="inputEmai13" name="thunbar">
                        <?php if (isset($erro['thunbar'])) : ?>
                            <p class="text-danger"><?php echo $erro['thunbar'] ?></p>
                        <?php endif ?>
                        <img width="50px" height="50px"
                             src="<?php echo uploads() ?>product/<?php echo $editproduct['thunbar'] ?>">
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

               