<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$open = 'menu';
$menu = $db->fetchAll("menu");
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH SÁCH MENU
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bản Điều khiển</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Menu
                </li>
            </ol>
            <div class="clearfix"></div>
            <!--thông báo lỗi-->
            <?php require_once __DIR__ . "/../../../partials/notification.php"; ?>
            <!--end thông báo-->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <!--xử lý dữ liệu-->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên menu</th>
                        <th>Hiển thị/ Không hiển thị</th>
                        <th>Thời gian tạo</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;
                    foreach ($menu as $item) : ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>

                            <td>
                                <a href="home.php?id=<?php echo $item['id'] ?>"
                                   class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-default' ?>">
                                    <i class="fa fa-edit"></i>
                                    <?php echo $item['home'] == 1 ? 'Hiển thị' : 'Không hiển thị' ?>
                                </a>

                            </td>
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
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               