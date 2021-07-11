<?php
require_once __DIR__ . "/../../autoload/autoload.php";
$news = $db->fetchAll("posts");
$open = "tin-tuc";
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH SÁCH TIN TỨC
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bản Điều khiển</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Tin Tức
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
                        <th>Tiều đề tin</th>
                        <!--                        <th>Nội dung tin</th>-->
                        <th>Hình ảnh</th>
                        <th>Thời gian tạo</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;
                    foreach ($news as $item) : ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['p_title'] ?></td>
                            <td>
                                <img src="<?= base_url() ?>/public/uploads/tin-tuc/<?php echo $item['p_thunbar'] ?>"
                                     alt="" style="width: 80px;height: 80px;">
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
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               