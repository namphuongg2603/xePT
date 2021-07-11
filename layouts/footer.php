<!--FOOTER , THÔNG TIN CÔNG TY, CHÍNH SÁCH CÔNG TY, ĐỊA CHỈ ...-->
<div class="footer">
    <script src="public/frontend/app/services/moduleServices.js"></script>
    <script src="public/frontend/app/controllers/moduleController.js"></script>
    <footer class="footer-content">
        <div class="footer_top" style="background: #33FFFF ">
            <div class="container">
                <div class="footer_top_wrap">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 1 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    GIỚI THIỆU
                                </h4>
                                <div class="block_content">
                                    <ul class="list_group">
                                        <li class="item">
                                            <a href="gioi-thieu.php">
                                                Về chúng tôi
                                            </a>
                                        </li>

                                        <li class="item">
                                            <a href="chinh-sach-bao-mat.php">
                                                Ch&#237;nh s&#225;ch bảo mật
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End footer col 1 -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 1 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    Trợ gi&#250;p
                                </h4>
                                <div class="block_content">
                                    <ul class="list_group">
                                        <li class="item">
                                            <a href="dat-xe.php">
                                                Hướng dẫn thuê xe
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="khieu-nai.php">
                                                Sự cố về khiếu nại
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- End footer col 1 -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 3 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    Đăng ký nhận bản tin
                                </h4>
                                <div class="block_content" ng-controller="moduleController" ng-init="initController()">
                                    <div class="des_newsletter_form">
                                        Đăng Ký Thành Viên Để Nhận Bản Tin Mỗi Ngày:
                                    </div>
                                    <form id="newsletter_form" ng-submit="registerNewsletter()"
                                          class="m-b-20 contact-form">
                                        <div class="newsletter_wrap">
                                            <input ng-model="newsletter.Email" required="" id="contact_email"
                                                   autocomplete="off" type="email">
                                            <label>Email của bạn </label>
                                            <button class="btn-newsletter" type="submit">
                                                <span><i class="fa fa-paper-plane-o"></i></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End footer col 3 -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- footer col 4 -->
                            <div class="footer_block">
                                <h4 class="footer_block_title">
                                    Theo dõi trên Fanpage
                                </h4>
                                <div class="block_content">
                                    <li><a><span><i class="fa fa-facebook"></i></span></a></li>
                                </div>
                            </div>
                            <!-- End footer col 4 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom" style="background: #FFFFFF">
            <div class="container">
                <div class="footer_bottom_wrap">
                    <div class="row">
                       
                        <div class="col-lg-5 text-right text-center-xs">
                            <div class="copy_right">
                                <p>
                                    <!-- <  &copy; 2019. Bản quyền thuộc về <a rel="nofollow" href="index.php"></a>. Powered by <a href="index.php">THUXEPT</a> -->
                                </p>
                            </div>
                            <div class="social_footer">
                                <ul>
                                    <li><a><span><i class="fa fa-facebook"></i></span></a></li>
                                    <li><a><span><i class="fa fa-twitter"></i></span></a></li>
                                    <li><a><span><i class="fa fa-google-plus"></i></span></a></li>
                                    <li><a><span><i class="fa fa-youtube"></i></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
</div>
<div style="display: none;" id="loading-mask">
    <div id="loading_mask_loader" class="loader">
        <img alt="Loading..." src="public/frontend/Images/ajax-loader-main.gif"/>
        <div>
            Please wait...
        </div>
    </div>
</div>
<a href="javascript:void(0);" class="back-to-top"><span>Top</span></a>
<script type="text/javascript">
    $(".header-content").css({"background": ''});
    $("html").addClass('');
</script>
</body>
</html>
