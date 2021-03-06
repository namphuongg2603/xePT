<?php
    require_once __DIR__ . "../../autoload/autoload.php";
    require_once __DIR__ . "../../libraries/function.php";
    require_once("./config.php");
    $conn = mysqli_connect("localhost", "root", "", "xehaidang") or die ();
    mysqli_set_charset($conn, "utf8");
    $notificationMessage = '';

    if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
        echo "<script>location.href='../index.php';</script>";
    }

    $user = $_SESSION['user'];
    $data = [
        'name' => $user['name'],
        'email' => $user['email'],
        'phone' => $user['phone'],
        'adress' => $user['adress'],
    ];

    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    unset($inputData['vnp_SecureHashType']);
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . $key . "=" . $value;
        } else {
            $hashData = $hashData . $key . "=" . $value;
            $i = 1;
        }
    }

    $secureHash = hash('sha256',$vnp_HashSecret . $hashData);

    if ($secureHash == $vnp_SecureHash) {
        if ($_GET['vnp_ResponseCode'] == '00') {
            $order_id = $_GET['vnp_TxnRef'];
            $money = $_GET['vnp_Amount']/100;
            $note = $_GET['vnp_OrderInfo'];
            $vnp_response_code = $_GET['vnp_ResponseCode'];
            $code_vnpay = $_GET['vnp_TransactionNo'];
            $code_bank = $_GET['vnp_BankCode'];
            $time = $_GET['vnp_PayDate'];
            $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);

            $cart = $_SESSION['cart'];
            $listId = [];
            $data = [
                "status" => 3,
                "note" => $_GET['vnp_OrderInfo'],
                "type" => 2
            ];

            foreach($cart as $value) {
                $id_update = $db->update('transaction', $data, array('id' => $value['id_transaction']));
                $idTransaction = $value['id_transaction'];
                $sql = "SELECT * FROM payments WHERE id_transaction = '".$value['id_transaction']."'";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($query);
                if ($row > 0) {
                    $sql = "UPDATE payments SET id_transaction = '$idTransaction', money = '$money', note = '$note', vnp_response_code = '$vnp_response_code', code_vnpay = '$code_vnpay', code_bank = '$code_bank' WHERE id_transaction = '$idTransaction'";
                } else {
                    $sql = "INSERT INTO payments(id_transaction, money, note, vnp_response_code, code_vnpay, code_bank) VALUES ('$idTransaction', '$money', '$note', '$vnp_response_code', '$code_vnpay', '$code_bank')";
                }
                mysqli_query($conn, $sql);
                array_push($listId, $id_update);
            }

            unset($_SESSION['cart']);
            $notificationMessage = "GD Thanh cong";
        } else {
            $notificationMessage = "GD Khong thanh cong";
        }
    } else {
        $notificationMessage = "Chu ky khong hop le";
    }


//    if (!empty($listId)) {
//        echo " <script>alert('B???n ???? x??c nh???n ?????t h??nh th??nh c??ng ch??ng t??i s??? li??n h??? giao xe s???m nh???t c?? th??? cho b???n');location.href='index.php' </script> ";
//    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Th??ng tin thanh to??n</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="<?= base_url() ?>vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
        <script src="<?= base_url() ?>vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Th??ng tin ????n h??ng</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >M?? ????n h??ng:</label>
                    
                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >S??? ti???n:</label>
                    <label><?=number_format($_GET['vnp_Amount']/100) ?> VN??</label>
                </div>  
                <div class="form-group">
                    <label >N???i dung thanh to??n:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >M?? ph???n h???i (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >M?? GD T???i VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >M?? Ng??n h??ng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Th???i gian thanh to??n:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >K???t qu???:</label>
                    <label> <?php echo $notificationMessage ?></label>
                    <br>
                    <a href="<?= base_url() ?>">
                        <button>Quay l???i</button>
                    </a>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; Qu???n l?? Ti???ng Anh 2020</p>
            </footer>
        </div>  
    </body>
</html>
