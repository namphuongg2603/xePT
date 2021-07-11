<?php
$open = "slide";
require_once __DIR__ . "/../../autoload/autoload.php";
$slide = $db->fetchAll("slide");
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            SLIDE ẢNH BANNER
            <a href="add.php" class="btn btn-success">Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Bản Điều khiển</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Slide ảnh
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
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Banner</th>
                    <th>Hình ảnh</th>
                    <th>Hiển thị/ Không hiển thị</th>

                    <th>Cố định ảnh slide</th>
                    <th>Thời gian tạo</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;
                foreach ($slide as $item) : ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><img src="<?php echo uploads() ?>slide/<?php echo $item['thunbar'] ?>" width="50px"
                                 height="50px"></td>

                        <td>
                            <a href="home.php?id=<?php echo $item['id'] ?>"
                               class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-default' ?>">
                                <i class="fa fa-edit"></i>
                                <?php echo $item['home'] == 1 ? 'Hiển thị' : 'Không hiển thị' ?>
                            </a>

                        </td>
                        <td>
                            <a href=""
                               class="btn btn-xs <?php echo $item['active_slide'] == "active" ? 'btn-default' : 'btn-info' ?>">
                                <i class="fa fa-edit"></i>
                                <?php echo $item['active_slide'] == "active" ? 'active' : 'Không active' ?>
                            </a>

                        </td>
                        <td><?php echo $item['updated_at'] ?></td>
                        <td>
                            <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i
                                        class="fa fa-edit"></i>Sửa</a>
                            <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i
                                        class="fa fa-times"></i>Xóa</a>
                        </td>
                    </tr>
                    <?php $stt++; endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               