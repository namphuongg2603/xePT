<?php
require_once __DIR__ . "/autoload/autoload.php";
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<div class="main">
    <div class="container">
        <!--NỘI DUNG TRANG ĐĂNG KÝ , PHẦN NÀY SẼ THAY ĐỔI THEO TRANG -->
        <div class="row">
            <div class="header-page-sub">
                <div class="bg-page-sub"
                     style="background-image: url(&quot;public/frontend/Uploads/about.jpg&quot;); background-repeat: no-repeat; background-size: 100%;">
                    KHUYẾN MÃI
                </div>
            </div>
            <div class="row about-company2">
                <div class="des-company" style="width: 100%; padding-right: 3%;">
                    <section>
                        <p class="title-child-owner">Chương trình khuyến mãi</p>

                        <P class="title-child-owner">GIẢM 10% CHO TẤT CẢ CÁC LOẠI XE - MỪNG NGÀY LỄ GIÁNG SINH</P>

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .title-child-owner {
        font-size: 30px;
        font-weight: 500;
        line-height: 2;
        text-align: center;
        color: #107d82;
    }

    .line-process {
        width: 76%;
        height: 4px;
        margin-left: 12%;
        margin-right: 12%;
        background-color: #107d82;
        margin-top: 35px;
    }

    .header-page-sub {
        width: 100%;
        height: 259px;
        mix-blend-mode: undefined;
        text-align: center;
        vertical-align: middle;
        font-size: 34px;
        position: relative;
        background-color: #f5f5f5;
        font-family: Montserrat;
        font-weight: 600;
        -webkit-box-shadow: 0 0 25px 0 rgba(0, 0, 0, .2);
        box-shadow: 0 0 25px 0 rgba(0, 0, 0, .2);
    }

    .bg-page-sub {
        width: 100%;
        height: 100%;
        background-size: 100% auto;
        position: absolute;
        line-height: 259px;
        font-family: Montserrat, sans-serif;
        color: #fff;
        text-transform: uppercase;
    }

    .des-company {
        width: 57%;
        padding: 3% 5% 3% 3%;
        font-family: Montserrat;
        font-size: 14px;
        font-weight: 400;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.71;
        letter-spacing: normal;
        text-align: justify;
        color: #fff;
        font-weight: 500;
    }

    .about-company2 {
        color: #fff;
        margin: 2% 4%;
    }

    .about-company, .about-company2 {
        border-radius: 8px;

    }

    .img-process {
        width: 25%;
        height: auto;
        -o-object-fit: contain;
        object-fit: contain;
        margin-top: 30px;
    }
</style>
<?php require_once __DIR__ . "/san-pham.php"; ?>
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