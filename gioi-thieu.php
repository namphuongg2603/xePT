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
                    VỀ CHÚNG TÔI
                </div>
            </div>
            <div class="row about-company2">
                <div class="col-md-12 margin-info"> xePT là một Startup tiên phong trong việc phát triển nền tảng
                    trực tuyến cho thuê và chia sẻ xe tự lái ở Việt Nam. <br><br>ThuexePT cho phép khách hàng có
                    nhu cầu thuê xe ô tô tự lái có thể kết nối với các đơn vị cho thuê xe cũng như cá nhân có xe nhàn
                    rỗi trên khắp cả nước thông qua website hoặc ứng dụng di động. Khách hàng có thể tìm kiếm, so sánh
                    và thuê xe một cách dễ dàng, nhanh chóng.<br><br>ThuexePT được ra đời với sứ mệnh mang đến nền
                    tảng công nghệ hiện đại cho phép việc thuê và chia sẻ xe một cách Nhanh chóng, An toàn và Tiết kiệm.
                    Chungxe hướng tới một cộng đồng cho thuê và chia sẻ phương tiện đi lại một cách văn minh và thân
                    thiện với môi trường.
                </div>
            </div>
            <div class="body-about">
                <img src="public/frontend/Uploads/baner1.jpg" alt="" class="img-body-about">
                <div class="child-right">
                    <p class="title-child-about"> Tại sao chúng tôi làm?</p>
                    <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Hiện nay, ở
                        Nghệ An và Hà Tĩnh chưa có một nền tảng trực tuyến cho thuê và chia sẻ xe máy, ô tô tự lái. </p>
                    <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Khách thuê xe
                        gặp rất nhiều khó khăn để thuê được một chiếc xe tự lái như ý trong khi cá nhân có xe nhàn rỗi
                        hoặc các đơn vị cho thuê xe tự lái chưa có một công nghệ đủ tốt để quản lý, tối ưu tài sản của
                        mình.</p>
                    <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Với sự bùng nổ
                        của xu hướng công nghệ 4.0 thì các tiện ích của việc đặt dịch vụ vận chuyển qua kênh online/
                        mobile cũng như công nghệ chia sẻ xe đang ngày càng phát triển và phổ biến.</p>
                    <p class="text-why"><img src="public/frontend/Images/checkmark.png" class="ic_tick"> Chia sẻ phương
                        tiện đang dần trở thành xu hướng chính trên thế giới thay thế cho việc sở hữu xe.</p>
                </div>
            </div>
            <div class="body-about">
                <div class="child-right">
                    <p class="title-child-about"> Phương thức hoạt động</p>
                    <p class="text-why">Ngay cả những vấn đề phức tạp nhất cũng có một giải pháp phù hợp để giải quyết.
                        Tại ThuexePT, chúng tôi không chỉ cho thuê xe, chúng tôi tạo ra những sản phẩm hoàn chỉnh
                        trong hệ sinh thái hiện có. Chúng tôi dựa trên công nghệ để cung cấp một giải pháp toàn diện cho
                        vấn đề đi lại đô thị bằng cách kết nối hành khách với các nhà cung cấp dịch vụ cho thuê xe tự
                        lái. Tầm nhìn của chúng tôi tại ThuexePT là cung cấp một nền tảng mà chủ sở hữu xe có thể
                        thu hút khách hàng và tiến hành kinh doanh một cách thuận tiện. Chúng tôi tập trung nỗ lực vào
                        việc đơn giản hóa quá trình thuê xe bằng cách tạo ra các cơ chế có thể mở rộng để tiến hành và
                        tạo thuận lợi cho các giao dịch trong khi chứng minh một phương thức giao thông kinh tế cho tất
                        cả mọi người.</p>
                </div>
                <img src="public/frontend/Uploads/baner1.jpg" alt=""
                     style="width: 40%; margin-left: 10%; height: 100%;">
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .about-company2 {
        color: #fff;
        margin: 2% 4%;
    }

    .about-company, .about-company2 {
        border-radius: 8px;
        background-color: #107d82;
    }

    .body-about {
        width: 88%;
        margin: 0 6%;
        display: -ms-inline-flexbox;
        display: inline-flex;
        padding-bottom: 50px;
    }

    .img-body-about {
        width: 40%;
        margin-right: 10%;
        height: 100%;
    }

    .child-right {
        width: 50%;
    }

    .body-about .text-why, .title-child-about {
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

    .ic_tick {
        width: 14px;
        margin-top: -5px;
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

    .card {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .icon-partner {
        width: 20%;
        margin: 5% 40%;
    }

    .card-img-top {
        border-top-right-radius: calc(.25rem - 1px);
        border-top-left-radius: calc(.25rem - 1px);
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .height-dxht {
        height: 300px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 22% 22% 22% 22%;
        grid-gap: 4%;
    }

    .grid-container > div {
        text-align: center;
        padding: 20px 0;
        font-size: 30px;
    }

    .grid-container > div p {
        font-size: 24px;
        color: #107b82;
        font-weight: 500;
        margin-bottom: 7px;
    }

    .item4-img {
        width: 80px;
        position: absolute;
        margin-left: -3%;
    }

    .item4 {
        font-size: 14px;
        padding-top: 40px;
        margin-top: 50px;
    }

    .partner-form-container {
        width: 100%;
    }

    .row {
        margin-right: -15px;
        margin-left: -15px;
    }

    .text-center {
        text-align: center !important;
    }

    .form-content {
        max-width: 400px;
        width: 100%;
        margin: 0 auto !important;
        margin-top: 20px !important;
    }

    .form {
        margin: 24px 24px 0;
        font-size: 14px;
        color: #333;
    }

    .form-group {
        padding: 0 !important;
        margin-bottom: 12px;
    }

    .text_note, .title-ip-register {
        text-align: left;
        font-style: normal;
        font-stretch: normal;
        letter-spacing: normal;
        color: #333;
    }

    .title-ip-register {
        width: 245px;
        padding-right: 16px;
        font-family: Montserrat;
        font-size: 14px;
        font-weight: 400;
        line-height: normal;
        vertical-align: middle;
        line-height: 2.29;
        height: 30px;
    }

    .partner-form-container .input-tabs {
        width: 410px !important;
    }

    .partner-form-container .autocomplete-dropdown-container {
        width: 410px !important;
        text-align: left !important;
    }

    .autocomplete-dropdown-container {
        width: 330px;
    }

    .partner-form-container .form-error {
        text-align: left;
    }

    .form-error {
        color: red !important;
        font-size: 13px !important;
    }

    .partner-button {
        width: 330px;
        height: 48px;
        text-align: center;
    }

    .btn-disabled {
        cursor: not-allowed;
        opacity: .65;
        background: #bcbcbc;
        color: #fff;
        padding: 14px 1.2rem;
        border: none;
        min-width: 150px;
        font-weight: 500;
        min-width: 129px !important;
        display: inline-block;
        line-height: 1.25;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        font-size: 1rem;
        border-radius: .25rem;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }

    .partner-back {
        font-size: 15px;
        color: #107d82;
        font-weight: 700;
        padding-top: 10px;
        margin-left: 40px;
    }

    .btn_back, .btn_back:hover {
        width: 330px;
        height: 48px;
        border-radius: 4px;
        border: 2px solid #107d82;
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