
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
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>LandPro | Real Estate Html5 Template</title>
</head>

<body>
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <header id="navbar-spy" class="header header-1 header-transparent header-fixed">
            <nav id="primary-menu" class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                        <a class="logo" href="home-map.php">
                    <img class="logo-light" src="image/logo-light.png" alt="Land Logo">
                    <img class="logo-dark" src="image/logo-dark.png" alt="Land Logo">
                </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                        <ul class="nav navbar-nav nav-pos-center navbar-left">
                            <!-- Home Menu -->
                            <li class="has-dropdown active">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">home</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">home search</a></li>
                                    <li><a href="home-map.html">home map</a></li>
                                    <li><a href="home-property.html">home property</a></li>
                                    <li><a href="home-splash.html">home splash</a></li>
                                </ul>
                            </li>
                            <!-- li end -->

                            <!-- Pages Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">agents</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="agents.html">All Agents</a>
                                            </li>
                                            <li>
                                                <a href="agent-profile.html">agent profile</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">agencies</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="agency-list.html">all agencies</a>
                                            </li>
                                            <li>
                                                <a href="agency-profile.html">agency profile</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">blog</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="blog.html">blog Grid</a>
                                            </li>
                                            <li>
                                                <a href="blog-sidebar-right.html">blog Grid Right </a>
                                            </li>
                                            <li>
                                                <a href="blog-sidebar-left.html">blog Grid Left </a>
                                            </li>
                                            <li>
                                                <a href="blog-single.html">blog single</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="page-about.html">page about</a></li>
                                    <li><a href="page-contact.html">page contact</a></li>
                                    <li><a href="page-faq.html">page FAQ</a></li>
                                    <li><a href="page-404.html">page 404</a></li>
                                </ul>
                            </li>
                            <!-- li end -->

                            <!-- Profile Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Profile</a>
                                <ul class="dropdown-menu">
                                    <li><a href="user-profile.html">user profile</a></li>
                                    <li><a href="social-profile.html">social profile</a></li>
                                    <li><a href="my-properties.html">my properties</a></li>
                                    <li><a href="favourite-properties.html">favourite properties</a></li>
                                    <li><a href="add-property.html">add property</a></li>
                                </ul>
                            </li>
                            <!-- li end -->

                            <!-- Properties Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Properties</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Properties grid</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="properties-grid.html">properties grid</a>
                                            </li>
                                            <li>
                                                <a href="properties-grid-split.html">properties grid split</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">properties list</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="properties-list.html">properties list</a>
                                            </li>
                                            <li>
                                                <a href="properties-list-split.html">properties list split</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">properties single</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="property-single-gallery.html">single gallery</a>
                                            </li>
                                            <li>
                                                <a href="property-single-slider.html">single slider</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- li end -->

                            <li><a href="page-contact.html">contact</a></li>
                        </ul>
                        <!-- Module Signup  -->
                        <div class="module module-login pull-left">
                            <a class="btn-popup" data-toggle="modal" data-target="#signupModule">Login</a>
                            <div class="modal register-login-modal fade" tabindex="-1" role="dialog" id="signupModule">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#login" data-toggle="tab">login</a>
                                                    </li>
                                                    <li><a href="#signup" data-toggle="tab">signup</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="login">
                                                        <div class="signup-form-container text-center">
                                                            <form class="mb-0">
                                                                <a href="#" class="btn btn--facebook btn--block"><i class="fa fa-facebook-square"></i>Login with Facebook</a>
                                                                <div class="or-text">
                                                                    <span>or</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" name="login-email" id="login-email" placeholder="Email Address">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" name="login-password" id="login-password" placeholder="Password">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="input-checkbox">
                                                                    <label class="label-checkbox">
                                <span>Remember Me</span>
                                <input type="checkbox">
                                <span class="check-indicator"></span>
                            </label>
                                                                </div>
                                                                <input type="submit" class="btn btn--primary btn--block" value="Sign In">
                                                                <a href="#" class="forget-password">Forget your password?</a>
                                                            </form>
                                                            <!-- form  end -->
                                                        </div>
                                                        <!-- .signup-form end -->
                                                    </div>
                                                    <div class="tab-pane" id="signup">
                                                        <form class="mb-0">
                                                            <a href="#" class="btn btn--facebook btn--block"><i class="fa fa-facebook-square"></i>Register with Facebook</a>
                                                            <div class="or-text">
                                                                <span>or</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="full-name" id="full-name" placeholder="Full Name">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" name="register-email" id="register-email" placeholder="Email Address">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" name="register-password" id="register-password" placeholder="Password">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="input-checkbox">
                                                                <label class="label-checkbox">
                                <span>I agree with all <a href="#">Terms & Conditions</a></span>
                                <input type="checkbox">
                                <span class="check-indicator"></span>
                            </label>
                                                            </div>
                                                            <input type="submit" class="btn btn--primary btn--block" value="Register">
                                                        </form>
                                                        <!-- form  end -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        </div>
                        <!-- Module Consultation  -->
                        <div class="module module-property pull-left">
                            <a href="add-property.html" target="_blank" class="btn"><i class="fa fa-plus"></i> add property</a>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>

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
                                <h5>Gửi yêu cầu</h5>
                            </div>
                            <div class="widget--content">
                                <form class="mb-0">
                                    <div class="form-group">
                                        <label for="contact-name">Tên của bạn*</label>
                                        <input type="text" class="form-control" name="contact-name" id="contact-name" required>
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-email">Email *</label>
                                        <input type="email" class="form-control" name="contact-email" id="contact-email" required>
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-phone">Số điện thoại</label>
                                        <input type="text" class="form-control" name="contact-phone" id="contact-phone" placeholder="(optional)">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="message">Lời nhắn*</label>
                                        <textarea class="form-control" name="contact-message" id="message" rows="2" placeholder="(optional)"></textarea>
                                    </div>
                                    <!-- .form-group end -->
                                    <input type="submit" value="Gửi yêu cầu" name="submit" class="btn btn--primary btn--block">
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
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyAdd5CkT5Or59lPzUHISxleG_XO96X3-S8"></script>
    <script src="js/jquery.gmap.min.js"></script>
    <script>
        $('#googleMap').gMap({
            address: "60 HoangDieu,DaNang, VietNam",
            zoom: 20,
            maptype: 'ROADMAP',
            markers: [{
                address: "DaNang, VietNam",
                maptype: 'ROADMAP',
                icon: {
                    image: "image/marker1.png",
                    iconsize: [52, 75],
                    iconanchor: [52, 75]
                }
            }]
        });

    </script>
    <script src="js/map-custom.js"></script>
</body>

</html>
