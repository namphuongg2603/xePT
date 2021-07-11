<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<!--PHẦN HEAD CHỨA CSS, META,JS ...-->
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta charset="UTF-8"/>
    <title>THUÊ XE PT</title>
    <meta name="description"/>
    <meta name="keywords"/>
    <link href="<?= base_url() ?>public/frontend/Uploads/favicon.png" rel="shortcut icon" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="fb:app_id" content="227481454296289"/>
    <meta content="vi_VN" property="og:locale"/>
    <meta content="website" property="og:type"/>
    <meta content="SeaFood Store" property="og:title"/>
    <meta property="og:description"/>
    <!--LOGO CÔNG TY-->
    <meta content="<?= base_url() ?>public/frontend/Uploads/logo.png" property="og:image"/>
    <!--CSS-->
    <style>
        .loader_overlay {
            position: fixed;
            z-index: 9999;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-color: #fff;
            -webkit-transition: all .1s ease;
            -o-transition: all .1s ease;
            transition: all .1s ease;
            opacity: 1;
            visibility: visible;
        }

        .loader_overlay.loaded {
            opacity: 0;
            visibility: hidden;
            z-index: -2;
        }
    </style>
    <!--END CSS-->
    <link rel="stylesheet" href="public/frontend/assets/100004/js/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/frontend/assets/100004/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/frontend/assets/100004/fonts/fonts-master/roboto.css">
    <!--JS-->
    <script src="public/frontend/assets/100004/js/plugin42e7.js?v=582"></script>
    <script src="public/frontend/assets/100004/js/option_selection.js"></script>
    <script src="public/frontend/assets/100004/js/api.jquery.js"></script>
    <script async="" defer="defer" data-target=".product-resize" data-parent=".products-resize"
            data-img-box=".image-resize"
            src="public/frontend/assets/100004/js/fixheightproductv242e7.js?v=582"></script>
    <script src="public/frontend/assets/100004/js/scripts42e7.js?v=582"></script>
    <script src="public/frontend/Scripts/common/mycard.js" type="text/javascript"></script>
    <script src="public/frontend/Scripts/lazyLoad/jquery.lazyload.min.js" type="text/javascript"></script>
    <script src="public/frontend/Scripts/angularJS/angular.min.js"></script>
    <script src="public/frontend/Scripts/angularJS/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="public/frontend/Scripts/angular-loading-spinner/spin.min.js"></script>
    <script type="text/javascript"
            src="public/frontend/Scripts/angular-loading-spinner/angular-spinner.min.js"></script>
    <script type="text/javascript"
            src="public/frontend/Scripts/angular-loading-spinner/angular-loading-spinner.js"></script>
    <script src="public/frontend/app/appMain.js"></script>
    <script src="public/frontend/app/directives/directive.js"></script>
    <script src="public/frontend/app/directives/angular-summernote.js"></script>
    <script src="public/frontend/app/directives/paging.js"></script>
    <script src="public/frontend/app/services/ajaxServices.js"></script>
    <script src="public/frontend/app/services/alertsServices.js"></script>
    <!--CÁC BẠN CHÚ Ý SỬA ĐƯỜNG DẪN ĐÚNG THÌ MỚI HIỂN THỊ ĐÚNG NHA CÁC BẠN-->
    <link href="public/frontend/App_Themes/style.css" rel="stylesheet" type="text/css"/>
    <link href="public/frontend/App_Themes/responsive.css" rel="stylesheet" type="text/css"/>

</head>
<!--BODY BAO QUÁT TẤT CẢ NỘI DUNG CỦA TRANG-->
<body ng-app="appMain" style="" cz-shortcut-listen="true">
<div class="loader_overlay"></div>
<div id="opacity" class=""></div>

<!--KHUNG BAO TẤT CẢ NỘI DUNG TRANG WEB-->
<div class="wrapper">
    <!--HEADER CHỨA MENU, LOGO ...-->
    <div class="header">
        <!--CÁC BẠN CHỊU KHÓ ĐÓNG LẠI TỪNG MỤC CHO DỂ CHỈNH SỬA-->
        <script src="public/frontend/Scripts/common/login.js" type="text/javascript"></script>
        <section class="top-link clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav navbar-nav topmenu-contact pull-left">
                            <li><i class="fa fa-phone"></i> <span>Hotline:0962398345 </span></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
<!--                            <li><a style="margin-top: 2px;height: 29px;" href="tro-thanh-doi-tac.php"-->
<!--                                   class="btn btn-primary" role="button">Trở thành đối tác</a></li>-->
                            <?php if (isset($_SESSION['name_user'])) : ?>
                                <li><a href="thong-tin-tai-khoan.php">Xin Chào : <?= $_SESSION['name_user'] ?></a></li>
                            <?php else : ?>
                                <li class="account-login"><a href="dang-nhap.php"><i class="fa fa-sign-in"></i> Đăng
                                        nhập </a></li>
                                <li class="account-register"><a href="dang-ky.php"><i class="fa fa-key"></i> Đăng ký
                                    </a></li>
                            <?php endif; ?>

                        </ul>
                        <div class="show-mobile hidden-lg hidden-md">
                            <div class="quick-user">
                                <div class="quickaccess-toggle">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="inner-toggle">
                                    <ul class="login links">
                                        <?php if (isset($_SESSION['name_user'])) : ?>
                                            <li>
                                                <a href="thong-tin-tai-khoan.php"><i class="fa fa-sign-in"></i> Xin Chào
                                                    : <?= $_SESSION['name_user'] ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                            </li>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-key"></i> Đăng nhập</a>
                                            </li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Header -->
        <header id="header">
            <div id="header_main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-8">
                            <!--logo-->
                            <h1 class="pull-left">
                                <a href="index.php" class="logo" title="">
                                    <!--sau này nhớ chỉnh lại theo logo của các bạn nhé-->
                                    <img src="public/frontend/Uploads/PT2.png" alt="" title="">
                                </a>
                            </h1>
                            <!-- end logo -->
                        </div>
                        <div class="col-lg-6 col-md-5 col-sm-4 hidden-xs">
                            <!-- Search -->
                            <div class="search_box">
                                <div class="search_wrapper">
                                    <form action="<?php echo base_url() ?>tim-kiem.php">
                                        <input type="text" name="k" value="<?= getInput('k') ?>" class="index_input_search"/>
                                        <button class="btn_search_submit btn" type="submit"><span>  Tìm ngay</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- End Search -->
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                            <!-- Account -->
                            <div class="user_login">
                                <div class="user_login_icon"></div>
                                <div class="box_text">
                                    <strong>Tài khoản</strong>
                                    <!--<span class="cart_price">Đăng nhập, đăng ký</span>-->
                                </div>
                                <div class="user_box">
                                    <ul>
                                        <?php if (isset($_SESSION['name_user'])) : ?>
                                            <li>
                                                <a href="thong-tin-tai-khoan.php"><i class="fa fa-sign-in"></i> Xin Chào
                                                    : <?= $_SESSION['name_user'] ?></a>
                                            </li>
                                            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1 || $_SESSION['level'] == 2) : ?>
                                            <li>
                                                <a href="<?php echo base_url() ?>/admin"><i class="fa fa-fw fa-gear"></i> Quản lý cho thuê xe
                                            </li>
                                            <?php endif; ?>
                                            <li>
                                                <a href="gio-hang.php"><i class="fa fa-fw fa-shopping-cart"></i> Giỏ hàng
                                            </li>
                                            <li>
                                                <a href="dang-xuat.php"><i class="fa fa-sign-in"></i> Đăng xuất
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                            </li>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-key"></i> Đăng nhập</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- End account -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="header_mobile">
                <div class="container">
                    <div class="row">
                        <!-- Menu mobile -->
                        <button type="button" class="navbar-toggle collapsed" id="trigger_click_mobile">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div id="mobile_wrap_menu" class="visible-xs visible-sm">
                            <div class="user_mobile">
                                <div class="icon_user_mobile">
                                    <img src="public/frontend/assets/100004/images/user_mobile.png" alt="account">
                                </div>
                                <div class="login_mobile">
                                    <a href="dang-nhap.php" class="login-btn">Đăng nhập </a><a href="dang-ky.php"
                                                                                               class="login-btn"> / Đăng
                                        ký</a>
                                </div>
                                <div class="close_menu"></div>
                            </div>
                            <div class="content_menu">
                                <ul>
                                    <?php foreach ($MENULIST

                                    as $item) : ?>
                                    <li class="level0">
                                        <a href="<?php echo $item['slug'] ?>.php">
                                            <span><?php echo $item['name'] ?></span>
                                        </a>

                                        <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- End menu mobile -->
                        <div class="pull-right mobile-menu-icon-wrapper">
                            <!-- Logo mobile -->
                            <div class="logo logo-mobile">
                                <a href="index.php" title="C">
                                    <img src="public/frontend/Uploads/logo.png" alt="">
                                </a>
                            </div>
                            <!-- End Logo mobile -->

                        </div>
                        <div class="clearfix"></div>
                        <!-- Search mobile -->
                        <div class="search_mobile col-md-12">
                            <div class="search_box">
                                <div class="search_wrapper">
                                    <input type="text" name="search" class="index_input_search" id="txtsearch2"
                                           onblur="if(this.value=='')this.value='Nhập từ khóa tìm kiếm...'"
                                           onfocus="if(this.value=='Nhập từ khóa tìm kiếm...')this.value=''"
                                           value="Nhập từ khóa kiếm..."/>
                                    <button class="btn_search_submit btn " type="button" id="btnsearch2"><span><i
                                                    class="fa fa-search"></i></span></button>
                                </div>
                            </div>
                        </div>
                        <!-- End search mobile -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End header -->
        <script type="text/javascript">
            $("#btnsearch").click(function () {
                SearchProduct();
            });
            $("#btnsearch2").click(function () {
                SearchProduct2();
            });
            $("#txtsearch").keydown(function (event) {
                if (event.keyCode == 13) {
                    SearchProduct();
                }
            });
            $("#txtsearch2").keydown(function (event) {
                if (event.keyCode == 13) {
                    SearchProduct2();
                }
            });

            function SearchProduct() {
                var key = $('#txtsearch').val();
                if (key == '' || key == 'Tìm kiếm...') {
                    $('#txtsearch').focus();
                    return;
                }
                window.location = '<?php echo base_url() ?>tim-kiem08e2.html?key=' + key;
            }

            function SearchProduct2() {
                var key = $('#txtsearch2').val();
                if (key == '' || key == 'Tìm kiếm...') {
                    $('#txtsearch2').focus();
                    return;
                }
                window.location = '<?php echo base_url() ?>tim-kiem08e2.html?key=' + key;
            }
        </script>
        <!--Template--
            --End-->
        <!-- Main menu -->
        <nav class="navbar-main">
            <div id="mb_mainnav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12 vertical_menu">
                            <div id="mb_verticle_menu" class="menu-quick-select">
                                <div class="title_block">
                                    <span>Dịch vụ thuê xe PT</span>
                                </div>
                                <div id="menuverti" class="block_content navbar_menuvertical">
                                    <ul class="nav_verticalmenu" style="display: none;">
                                        <?php foreach ($category as $value) : ?>
                                            <li class="has-child level0">
                                                <a class="" href="san-pham.php?danh-muc=<?= $value['id'] ?>"><img
                                                            class="icon-menu" src="public/frontend/Uploads/logo.png"
                                                            alt="">
                                                    <span><?php echo $value['name'] ?></span>
                                                </a>
                                                <?php showMenuLi($categorychill, $value['id']); ?>
                                            </li>

                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <nav class="col-md-9 col-sm-12 col-xs-12 p-l-0">
                            <ul class="menu nav navbar-nav menu_hori">
                                <?php foreach ($MENULIST as $item1) : ?>
                                    <li class="level0">
                                        <a class="" href="<?php echo $item1['slug'] ?>.php">
                                            <span><?php echo $item1['name'] ?></span>
                                        </a>

                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </nav>
        <!-- End main menu -->
        <script type="text/javascript">
            $(document).ready(function () {
                var str = location.href.toLowerCase();
                $("ul.menu li a").each(function () {
                    if (str.indexOf(this.href.toLowerCase()) >= 0) {
                        $("ul.menu li").removeClass("active");
                        $(this).parent().addClass("active");
                    }
                });
            });
        </script>
    </div>

           
            