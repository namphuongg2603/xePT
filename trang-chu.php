<?php
require_once __DIR__ . "/autoload/autoload.php";
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<?php require_once __DIR__ . "/slide.php"; ?>
<?php require_once __DIR__ . "/adv.php"; ?>
<div class="main">
    <div class="container">
        <!--NỘI DUNG CHÍNH , PHẦN NÀY SẼ THAY ĐỔI THEO TRANG -->
        <?php require_once __DIR__ . "/main.php"; ?>
    </div>
</div>

<?php require_once __DIR__ . "/layouts/footer.php"; ?>
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
