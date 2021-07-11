<?php
require_once __DIR__ . "/autoload/autoload.php";
require_once __DIR__ . "/libraries/function.php";
    $db = new Database;
    $id = intval(getInput('id'));
    $sql = "SELECT * FROM postS WHERE id = ". $id;
    $news = $db->fetchsql($sql);
    $sqlNew = "SELECT * FROM postS ORDER BY id DESC LIMIT 5";
    $listNews = $db->fetchsql($sqlNew);
?>

<?php require_once __DIR__ . "/layouts/header.php"; ?>
<style>
    .vhc_icon {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }

    .b-tit {
        font-weight: bold;
        margin: 10px 0;
    }

    .mb-md {
        margin: 5px 0;
    }
</style>
<div class="main">
    <div class="container">
        <!--NỘI DUNG CHÍNH , PHẦN NÀY SẼ THAY ĐỔI THEO TRANG -->
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="left-content">
                    <div class="shadow p-lg mb-xlg">
                        <?php foreach($news as $key => $new) : ?>
                        <div class="body-about">
                            <div class="child-right">
                                <p class="title-child-about"> <?= $new['p_title'] ?></p>
                                <div class="content">
                                    <?= $new['p_content'] ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="right-info ">
                    <div class="shadow mb-xlg p-lg">
                        <div class="pr text-center">Tin tức mới </div>
                            <div>
                                <?php foreach($listNews  as $key => $new) : ?>
                                <div class="list-news box-sidebar-new">
                                    <img src="<?= base_url() ?>/public/uploads/tin-tuc/<?= $new['p_thunbar'] ?>" alt="" class="img-body-about" style="float:left;">
                                    <div class="child-right ">
                                        <a href="chi-tiet-tin-tuc.php?id=<?= $new['id'] ?>&<?= $new['p_slug'] ?>.html"><p> <?= $new['p_title'] ?></p></a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    .prod, .shadow {
        -webkit-box-shadow: 0px 2px 14.7px 1.3px rgba(0, 0, 0, 0.16);
        box-shadow: 0 0px 10px 0 rgba(31, 28, 38, 0.35);
        border-radius: 5px;
        margin-bottom: 15px;
        background: #fff;
        overflow: hidden;
        border-radius: 8px;
    }

    .p-lg {
        padding: 20px !important;
    }

    .mb-xlg {
        margin-bottom: 30px !important;
    }

    .tit3 {
        color: #107d82;
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
        text-align: left;
        margin-bottom: 13px;
    }

    .mb-xs {
        margin-bottom: 5px !important;
    }

    .mt-md {
        margin-top: 25px !important;
    }

    .stars.large img {
        width: 26px;
        margin: 2px 2px 10px 0px;
    }

    .stars img {
        float: left;
        margin: 0px 4px 0px 0px;
        width: 15px;
        margin-bottom: 15px;
        border: none;
        padding: 0px;
    }

    .model .info {
        margin-bottom: 15px;
        clear: both;
    }

    .mb-none {
        margin-bottom: 0 !important;
    }

    .model .info div {
        font-size: 16px;
        margin-bottom: 12px;
        text-align: left;
        width: 50%;
        float: left;

    }

    img {
        max-width: 100%;
        height: auto;
    }

    img {
        border: 0;
        -ms-interpolation-mode: bicubic;
        vertical-align: middle;
    }

    .vhc_icon {
        width: auto;
        height: 24px;
        margin-right: 16px;
    }

    .mt-xlg {
        margin-top: 30px !important;
    }

    .mb-md {
        margin-bottom: 15px !important;
    }

    form.cap label, .b-tit {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        text-align: left;
    }

    .p-lg {
        padding: 20px !important;
    }

    .mb-xlg {
        margin-bottom: 30px !important;
    }

    .pr {
        color: #107d82;
        font-size: 24px;
        font-weight: 700;
        padding: 20px 0px;
    }

    .text-center {
        text-align: center !important;
    }

    form.cap {
        text-align: left;
    }

    .form-group {
        padding: 0 !important;
        margin-bottom: 12px;
    }

    .text-sm-right {
        text-align: right !important;
    }

    .pt-2 {
        padding-top: .5rem !important;
    }

    .select-box {
        position: relative;
    }

    .sum {
        border-top: 2px solid #dedede;
        padding-top: 10px;
    }

    .btn {
        min-width: 129px !important;
        text-align: center;
    }

    .btn, btn:active, .btn:focus, .btn:visited {
        background: linear-gradient(to right, #0f959b, #064a50);
        color: #fff;
        padding: 14px 1.2rem;
        border: none;
        min-width: 150px;
        font-weight: 500;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    option {
        color: #333;
        height: 40px;
    }
</style>
<style type="text/css">
    label {
        margin-left: 20px;
    }

    #datepicker {
        width: 180px;
        margin: 0 20px 20px 20px;
    }

    #datepicker > span:hover {
        cursor: pointer;
    }
    .about-company2 {
        color: #fff;
        margin: 2% 4%;
    }

    .about-company, .about-company2 {
        border-radius: 8px;
        background-color: #107d82;
    }

    .img-body-about {
        width: 40%;
        margin-right: 10%;
        height: 100%;
    }

    .child-right {
        width: 100%;
    }

    .body-about .text-why, .title-child-about {
        font-style: normal;
        font-stretch: normal;
        letter-spacing: normal;
        font-family: Montserrat;
    }

    .title-child-about {
        font-size: 18px;
        font-weight: 500;
        line-height: 2;
        text-align: left;
        color: #107d82;
    }

    .body-about .text-why {
        font-size: 12px;
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
        width: 100%;
        display: -ms-inline-flexbox;
        display: inline-flex;
        padding-bottom: 50px;
    }

    .img-partner1 {
        width: 40%;
        margin-right: 10%;
        height: 100%;
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
    .box-sidebar-new {
        width:100%;
        display: -ms-inline-flexbox;
        display: inline-flex;
        padding-bottom: 50px;
    }
</style>

<?php require_once __DIR__ . "/layouts/footer.php"; ?>

<script type="text/javascript">
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });

    $(document).ready(function () {

        $(".menu-quick-select ul").hide();
        $(".menu-quick-select").hover(function () {
            $(".menu-quick-select ul").show();
        }, function () {
            $(".menu-quick-select ul").hide();
        })
        reset_time();
        update_day_count();
    });

    function reset_time() {
        $('#time_start_input').val(new Date().toDateInputValue());
        $('#time_stop_input').val(new Date().toDateInputValue());
    }

    function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = ",") {
        try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
            console.log(e)
        }
    };

    function update_day_count(){
        let $datetime1 = new Date($("#time_start_input").val());
        let $datetime2 = new Date($("#time_stop_input").val());
        let $interval = ($datetime2.getTime() - $datetime1.getTime()) / (1000 * 3600 * 24) + 1;
        console.log($interval);
        // if ($interval < 1){
        //     reset_time();
        //     $interval = 1;
        // }
        let $sale = Number('<?php echo $dsproductId["sale"]; ?>');
        let $price = Number('<?php echo $dsproductId["price"]; ?>');
        let $total_amount = $interval * ((100 - $sale) * $price) / 100;


        $("#day_count_span").text($interval + " ngày");
        $("#total_amount").text(formatMoney($total_amount) + " vnđ");
    }

</script>
<!--hiển thị menu TRANG INDEX.PHP-->
