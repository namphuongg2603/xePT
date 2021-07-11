<!--sau này mọi trang khi chuyển động chúng ta chỉ cần thay đổi duy nhất nội dụng này-->
<div class="partner">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
                <!--Blog-->
                <section id="blog_index" class="container m-b-20">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="section-heading">
                                <h2 title="Tin tức nổi bật">
                                    <span>Danh sách xe được thuê nhiều</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="" class="">
                            <?php foreach ($listproduct8 as $item) : ?>
                                <div style="border-bottom: 0px;" class="col-md-3 article_item">
                                    <div class="article_img">
                                        <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" alt=""
                                             title="" style="height: 165px;">
                                    </div>
                                    <div class="article_content clearfix">
                                        <div class="title">
                                            <h4><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"
                                                   title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></a>
                                            </h4>
                                        </div>
                                        <div class="article_meta">
                                            <div style="color: #ffcc00;" class="article_comment">
                                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                *****
                                            </div>
                                            <div class="article_created">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <time datetime="<?php echo $item['updated_at'] ?>"><?php echo $item['updated_at'] ?></time>
                                            </div>
                                        </div>
                                        <div class="des">
                                            <div style="display: flex;justify-content: space-between;border-top: 1px solid #dedede;padding-top: 10px;margin-top: 10px">
                                                <div style="width: 50%">
                                                    <img style="width: 20px;margin-right: 10px;"
                                                         src="public/frontend/Images/ic-fuel.png"/>
                                                    <span>Xăng</span>
                                                </div>
                                                <div style="width: 50%;text-align: right">
                                                    <img style="width: 20px;" src="public/frontend/Images/ic-tms.png">
                                                    <span style="width: 50px;display: inline-block">Số sàn</span>
                                                </div>
                                            </div>

                                            <div style="display: flex;justify-content: space-between;padding: 10px 0">
                                                <div style="width: 50%">
                                                    <img style="width: 20px;margin-right: 10px;"
                                                         src="public/frontend/Images/piston.png">
                                                    <span>2L</span>
                                                </div>
                                                <div style="width: 50%;text-align: right">
                                                    <img style="width: 20px" src="public/frontend/Images/ic-seat.png">
                                                    <span style="width: 50px;display: inline-block">7 Chổ</span>
                                                </div>
                                            </div>
                                            <!--                                            <p>GHI CHÚ</p>-->
                                            <!--                                            <p>-->
                                            <? //= $item['note'] ?><!--</p>-->
                                        </div>
                                        <a class="readmore" href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">Xem
                                            chi tiết<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <!--EndBlog-->
            </div>
            <div class="col-md-12">
                <!--Blog-->
                <section id="blog_index" class="container m-b-20">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="section-heading">
                                <h2 title="Tin tức nổi bật">
                                    <span>Thuê xe 7 chỗ</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="" class="">
                            <?php foreach ($listproduct7 as $item) : ?>
                                <div style="border-bottom: 0px;" class="col-md-3 article_item">
                                    <div class="article_img">
                                        <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" alt=""
                                             title="" style="height: 165px;">
                                    </div>
                                    <div class="article_content clearfix">
                                        <div class="title">
                                            <h4><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"
                                                   title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></a>
                                            </h4>
                                        </div>
                                        <div class="article_meta">
                                            <div style="color: #ffcc00;" class="article_comment">
                                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                *****
                                            </div>
                                            <div class="article_created">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <time datetime="<?php echo $item['updated_at'] ?>"><?php echo $item['updated_at'] ?></time>
                                            </div>
                                        </div>
                                        <div class="des">
                                            <div style="display: flex;justify-content: space-between;border-top: 1px solid #dedede;padding-top: 10px;margin-top: 10px">
                                                <div style="width: 50%">
                                                    <img style="width: 20px;margin-right: 10px;"
                                                         src="public/frontend/Images/ic-fuel.png"/>
                                                    <span>Xăng</span>
                                                </div>
                                                <div style="width: 50%;text-align: right">
                                                    <img style="width: 20px;" src="public/frontend/Images/ic-tms.png">
                                                    <span style="width: 50px;display: inline-block">Số sàn</span>
                                                </div>
                                            </div>

                                            <div style="display: flex;justify-content: space-between;padding: 10px 0">
                                                <div style="width: 50%">
                                                    <img style="width: 20px;margin-right: 10px;"
                                                         src="public/frontend/Images/piston.png">
                                                    <span>2L</span>
                                                </div>
                                                <div style="width: 50%;text-align: right">
                                                    <img style="width: 20px" src="public/frontend/Images/ic-seat.png">
                                                    <span style="width: 50px;display: inline-block">7 Chổ</span>
                                                </div>
                                            </div>
                                            <!--                                            <p>GHI CHÚ</p>-->
                                            <!--                                            <p>-->
                                            <? //= $item['note'] ?><!--</p>-->
                                        </div>
                                        <a class="readmore" href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">Xem
                                            chi tiết<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <!--EndBlog-->
            </div>
            <div class="col-md-12">
                <!--Blog-->
                <section id="blog_index" class="container m-b-20">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="section-heading">
                                <h2 title="Tin tức nổi bật">
                                    <span>Thuê xe 4 chỗ</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="" class="">
                            <?php foreach ($listproduct4 as $item) : ?>
                                <div style="border-bottom: 0px;" class="col-md-3 article_item">
                                    <div class="article_img">
                                        <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" alt=""
                                             title="" style="height: 165px;">
                                    </div>
                                    <div class="article_content clearfix">
                                        <div class="title">
                                            <h4><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"
                                                   title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></a>
                                            </h4>
                                        </div>
                                        <div class="article_meta">
                                            <div style="color: #ffcc00;" class="article_comment">
                                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                *****
                                            </div>
                                            <div class="article_created">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <time datetime="<?php echo $item['updated_at'] ?>"><?php echo $item['updated_at'] ?></time>
                                            </div>
                                        </div>
                                        <div class="des">
                                            <div style="display: flex;justify-content: space-between;border-top: 1px solid #dedede;padding-top: 10px;margin-top: 10px">
                                                <div style="width: 50%">
                                                    <img style="width: 20px;margin-right: 10px;"
                                                         src="public/frontend/Images/ic-fuel.png"/>
                                                    <span>Xăng</span>
                                                </div>
                                                <div style="width: 50%;text-align: right">
                                                    <img style="width: 20px;" src="public/frontend/Images/ic-tms.png">
                                                    <span style="width: 50px;display: inline-block">Số sàn</span>
                                                </div>
                                            </div>

                                            <div style="display: flex;justify-content: space-between;padding: 10px 0">
                                                <div style="width: 50%">
                                                    <img style="width: 20px;margin-right: 10px;"
                                                         src="public/frontend/Images/piston.png">
                                                    <span>2L</span>
                                                </div>
                                                <div style="width: 50%;text-align: right">
                                                    <img style="width: 20px" src="public/frontend/Images/ic-seat.png">
                                                    <span style="width: 50px;display: inline-block">7 Chổ</span>
                                                </div>
                                            </div>
                                            <!--                                            <p>GHI CHÚ</p>-->
                                            <!--                                            <p>-->
                                            <? //= $item['note'] ?><!--</p>-->
                                        </div>
                                        <a class="readmore" href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">Xem
                                            chi tiết<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <!--EndBlog-->
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="product_home">
            <div class="clearfix">
                <div class="section-heading">
                    <h2 title="">
                        <span>LỢI ÍCH CỦA THUÊ XE PT</span>
                    </h2>
                </div>
            </div>
            <div class="clearfix">
                <div class="product-list">
                    <div class="col-md-2  product-wrapper zoomIn wow">
                        <div style="height: 235px;" class="product-block ">
                            <div class="product-image ">
                                <img width="80px" class="first-img" src="public/frontend/images/icon1.png" alt="">
                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    <a href="" title="">Nhiều lựa chọn</a>
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Hàng trăm loại xe đa dạng ở nhiều địa điểm trên cả nước, phù hợp với mọi mục đích của bạn</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2  product-wrapper zoomIn wow">
                        <div style="height: 235px;" class="product-block ">
                            <div class="product-image ">
                                <img width="80px" class="first-img" src="public/frontend/images/icon2.png" alt="">
                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    <a href="" title="">Thuận tiện</a>
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Dễ dàng tìm kiếm, so sánh và đặt chiếc xe như ý với chỉ vài click chuột</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2  product-wrapper zoomIn wow">
                        <div style="height: 235px;" class="product-block">
                            <div class="product-image">
                                <img width="80px" class="first-img" src="public/frontend/images/icon3.png" alt="">
                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    <a href="" title="">Giá cả cạnh tranh</a>
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Giá thuê được niêm yết công khai và rẻ hơn 10% so với giá truyền thống</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2  product-wrapper zoomIn wow">
                        <div style="height: 235px;" class="product-block ">
                            <div class="product-image">
                                <img width="80px" class="first-img" src="public/frontend/images/icon4.png" alt="">
                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    <a href="s" title="">Tin cậy</a>
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Các xe đều có thời gian sử dụng dưới 3 năm và được bảo dưỡng thường xuyên</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2  product-wrapper zoomIn wow">
                        <div style="height: 235px;" class="product-block ">
                            <div class="product-image ">
                                <img width="80px" class="first-img" src="public/frontend/images/icon5.png" alt="">
                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    <a href="s" title="">Hỗ trợ 24/7</a>
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Có nhân viên hỗ trợ khách hàng trong suốt quá trình thuê xe</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 product-wrapper zoomIn wow">
                        <div style="height: 235px;" class="product-block ">
                            <div class="product-image">
                                <img width="80px" class="first-img" src="public/frontend/images/icon6.png" alt="">
                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    <a href="s" title="">Bảo hiểm</a>
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">An tâm với các gói bảo hiểm vật chất và tai nạn trong suốt quá trình thuê xe</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_home">
            <div class="clearfix">
                <div class="section-heading">
                    <h2 title="ĐẶT XE NHƯ THẾ NÀO">
                        <span>ĐẶT XE NHƯ THẾ NÀO</span>
                    </h2>
                </div>
            </div>
            <div class="clearfix">
                <div class="product-list">
                    <div class="col-md-4 product-wrapper zoomIn wow">
                        <div class="product-block product-resize">
                            <div class="product-image image-resize">
                                <img class="first-img" src="public/frontend/images/thuexe.png" alt="">
                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    Đặt xe
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Nhanh chóng đặt một chiếc xe ưng ý thông qua Website của chúng tôi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 product-wrapper zoomIn wow">
                        <div class="product-block product-resize">
                            <div class="product-image image-resize">

                                <img class="first-img" src="public/frontend/images/step2.webp" alt="" alt="">

                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    Nhận xe
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Nhận xe tại nhà hoặc các đại lý trong khu vực của chúng tôi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 product-wrapper zoomIn wow">
                        <div class="product-block product-resize">
                            <div class="product-image image-resize">

                                <img class="first-img" src="public/frontend/images/step3.webp" alt="">


                            </div>
                            <div class="product-info text-center m-t-xxs-20">
                                <h3 class="pro-name">
                                    Tận hưởng
                                </h3>
                                <div class="pro-prices">
                                    <span class="pro-price">Tất cả các phương tiện của chúng tôi đều đoạt chuẩn an toàn</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <a class="btn btn-primary" href="dat-xe.php" role="button">Xem chi tiết</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <section id="blog_index" class="container m-b-20">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="section-heading">
                            <h2 title="Đối tác">
                                <span>Đối TÁC </span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="Carousel" class="carousel slide">

                            <ol class="carousel-indicators">
                                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#Carousel" data-slide-to="1"></li>
                                <li data-target="#Carousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Uploads/logo.png " alt="Image"
                                                        style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Images/BaoViet_logo.webp" alt="Image"
                                                        style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Images/danang365.webp" alt="Image"
                                                        style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Images/ecohoguom.webp" alt="Image"
                                                        style="max-width:100%;"></a></div>

                                    </div><!--.row-->

                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Images/fubon_logo.webp" alt="Image"
                                                        style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Images/dichung.webp" alt="Image"
                                                        style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Images/trieubaoy.webp" alt="Image"
                                                        style="max-width:100%;"></a></div>
                                        <div class="col-md-3"><a href="#" class="thumbnail"><img
                                                        src="public/frontend/Images/ecohoguom.webp" alt="Image"
                                                        style="max-width:100%;"></a></div>
                                    </div><!--.row-->
                                </div><!--.item-->


                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                            <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                        </div><!--.Carousel-->
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#Carousel').carousel({
                                    interval: 5000
                                })
                            });
                        </script>
                    </div>
                </div>
                <style type="text/css">
                    .carousel {
                        margin-bottom: 0;
                        padding: 0 40px 30px 40px;
                    }

                    /* The controlsy */
                    .carousel-control {
                        left: -12px;
                        height: 40px;
                        width: 40px;
                        background: none repeat scroll 0 0 #222222;
                        border: 4px solid #FFFFFF;
                        border-radius: 23px 23px 23px 23px;
                        margin-top: 90px;
                    }

                    .carousel-control.right {
                        right: -12px;
                    }

                    /* The indicators */
                    .carousel-indicators {
                        right: 50%;
                        top: auto;
                        bottom: -10px;
                        margin-right: -19px;
                    }

                    /* The colour of the indicators */
                    .carousel-indicators li {
                        background: #cecece;
                    }

                    .carousel-indicators .active {
                        background: #428bca;
                    }
                </style>
            </section>
        </div>
    </div>
</div>
               
