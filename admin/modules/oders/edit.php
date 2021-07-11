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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name')),
            "category_id" => postInput('category_id'),
            "price" => postInput('price'),
            "number" => postInput('number'),
            "sale" => postInput('sale'),
            "masp" => postInput('masp'),
            "chatlieu" => postInput('chatlieu'),
            "kichthuoc" => postInput('kichthuoc'),
            "xuatxu" => postInput('xuatxu'),
            "color" => postInput('color'),
            "content" => postInput('content')
        ];
    $erro = [];

    if (postInput('name') == '') {
        $erro['name'] = "Mời bạn nhập đầy đủ tên danh mục";
    }
    if (postInput('category_id') == '') {
        $erro['category_id'] = "Mời bạn chọn tên danh mục";
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
    if (postInput('color') == '') {
        $erro['color'] = "Mời bạn nhập đầy đủ Màu sắt";
    }
    if (postInput('masp') == '') {
        $erro['masp'] = "Mời bạn nhập đầy đủ mã sản phẩm";
    }
    if (postInput('kichthuoc') == '') {
        $erro['kichthuoc'] = "Mời bạn nhập đầy đủ kích thước";
    }
    if (postInput('chatlieu') == '') {
        $erro['chatlieu'] = "Mời bạn nhập đầy đủ chất liệu";
    }
    if (postInput('xuatxu') == '') {
        $erro['xuatxu'] = "Mời bạn nhập đầy đủ xuất sứ";
    }
    if (postInput('content') == '') {
        $erro['content'] = "Mời bạn nhập nội dung mô tả";
    }


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
                <label for="inputEmai13" class="col-sm-2 control-label">Danh mục Sản Phẩm</label>
                <div class="col-sm-8">
                    <select class="form-control col-md-8" name="category_id">
                        <option value="">-Mời bạn chọn danh mục sản phẩm-</option>
                        <?php foreach ($category as $item): ?>
                            <option value="<?php echo $item['id'] ?>" <?php echo $editproduct['category_id'] == $item['id'] ? "selected = 'selected'" : '' ?>><?php echo $item['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?php if (isset($erro['category'])) : ?>
                        <p class="text-danger"><?php echo $erro['category'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Tên sản phẩm</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Tên Sản Phẩm" name="name"
                           value="<?php echo $editproduct['name'] ?>">
                    <?php if (isset($erro['name'])) : ?>
                        <p class="text-danger"><?php echo $erro['name'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Giá sản phẩm</label>
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
                <label for="inputEmai13" class="col-sm-2 control-label">Mã sản phẩm</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Mã Sản Phẩm" name="masp"
                           value="<?php echo $editproduct['masp'] ?>">
                    <?php if (isset($erro['masp'])) : ?>
                        <p class="text-danger"><?php echo $erro['masp'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Chất Liệu</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Chất liệu Sản Phẩm"
                           name="chatlieu" value="<?php echo $editproduct['chatlieu'] ?>">
                    <?php if (isset($erro['chatlieu'])) : ?>
                        <p class="text-danger"><?php echo $erro['chatlieu'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Màu sắc</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Màu sắc Sản Phẩm" name="color"
                           value="<?php echo $editproduct['color'] ?>">
                    <?php if (isset($erro['color'])) : ?>
                        <p class="text-danger"><?php echo $erro['color'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Kích thước</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Kích thước Sản Phẩm"
                           name="kichthuoc" value="<?php echo $editproduct['kichthuoc'] ?>">
                    <?php if (isset($erro['kichthuoc'])) : ?>
                        <p class="text-danger"><?php echo $erro['kichthuoc'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Xuất sứ</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmai13" placeholder="Xuất sứ Sản Phẩm"
                           name="xuatxu" value="<?php echo $editproduct['xuatxu'] ?>">
                    <?php if (isset($erro['xuatxu'])) : ?>
                        <p class="text-danger"><?php echo $erro['xuatxu'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
            <div class="form-group">
                <label for="inputEmai13" class="col-sm-2 control-label">Nội dung sản phẩm</label>
                <div class="col-sm-8">
                    <textarea cols="80" id="editor1" name="content" rows="10"
                              data-sample-short><?php echo $editproduct['content'] ?></textarea>
                    <script>
                        CKEDITOR.replace('editor1', {
                            height: 260,
                        });
                    </script>
                    <?php if (isset($erro['content'])) : ?>
                        <p class="text-danger"><?php echo $erro['content'] ?></p>
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

               