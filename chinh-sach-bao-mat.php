<?php
require_once __DIR__ . "/autoload/autoload.php";
?>
<?php require_once __DIR__ . "/layouts/header.php"; ?>
<div class="main">
    <div class="container">
        <!--NỘI DUNG CHÍNH , PHẦN NÀY SẼ THAY ĐỔI THEO TRANG -->
        <div class="header-page-sub">
            <div class="bg-page-sub"
                 style="background-image: url(&quot;public/frontend/Uploads/about.jpg&quot;); background-repeat: no-repeat; background-size: 100%;">
                CHÍNH SÁCH BẢO MẬT
            </div>
        </div>
        <div class="row about-company2">
            <div class="des-company" style="width: 100%; padding-right: 3%;">
                <div class="col-lg-7">
                    <ul class="des-purpose">
                        Thông tin cá nhân của bạn chỉ được dùng trong những mục đích sau đây:
                        <li> - Hỗ trợ việc đặt xe và cung cấp xe cho bạn.</li>
                        <li> - Liên lạc bạn trong cho mục đích tiếp thị của Chungxe.</li>
                        <li> - Nâng cao chất lượng dịch vụ và hỗ trợ khách hàng.</li>
                        <li> - Giải quyết các sự vụ và tranh chấp phát sinh liên quan đến việc sử dụng dịch vụ trên
                            ThuexePT
                        </li>
                        <li> - Cung cấp thông tin cho các cơ quan thực thi pháp luật theo yêu cầu.</li>
                    </ul>
                </div>
                <div class="col-lg-4 margin-info"><img src="public/frontend/Uploads/insurance.jpg" alt="insurance">
                </div>
            </div>

        </div>
        <div class="body-limit">
            <img src="public/frontend/Uploads/phamvi.jpg" alt="" style="width: 40%; margin-right: 3%; height: 100%;">
            <div class="child-right">
                <p class="title-child-policy">Phạm vi sử dụng thông tin</p>
                <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Gửi các thông báo
                    về các hoạt động trao đổi thông tin giữa thành viên và nền tảng Chungxe.</p>
                <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Ngăn ngừa các hoạt
                    động phá hủy tài khoản người dùng của thành viên hoặc các hoạt động giả mạo Thành viên.</p>
                <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Liên lạc và giải
                    quyết với thành viên trong những trường hợp đặc biệt.</p>
                <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Không sử dụng thông
                    tin cá nhân của thành viên ngoài mục đích xác nhận và liên hệ có liên quan đến đặt xe và cung cấp
                    xe.</p>
                <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Trong trường hợp có
                    yêu cầu của pháp luật: Nền tảng Chungxe có trách nhiệm hợp tác cung cấp thông tin cá nhân thành viên
                    khi có yêu cầu từ cơ quan tư pháp bao gồm: Viện kiểm sát, tòa án, cơ quan công an điều tra liên quan
                    đến hành vi vi phạm pháp luật nào đó của thành viên. Ngoài ra, không ai có quyền xâm phạm vào thông
                    tin cá nhân của thành viên.</p>
            </div>
        </div>
        <div class="body-time">
            <div class="child-right">
                <p class="title-child-policy">Thời gian lưu giữ thông tin</p>
                <p class="text-why">Dữ liệu cá nhân của Khách hàng sẽ được lưu trữ cho đến khi có yêu cầu hủy bỏ hoặc tự
                    Khách hàng đăng nhập và thực hiện hủy bỏ. Còn lại trong mọi trường hợp thông tin cá nhân của Khách
                    hàng sẽ được bảo mật trên máy chủ của Công ty.</p>
            </div>
            <img src="public/frontend/Uploads/time.jpg" alt=""
                 style="width: 50%; margin-left: 10%; height: 88%; margin-bottom: 20px;">
        </div>
    </div>
</div>
<style type="text/css">
    .body-limit, .body-time {
        width: 88%;
        margin: 0 6%;
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin-top: 50px;
    }

    .des-purpose {
        width: 95%;
        padding: 3%;
        font-family: Montserrat;
        font-size: 14px;
        font-weight: 400;
        font-style: normal;
        font-stretch: normal;
        line-height: 2.2;
        letter-spacing: normal;
        text-align: left;
        color: #fff;
        font-weight: 500;
    }

    .margin-info {
        margin: 3% 2%;
    }

    .about-company2 {
        color: #fff;
        margin: 2% 4%;
    }

    .about-company, .about-company2 {
        border-radius: 8px;
        background-color: #107d82;
    }

    .step, .title-child-owner {
        font-style: normal;
        font-stretch: normal;
        letter-spacing: normal;
        font-family: Montserrat;
    }

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

    .des-process, .title-process {
        font-family: Montserrat, sans-serif;
        font-size: 14px;
        font-style: normal;
        font-stretch: normal;
        letter-spacing: normal;
        text-align: center;
        color: #333;
    }

    .title-process {
        height: 18px;
        font-weight: 400;
        line-height: 2;
    }

    .des-process {
        font-weight: 300;
        line-height: 1.71;
        margin-top: 10px;
        padding: 0 5px;
    }

    .img-process {
        width: 25%;
        height: auto;
        -o-object-fit: contain;
        object-fit: contain;
        margin-top: 30px;
    }

    .title-child-owner {
        font-style: normal;
        font-stretch: normal;
        letter-spacing: normal;
        font-family: Montserrat;
    }

    .title-child-owner {
        font-size: 30px;
        font-weight: 500;
        line-height: 2;
        text-align: center;
        color: #107d82;
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

    .partner-form .body-about {
        padding-bottom: 30px;
    }

    .body-about {
        width: 88%;
        margin: 0 6%;
        display: -ms-inline-flexbox;
        display: inline-flex;
        padding-bottom: 50px;
    }

    .img-partner1 {
        width: 40%;
        margin-right: 10%;
        height: 100%;
    }

    .child-right {
        width: 50%;
    }

    .title-child-about {
        font-style: normal;
        font-stretch: normal;
        letter-spacing: normal;
        font-family: Montserrat;
    }

    .title-child-about {
        font-size: 30px;
        font-weight: 500;
        line-height: 2;
        text-align: left;
        color: #107d82;
    }

    .body-about .text-why {
        font-size: 14px;
        font-weight: 400;
        line-height: 2.2;
        text-align: justify;
        color: #333;
    }

    .body-about .text-why, .title-child-about {
        font-style: normal;
        font-stretch: normal;
        letter-spacing: normal;
        font-family: Montserrat;
    }

    .text-why {
        font-family: Montserrat;
        font-size: 14px;
        font-weight: 400;
        font-style: normal;
        font-stretch: normal;
        line-height: 2.2;
        letter-spacing: normal;
        text-align: justify;
        color: #000 !important;
    }

    .margin-info {
        margin: 3% 2%;
    }

    p.title-child-policy {
        text-align: left;
        padding: 0;
    }

    .title-child-policy {
        font-size: 30px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: 2;
        letter-spacing: normal;
        text-align: left;
        color: #107d82;
        font-family: Montserrat;
        padding-left: 40px;
    }

    .ic_tick {
        width: 14px;
        margin-top: -5px;
    }
</style>
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
