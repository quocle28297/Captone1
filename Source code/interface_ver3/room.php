
<?php require_once('server.php') ?>
<?php
if (isset($_GET['logout'])) {

    session_destroy();
    session_start(); 
    unset($_SESSION['userData']);
    unset($_SESSION['USERS_NAME']);
    unset($_SESSION['ID']);


    
}
require_once "config.php";


$redirectURL = "http://localhost/text/interface%20update%20(fix)/fb-callback.php";
$permissions = ['email'];
$loginURL = $helper->getLoginUrl($redirectURL, $permissions);
?>
<?php
include('connect.php'); 
$idroom = "";
if(isset($_GET['idroom'])&&!empty($_GET['idroom']))
    $idroom = (string)$_GET['idroom'];
$query = "SELECT type.TYPE_NAME, zone.ZONE_NAME, zone.ZONE_ADDRESS, district.DISTRICT_NAME, ward.WARD_NAME, province.PROVINCE_NAME,users.USERS_USERNAME, users.USERS_PHONE, ROOM_PRICE, ROOM_DISCRIBE FROM room INNER JOIN type on ROOM_TYPE_ID = type.TYPE_ID
INNER JOIN zone on ROOM_ZONE_ID = zone.ZONE_ID
INNER JOIN district on zone.ZONE_DISTRICT_ID = district.DISTRICT_ID
INNER JOIN ward ON zone.ZONE_WARD_ID = ward.WARD_ID
INNER JOIN province ON zone.ZONE_PROVINCE_ID = province.PROVINCE_ID
INNER JOIN users ON zone.ZONE_USER_ID = users.USERS_ID
where ROOM_ID = ".$idroom." AND room.ROOM_STATUS_ID = 1";
$result = mysqli_query($connection,$query);
if (!$result) {
    die('Invalid query: ' . mysqli_error($connection));
}
$row = @mysqli_fetch_assoc($result);
$typename = $row['TYPE_NAME'];
$zonename = $row['ZONE_ADDRESS'];
$address = $row['ZONE_ADDRESS'];
$tp = $row['PROVINCE_NAME'];
$quan = $row['DISTRICT_NAME'];
$huyen = $row['WARD_NAME'];
$price = $row['ROOM_PRICE'];
$username = $row['USERS_USERNAME'];
$userphone = $row['USERS_PHONE'];
$mota = $row['ROOM_DISCRIBE'];
?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
        ============================================= -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--IE Compatibility Meta-->
        <meta name="author" content="zytheme" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Real Estate html5 template">
        <link href="image/favicon.png" rel="icon">

    <!-- Fonts
        ============================================= -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
    <!-- Stylesheets
        ============================================= -->
        <link href="css/external.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style_nhat.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!--icon facebook
        -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
  <![endif]-->

    <!-- Document Title
        ============================================= -->
        <title>ROOMY</title>

    </head>

    <body>
    
    <!-- Document Wrapper
        ============================================= -->
        <?php require_once('head.html') ?>

        <!-- Page Title #1
            ============================================ -->
            <section id="page-title" class="page-title bg-overlay bg-overlay-dark2">
                <div class="bg-section">
                    <img src="image/1.jpg" alt="Background" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                            <div class="title title-1 text-center">
                                <div class="title--content">
                                    <div class="title--heading">
                                        <h1><?php echo $typename; ?></h1>
                                    </div>
                                    <ol class="breadcrumb">
                                        <li><a href="home-map.php">Trang Chủ</a></li>
                                        <li class="active"><?php echo $typename; ?></li>
                                    </ol>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- .title end -->
                        </div>
                        <!-- .col-md-12 end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </section>
            <!-- #page-title end -->

        <!-- property single gallery
            ============================================= -->
            <section id="property-single-gallery" class="property-single-gallery">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="property-single-gallery-info">
                                <div class="property--info clearfix">
                                    <div class="pull-left">
                                        <h5 class="property--title"><?php echo $address; ?></h5>
                                        <p class="property--location"><i class="fa fa-map-marker"></i><?php echo $address.", ".$quan." - ".$huyen." - ".$tp; ?></p>
                                    </div>
                                    <div class="pull-right">
                                        <span class="property--status">Cho thuê</span>
                                        <p class="property--price"><?php echo $price." VNĐ"; ?></p>
                                    </div>
                                </div>
                                <!-- .property-info end -->
                                <div class="property--meta clearfix">
                                    <div class="pull-left">
                                        <ul class="list-unstyled list-inline mb-0">
                                            <li>
                                                ID chỗ ở: <span class="value"><?php echo $idroom; ?></span>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    
                                </div>
                                <!-- .property-info end -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <div class="property-single-carousel inner-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="heading">
                                            <h2 class="heading--title">Hình ảnh về chỗ ở</h2>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="property-single-carousel-content">
                                            <div class="carousel carousel-thumbs slider-navs" data-slide="1" data-slide-res="1" data-autoplay="true" data-thumbs="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="800" data-slider-id="1">
                                                <?php
                                                $query = "select IMAGE_NAME FROM image WHERE IMAGE_ROOM_ID = ".$idroom;
                                                $result = mysqli_query($connection,$query);
                                                if (!$result) {
                                                    die('Invalid query: ' . mysqli_error($connection));
                                                }
                                                while ( $row = @mysqli_fetch_assoc($result)) {
                                                    echo '<img src="uploads/'.$row['IMAGE_NAME'].'" alt="Property Image" id="propertyImg">';
                                                }   
                                                ?>
                                            </div>
                                            <!-- .carousel end -->
                                            <div class="owl-thumbs thumbs-bg" data-slider-id="1">
                                                <?php
                                                $query = "select IMAGE_NAME FROM image WHERE IMAGE_ROOM_ID = ".$idroom;
                                                $result = mysqli_query($connection,$query);
                                                if (!$result) {
                                                    die('Invalid query: ' . mysqli_error($connection));
                                                }
                                                while ( $row = @mysqli_fetch_assoc($result)) {
                                                    echo '<button class="owl-thumb-item">
                                                    <img src="uploads/'.$row['IMAGE_NAME'].'" alt="Property Image thumb" id="thumb">
                                                    </button>';
                                                }   
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <!-- .col-md-12 end -->
                                    </div>
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .property-single-desc end -->
                            <div class="property-single-desc inner-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="heading">
                                            <h2 class="heading--title">Mô tả</h2>
                                        </div>
                                    </div>
                                    <!-- feature-panel #1 -->
                                    <div class="col-xs-6 col-sm-4 col-md-4">
                                        <div class="feature-panel">
                                          
                                            <div class="feature--content">
                                                <h5>Khu:</h5>
                                                <p><?php echo $zonename; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- feature-panel end -->
                                    
                                    
                                    <!-- feature-panel end -->
                                    <!-- feature-panel #6 -->
                               <!-- <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="image/property-single/features/6.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Garage:</h5>
                                            <p>2 Garages</p>
                                        </div>
                                    </div>
                                </div>-->
                                <!-- feature-panel end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="property--details">
                                        <p><?php echo $mota; ?></p>
                                    </div>
                                    <!-- .property-details end -->
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>

                        <!-- .property-single-desc end -->


                        
                        <!-- .property-single-features end -->

                        <div class="property-single-location inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Vị trí</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="list-unstyled mb-20">
                                        <li><span>Địa chỉ: <?php echo $address; ?></span></li>
                                        <li><span>Thành phố: <?php echo $tp; ?></span></li>
                                        <li><span>Quận/Huyện: <?php echo $quan; ?></span></li>
                                        <li><span>Phường/Xã: <?php echo $huyen; ?></span></li>
                                        
                                    </ul>
                                </div>
                                <!-- .col-md-12 end -->

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div id="googleMap" style="width:100%;height:380px;"></div>
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-location end -->

                        
                        <!-- .property-single-design end -->

                        
                        <!-- .property-single-video end -->

                        
                        <!-- .property-single-reviews end -->

                        
                        <!-- .property-single-leave-review end -->
                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-xs-12 col-sm-12 col-md-4">
                       

                        <!-- widget property agent
                            =============================-->
                            <div class="widget widget-property-agent">
                                <div class="widget--title">
                                    <h5>Liên hệ</h5>
                                </div>
                                <div class="widget--content">
                                    <a href="#">
                                        <div class="agent--img">
                                            <img src="image/7.jpg" alt="agent" class="img-responsive">
                                        </div>
                                        <div class="agent--info">
                                            <h5 class="agent--title"></h5>
                                        </div>
                                    </a>
                                    <!-- .agent-profile-details end -->
                                    <div class="agent--contact">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-phone"></i><?php echo $userphone; ?></li>
                                            <li><i class="fa fa-envelope-o"></i><?php echo $username; ?></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- .agent-contact end -->
                                    
                                    <!-- .agent-social-links -->
                                </div>
                            </div>
                            <!-- . widget property agent end -->

                        <!-- widget request
                            =============================-->

                            <div class="widget widget-request">
                                <div class="widget--title">
                                    <h5>Đặt Thuê</h5>
                                </div>
                                <div class="widget--content">
                                    <form class="mb-0">
                                        <div class="form-group">
                                            <label for="contact-name">Tên của bạn*</label>
                                            <input type="text" class="form-control" name="contact-name" id="contact-name" placeholder="(Tên Của Bạn)" required>
                                            
                                        </div>
                                        <!-- .form-group end -->
                                        
                                        <!-- .form-group end -->
                                        <div class="form-group">
                                            <label for="contact-phone">Số điện thoại Liên Hệ</label>
                                            <input type="text" class="form-control" name="contact-phone" id="contact-phone" placeholder="(Số Điện Thoại)">
                                        </div>
                                        <!-- .form-group end -->
                                        <div class="form-group">
                                            <label for="message">Lời nhắn*</label>
                                            <textarea class="form-control" name="contact-message" id="message" rows="2" placeholder="(Lời Nhắn)"></textarea>
                                        </div>
                                        <!-- .form-group end -->
                                        <input type="button" value="Đặt" name="button" class="btn btn--primary btn--block thuebtn">
                                        <p class="booked"><strong>BẠN ĐÃ ĐẶT NƠI NÀY!!</br>VUI LÒNG LIÊN HỆ VÀ ĐỢI CHỦ CHỔ Ở XÁC NHẬN!!</strong></p>
                                    </form>
                                </div>

                            </div>
                            <div class="report">
                                <div class="widget widget-request">
                                  <h3>Báo cáo</h3>
                                  <div style="margin-top: 10px;">
                                    <span style="color: green;"></span>
                                    <form method="post">
                                        <div class="baocao1">
                                            <input type="radio" name="baoCao" value="Đã thuê" > Đã có người thuê
                                        </div>
                                        <div class="baocao2">
                                            <input type="radio" name="baoCao" value="Sai thông tin" > Sai thông tin
                                        </div>
                                        <div class="baocao3">
                                            <input type="radio" name="baoCao" value="Trung gian" > Dịch vụ trung gian
                                        </div>
                                        
                                        <div class="submit" >
                                            <button type="submit">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- . widget request end -->

                        <!-- widget featured property
                            =============================-->
                     <!--   <div class="widget widget-featured-property">
                            <div class="widget--title">
                                <h5>Featured Properties</h5>
                            </div>
                            <div class="widget--content">
                                <div class="carousel carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                                    <!-- .property-item #1 -->
                                   <!-- <div class="property-item">
                                        <div class="property--img">
                                            <img src="image/13.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Rent</span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title">House in Chicago</h5>
                                                <p class="property--location">1445 N State Pkwy, Chicago, IL 60610</p>
                                                <p class="property--price">$1200<span class="time">month</span></p>
                                            </div>
                                            <!-- .property-info end -->
                                         <!--</div>
                                    </div>
                                    <!-- .property item end -->
                                    <!-- .property-item #2 -->
                                   <!--  <div class="property-item">
                                        <div class="property--img">
                                            <img src="image/2.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Rent</span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="#">Villa in Oglesby Ave</a></h5>
                                                <p class="property--location">1035 Oglesby Ave, Chicago, IL 60617</p>
                                                <p class="property--price">$130,000<span class="time">month</span></p>
                                            </div>
                                            <!-- .property-info end -->
                                       <!--  </div>
                                    </div>
                                    <!-- .property item end -->
                                    <!-- .property-item #3 -->
                                   <!--  <div class="property-item">
                                        <div class="property--img">
                                            <img src="image/3.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Sale</span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="#">Apartment in Long St.</a></h5>
                                                <p class="property--location">34 Long St, Jersey City, NJ 07305</p>
                                                <p class="property--price">$70,000</p>
                                            </div>
                                            <!-- .property-info end -->
                                        <!-- </div>
                                    </div>
                                    <!-- .property item end -->
                                <!-- </div>
                                    <!-- .carousel end -->
                          <!--   </div>
                        </div>
                        <!-- . widget featured property end -->

                        <!-- widget mortgage calculator
                            =============================-->
                            
                            <!-- . widget mortgage calculator end -->
                        </div>
                        <!-- .col-md-4 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
            <!-- #property-single end -->
		  <!-- Customer report
            =============================-->			
            
        <!-- properties-carousel
            ============================================= -->
            <section id="properties-carousel" class="properties-carousel pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="heading heading-2  mb-70">
                                <h2 class="heading--title">Nội dung tương tự</h2>
                            </div>
                            <!-- .heading-title end -->
                        </div>
                        <!-- .col-md-12 end -->
                    </div>
                    <!-- .row end -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="carousel carousel-dots" data-slide="3" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                                <!-- .property-item #1 -->
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="image/3.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Sale</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">Apartment in Long St.</a></h5>
                                            <p class="property--location">34 Long St, Jersey City, NJ 07305</p>
                                            <p class="property--price">$70,000</p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">2</span></li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">1</span></li>
                                                <li><span class="feature">Area:</span><span class="feature-num">200 sq ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                <!-- .property item end -->

                                <!-- .property-item #2 -->
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="image/11.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Sale</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">Villa in Chicago IL</a></h5>
                                            <p class="property--location">1445 N State Pkwy, Chicago, IL 60610</p>
                                            <p class="property--price">$235,000</p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">3</span></li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">2</span></li>
                                                <li><span class="feature">Area:</span><span class="feature-num">1120 sq ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                <!-- .property item end -->

                                <!-- .property-item #3 -->
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="image/5.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Rent</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">2750 House in Urban St.</a></h5>
                                            <p class="property--location">2750 Urban Street Dr, Anderson, IN 46011</p>
                                            <p class="property--price">$1,550<span class="time">month</span></p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">2</span></li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">2</span></li>
                                                <li><span class="feature">Area:</span><span class="feature-num">1390 sq ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                <!-- .property item end -->

                                <!-- .property-item #4 -->
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="image/4.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Sale</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">House in Kent Street</a></h5>
                                            <p class="property--location">127 Kent Street, Sydney, NSW 2000</p>
                                            <p class="property--price">$130,000</p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">2</span></li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">2</span></li>
                                                <li><span class="feature">Area:</span><span class="feature-num">587 sq ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                <!-- .property item end -->

                                <!-- .property-item #5 -->
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="image/2.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Rent</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">Villa in Oglesby Ave</a></h5>
                                            <p class="property--location">1035 Oglesby Ave, Chicago, IL 60617</p>
                                            <p class="property--price">$130,000<span class="time">month</span></p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">4</span></li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">3</span></li>
                                                <li><span class="feature">Area:</span><span class="feature-num">800 sq ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                <!-- .property item end -->

                                <!-- .property-item #6 -->
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="image/3.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For Sale</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">Apartment in Long St.</a></h5>
                                            <p class="property--location">34 Long St, Jersey City, NJ 07305</p>
                                            <p class="property--price">$70,000</p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">2</span></li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">1</span></li>
                                                <li><span class="feature">Area:</span><span class="feature-num">200 sq ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                <!-- .property item end -->

                            </div>
                            <!-- .carousel end -->
                        </div>
                        <!-- .col-md-12 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
            <!-- #properties-carousel  end  -->

        <!-- cta #1
            ============================================= -->
            
            <!-- #cta1 end -->
        <!-- Footer #1
            ============================================= -->
            <footer id="footer" class="footer footer-1 bg-white">
            <!-- Widget Section
                ============================================= -->
                
                <!-- .footer-widget end -->

            <!-- Copyrights
                ============================================= -->
                <div class="footer--copyright text-center">
                    <div class="container">
                        <div class="row footer--bar">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <span>© 2018 <a href="http://themeforest.net/user/zytheme">Zytheme</a>, All Rights Reserved.</span>
                            </div>

                        </div>
                        <!-- .row end -->
                    </div>
                    <!-- .container end -->
                </div>
                <!-- .footer-copyright end -->
            </footer>
        </div>
        <!-- #wrapper end -->

    <!-- Footer Scripts
        ============================================= -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/functions.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyBVdRkvgs4_mrMS6VM2wU1x_Osd9In6K7E"></script>
        <script src="js/jquery.gmap.min.js"></script>
        <script src="js/jquery.js"></script>
        <?php  
            $query = "select CONTRACT_ROOM_ID, CONTRACT_USERS_ID from contract where CONTRACT_ROOM_ID = ".$idroom." and CONTRACT_USERS_ID =".$_SESSION['ID'];
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die('Invalid query: ' . mysqli_error($connection));
            }
            $rowcount=mysqli_num_rows($result);
            if($rowcount>0){
        ?>
            <script type="text/javascript">
                $(".form-group").addClass("disable");
                $(".thuebtn").addClass("disable");
            </script>    
        <?php   
            }   
        ?>
        <script>
            $('#googleMap').gMap({
                address: "60 HoangDieu, DaNang, VietNam",
                zoom: 16,
                maptype: 'ROADMAP',
                markers: [{
                    address: "60 HoangDieu, DaNang, VietNam",
                    // maptype: 'ROADMAP',
                    icon: {
                        image: "image/marker1.png",
                        iconsize: [52, 75],
                        iconanchor: [52, 75]
                    }
                }]
            });
            $(".thuebtn").click(function(){
                if($('#contact-name').val()==""){
                    $('#contact-name').attr("placeholder", "Vui Long Nhap Ten");
                    $('#contact-name').addClass('redColor');
                }
                else if($('#contact-phone').val()==""){
                    $('#contact-phone').attr("placeholder", "Vui Long Nhap SĐT");
                    $('#contact-phone').addClass('redColor');
                }
                else{
                <?php  
                    if(isset($_SESSION['ID'])){
                        $query = "insert into contract (CONTRACT_ROOM_ID, CONTRACT_USERS_ID, CONTRACT_PRICE, CONTRACT_STATUS) VALUES (".$idroom.",".$_SESSION['ID'].",'".$price."',1)";
                        $result = mysqli_query($connection,$query);
                        if (!$result) {
                            die('Invalid query: ' . mysqli_error($connection));
                        }
                        
                    }
                ?>
                location.reload();
                }
            });

        </script>
        <script src="js/map-custom.js"></script>
    </body>

    </html>
