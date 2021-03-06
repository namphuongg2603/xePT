<?php
$open = "transaction";
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
    $sql = "SELECT transaction.*, 
      payments.note as note, 
      payments.vnp_response_code as vnp_response_code,
      payments.code_vnpay as code_vnpay,
      payments.code_bank as code_bank,
      payments.payment_time as payment_time,
      users.name as nameuser, 
      users.phone as phoneuser, 
      users.adress as adressuser, 
      product.name as nameproduct
     from transaction
     LEFT JOIN users ON users.id = transaction.users_id
     LEFT JOIN product ON product.id = transaction.product_id 
     LEFT JOIN payments ON payments.id_transaction = transaction.id 
      ORDER BY id DESC ";
} else {
    $sql = "SELECT transaction.*, 
      payments.note as note, 
      payments.vnp_response_code as vnp_response_code,
      payments.code_vnpay as code_vnpay,
      payments.code_bank as code_bank,
      payments.payment_time as payment_time,
      users.name as nameuser, 
      users.phone as phoneuser, 
      users.adress as adressuser, 
      product.name as nameproduct
     from transaction
     LEFT JOIN users ON users.id = transaction.users_id
     LEFT JOIN product ON product.id = transaction.product_id 
     LEFT JOIN payments ON payments.id_transaction = transaction.id 
     WHERE admin_id = ".$user['id']." ORDER BY id DESC ";
}

$transaction = $db->fetchJoneTransaction("transaction", $sql, $p, 10, true);

if (isset($transaction['page'])) {
    $sotrang = $transaction['page'];
    unset($transaction['page']);
}
?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH S??CH H??A ????N

            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">B???n ??i???u khi???n</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> H??a ????n
                </li>
            </ol>
            <div class="clearfix"></div>
            <!--th??ng b??o l???i-->
            <?php require_once __DIR__ . "/../../../partials/notification.php"; ?>
            <!--end th??ng b??o-->
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
                        <th>Kh??ch h??ng</th>
                        <th>T???ng ti???n</th>
                        <th>Th???i gian</th>
                        <th>Ph????ng th???c TT</th>
                        <th>Tr???ng th??i</th>
                        <th>Thao t??c</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;
                    foreach ($transaction as $item) : ?>
                        <tr>
                            <td style="vertical-align: middle"><?php echo $stt ?></td>
                            <td style="vertical-align: middle">
                                <ul>
                                    <li><?php echo $item['nameuser'] ?></li>
                                    <li><?php echo $item['phoneuser'] ?></li>
                                </ul>
                            </td>
                            <td style="vertical-align: middle"><?php echo number_format($item['amount'], 0, ',', '.') ?> vn??</td>
                            <td style="vertical-align: middle">
                                <ul class="ul-transaction">
                                    <li>Xe ?????t : <?= $item['nameproduct'] ?></li>
                                    <li>Ng??y nh???n : <?= $item['time_start'] ?></li>
                                    <li>Ng??y tr??? : <?= $item['time_stop'] ?></li>
                                </ul>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($item['type'] == 2) : ?>
                                <ul class="ul-transaction">
                                    <li>Ng??n h??ng : <?= $item['code_bank'] ?></li>
                                    <li>S??? ti???n TT : <?= number_format($item['amount'], 0, ',', '.') ?> vn??</li>
                                    <li>Ng??y thanh to??n : <?= $item['payment_time'] ?></li>
                                </ul>
                                <?php else : ?>
                                    <p>Thanh to??n khi nh???n xe</p>
                                <?php endif; ?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($item['status'] == 1) : ?>
                                    <span class="label label-info">???? b??n giao xe</span>
                                <?php elseif ($item['status'] == 2) : ?>
                                    <span class="label label-success">???? tr??? xe ( ho??n t???t)</span>
                                <?php elseif($item['status'] == 3) : ?>
                                    <span class="label label-primary">???? x??c nh???n ?????t xe</span>
                                <?php else : ?>
                                    <span class="label label-default">Ti???p nh???n</span>
                                <?php endif; ?>
                            </td>

                            <td style="vertical-align: middle">
                                <a style="margin-top: 5px;" class="btn btn-xs btn-danger"
                                   href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>X??a</a><br>
                                <a style="margin-top: 5px;" class="btn btn-xs btn-primary"
                                   href="status.php?id=<?php echo $item['id'] ?>&status=1"><i class="fa fa-times"></i>B??n
                                    giao xe</a><br>
                                <a style="margin-top: 5px;" class="btn btn-xs btn-success"
                                   href="status.php?id=<?php echo $item['id'] ?>&status=2"><i class="fa fa-times"></i>Tr???
                                    xe</a>
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

               