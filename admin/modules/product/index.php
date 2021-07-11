<?php
    $open = "product";
    require_once __DIR__ . "/../../autoload/autoload.php";

    if (!isset($_SESSION['user'])) {
        return redirectStyle('index.php');
    }
    if (!empty($_SESSION['user']) && isset($_SESSION['level']) && $_SESSION['level'] == 1 || $_SESSION['level'] == 2) {
        $user = $_SESSION['user'];
    } else {
        return redirectStyle('index.php');
    }

    if (isset($_GET['page'])) {
        $p = $_GET['page'];
    } else {
        $p = 1;
    }
    if ($_SESSION['level'] == 1) {
        $sql = "SELECT product.*,category_chil.name as namecate from product LEFT JOIN category_chil on category_chil.id=product.category_id_chil";
    } else {
        $sql = "SELECT product.*,category_chil.name as namecate from product LEFT JOIN category_chil on category_chil.id=product.category_id_chil WHERE user_id=". $user['id'];
    }
    $product = $db->fetchJoneProduct("product", $sql, $p, 5, true);

    if (isset($product['page'])) {
        $sotrang = $product['page'];
        unset($product['page']);
    }

?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<div id="page-wrapper">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH SÁCH SẢN PHẨM
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Bản Điều khiển</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Sản Phẩm
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
                        <th>Tên Sản Phẩm</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Giá xe</th>
                        <th>Số lượng xe hiện có</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;
                    foreach ($product as $item) : ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['namecate'] ?></td>
                            <td><img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="50px"
                                     height="50px"></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?> vnđ</td>
                            <td><?php echo $item['number'] ?></td>
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
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php"; ?>

               