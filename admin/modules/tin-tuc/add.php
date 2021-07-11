<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = "tin-tuc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data =
        [
            "p_title" => postInput('p_title'),
            "p_content" => postInput('p_content'),
            "p_descriptions" => postInput('p_descriptions'),
        ];
    $erro = [];

    if (postInput('p_title') == '') {
        $erro['p_title'] = "Mời bạn nhập đầy đủ tên tiêu đề tin";
    }
    if (postInput('p_content') == '') {
        $erro['p_content'] = "Mời bạn nhập đầy đủ Nội dung Tin";
    }
    if (postInput('p_descriptions') == '') {
        $erro['p_content'] = "Mời bạn nhập đầy đủ Nội dung Tin";
    }

    if (!isset($_FILES['imagesnew'])) {
        $erro['imagesnew'] = "Mời bạn chọn hình ảnh";
    }


    if (postInput('p_title') != '') {
        if (empty($erro)) {
            if (isset($_FILES['imagesnew'])) {
                $file_name = $_FILES['imagesnew']['name'];
                $file_tmp = $_FILES['imagesnew']['tmp_name'];
                $file_type = $_FILES['imagesnew']['type'];
                $file_erro = $_FILES['imagesnew']['error'];

                if ($file_erro == 0) {
                    $part = ROOT . "tin-tuc/";
                    $data['p_thunbar'] = $file_name;
                }
            }

            $id_insert = $db->insert('posts', $data);

            if ($id_insert) {
                move_uploaded_file($file_tmp, $part . $file_name);
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("tin-tuc");
            } else {
                $_SESSION['error'] = "Thêm mới không thành công";
                redirectAdmin("tin-tuc");
            }
        }
    }

}
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm mới tin túc
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bảng Điều Khiển</a>
                </li>
                <li>
                    <i></i> <a href="<?php echo(base_url()) ?>admin/modules/tin-tuc/index.php">Tin Tức</a>
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
                    <label for="inputEmai13" class="col-sm-2 control-label">Tiêu đề tin tức</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmai13" placeholder="Tiêu đề tin tức"
                               name="p_title">
                        <?php if (isset($erro['p_title'])) : ?>
                            <p class="text-danger"><?php echo $erro['p_title'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="inputEmai13" name="imagesnew">
                        <?php if (isset($erro['imagesnew'])) : ?>
                            <p class="text-danger"><?php echo $erro['imagesnew'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Mô tả </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmai13" placeholder="Mô tả"
                               name="p_descriptions">
                        <?php if (isset($erro['p_descriptions'])) : ?>
                            <p class="text-danger"><?php echo $erro['p_descriptions'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
                <div class="form-group">
                    <label for="inputEmai13" class="col-sm-2 control-label">Nội dung tin tức</label>
                    <div class="col-sm-8">
                        <textarea cols="80" id="editor1" name="p_content" rows="10" data-sample-short></textarea>
                        <script>
                            CKEDITOR.replace('editor1', {
                                height: 260,
                            });
                        </script>
                        <?php if (isset($erro['p_content'])) : ?>
                            <p class="text-danger"><?php echo $erro['p_content'] ?></p>
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

               