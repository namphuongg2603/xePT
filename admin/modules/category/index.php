<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$category = $db->fetchAll("category");
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<div id="page-wrapper">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH SÁCH DANH MỤC
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bản Điều khiển</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Danh Mục
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
                        <th>Tên danh mục</th>
                        <th>Thời gian tạo</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;
                    foreach ($category as $item) : ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['created_at'] ?></td>
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
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               