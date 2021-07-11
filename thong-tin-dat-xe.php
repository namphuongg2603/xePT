<?php
    require_once __DIR__ . "/autoload/autoload.php";
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        header("localtion: index.php");
    }
    if (isset($_GET['page'])) {
        $p = $_GET['page'];
    } else {
        $p = 1;
    }

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
         WHERE users_id = ".$user['id']." ORDER BY id DESC ";
    $transaction = $db->fetchJone("transaction", $sql, $p, 10, true);

    if (isset($transaction['page'])) {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="menu-account">
                    <h3>
                        <span>
                            Tài khoản
                        </span>
                    </h3>
                    <ul>
                        <li><a href="thong-tin-tai-khoan.php"><i class="fa fa-fw fa-user"> </i> Thông tin tài khoản</a></li>
                        <li><a href="thong-tin-dat-xe.php"><i class="fa fa-fw fa-truck"> </i> Quản lý thông tin đặt xe</a></li>
                        <li><a href="doi-mat-khau.php"><i class="fa fa-key"> </i>  Đổi mật khẩu </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="" itemscope="" class="home">
                            <a title="Đến trang chủ" href="index.php" itemprop="url"><span
                                    itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Thông tin đặt xe</strong></li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () {
                        $(this).find(".s-c-n").show();
                    }, function () {
                        $(this).find(".s-c-n").hide();
                    });
                </script>
                <script src="public/frontend/app/services/accountServices.js"></script>
                <script src="public/frontend/app/controllers/accountController.js"></script>
                <div class="login-content clearfix" ng-controller="accountController" ng-init="initController()">
                    <div ng-if="IsError" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div class="col-md-12 bor">
                        <section class="box-main1">

                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <strong></strong> <?php echo $_SESSION['success'];
                                    unset($_SESSION['success']) ?>
                                </div>
                            <?php endif ?>
                            <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger">
                                    <strong>Lỗi! </strong><?php echo $_SESSION['error'];
                                    unset($_SESSION['error']) ?>
                                </div>
                            <?php endif ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Khách hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Thời gian</th>
                                                    <th>Phương thức TT</th>
                                                    <th>Trạng thái</th>
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
                                                    <td style="vertical-align: middle"><?php echo number_format($item['amount'], 0, ',', '.') ?> vnđ</td>
                                                    <td style="vertical-align: middle">
                                                        <ul class="ul-transaction">
                                                            <li>Xe đặt : <?= $item['nameproduct'] ?></li>
                                                            <li>Ngày nhận : <?= $item['time_start'] ?></li>
                                                            <li>Ngày trả : <?= $item['time_stop'] ?></li>
                                                        </ul>
                                                    </td>
                                                    <td style="vertical-align: middle">
                                                        <?php if ($item['type'] == 2) : ?>
                                                            <ul class="ul-transaction">
                                                                <li>Ngân hàng : <?= $item['code_bank'] ?></li>
                                                                <li>Số tiền TT : <?= number_format($item['amount'], 0, ',', '.') ?> vnđ</li>
                                                                <li>Ngày thanh toán : <?= $item['payment_time'] ?></li>
                                                            </ul>
                                                        <?php else : ?>
                                                            <p>Thanh toán khi nhận xe</p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="vertical-align: middle">
                                                        <?php if ($item['status'] == 1) : ?>
                                                            <span class="label label-info">Đã bàn giao xe</span>
                                                        <?php elseif ($item['status'] == 2) : ?>
                                                            <span class="label label-success">Đã trả xe ( hoàn tất)</span>
                                                        <?php elseif($item['status'] == 3) : ?>
                                                            <span class="label label-primary">Đã xác nhận đặt xe</span>
                                                        <?php else : ?>
                                                            <span class="label label-default">Tiếp nhận</span>
                                                        <?php endif; ?>
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
                        </section>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--hiển thị menu TRANG INDEX.PHP-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".menu-quick-select ul").hide();
        $(".menu-quick-select").hover(function () {
            $(".menu-quick-select ul").show();
        }, function () {
            $(".menu-quick-select ul").hide();
        });
    });
</script>