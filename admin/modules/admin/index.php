<?php
$open = "admin";
require_once __DIR__ . "/../../autoload/autoload.php";
/*$product = $db->fetchAll("product");*/

if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 1;
}

$sql = "SELECT admin.* from admin ORDER BY id DESC ";
$admin = $db->fetchJone("admin", $sql, $p, 2, true);
if (isset($admin['page'])) {
    $sotrang = $admin['page'];
    unset($admin['page']);
}
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ADMIN
            <a href="add.php" class="btn btn-success">Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Bảng Điều khiển</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Admin
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
                    <th>Họ và Tên</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;
                foreach ($admin as $item) : ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['adress'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><?php echo $item['phone'] ?></td>
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
            <div class="pull-right">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
                            <?php
                            if (isset($_GET['page'])) {
                                $p = $_GET['page'];
                            } else {
                                $p = 1;
                            }
                            ?>
                            <li class="<?php echo ($i == $p) ? 'active' : '' ?>">
                                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               