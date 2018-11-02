<?php include("data.php") ;?>
<?php require_once('server.php') ?>
<?php 
if (!isset($_SESSION['ID'])){
    header('Location: home-map.php');
    exit();
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><style type="text/css">.gm-err-container{height:100%;width:100%;display:table;background-color:#e0e0e0;position:relative;left:0;top:0}.gm-err-content{border-radius:1px;padding-top:0;padding-left:10%;padding-right:10%;position:static;vertical-align:middle;display:table-cell}.gm-err-content a{color:#4285f4}.gm-err-icon{text-align:center}.gm-err-title{margin:5px;margin-bottom:20px;color:#616161;font-family:Roboto,Arial,sans-serif;text-align:center;font-size:24px}.gm-err-message{margin:5px;color:#757575;font-family:Roboto,Arial,sans-serif;text-align:center;font-size:12px}.gm-err-autocomplete{padding-left:20px;background-repeat:no-repeat;background-size:15px 15px}
</style><style type="text/css">.gm-style-pbc{transition:opacity ease-in-out;background-color:rgba(0,0,0,0.45);text-align:center}.gm-style-pbt{font-size:22px;color:white;font-family:Roboto,Arial,sans-serif;position:relative;margin:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}
</style>
    <!-- Document Meta
        ============================================= -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--IE Compatibility Meta-->
        <meta name="author" content="zytheme">
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
        <title>Roomy</title>
        <script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/34/14/common.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/34/14/util.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/34/14/map.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/34/14/geocoder.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/34/14/marker.js"></script><style type="text/css">.gm-style {
            font: 400 11px Roboto, Arial, sans-serif;
            text-decoration: none;
        }
    .gm-style img { max-width: none; }</style><script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/34/14/onion.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/34/14/stats.js"></script></head>

    <body>
    <!-- Document Wrapper
     ============================================= -->
     <div id="wrapper" class="wrapper clearfix">
        <header id="navbar-spy" class="header header-1 header-transparent header-fixed">
            <nav id="primary-menu" class="navbar navbar-fixed-top affix">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo" href="index.html">
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
                     <?php  if (!isset($_SESSION['USERS_NAME'])&&!isset($_SESSION['userData'])) : ?>
                     <a class="btn-popup" data-toggle="modal" data-target="#signupModule">Login</a>
                 <?php endif ?>

                 <?php  if (isset($_SESSION['userData'])) : ?>
                    <a class="btn-popup" data-toggle="modal" data-target="#frofile">Welcome <strong> 
                        <?php echo $_SESSION['userData']['first_name']." ".$_SESSION['userData']['last_name']." ".$_SESSION['ID'];
                        ?></strong></a>
                    <?php endif ?>

                    <?php  if (isset($_SESSION['USERS_NAME'])) : ?>
                        <a class="btn-popup" data-toggle="modal" data-target="#frofile">Welcome <strong> 
                            <?php echo $_SESSION['USERS_NAME'];
                            ?></strong></a>
                        <?php endif ?>
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
                                                                <span>I agree with all <a href="#">Terms &amp; Conditions</a></span>
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
            <section id="page-title" class="page-title bg-overlay bg-overlay-dark2 bg-section" style="background-image: url(&quot;assets/images/page-titles/1.jpg&quot;);">

                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                            <div class="title title-1 text-center">
                                <div class="title--content">
                                    <div class="title--heading">
                                        <h1>Add Property</h1>
                                    </div>
                                    <ol class="breadcrumb">
                                        <li><a href="#">Home</a></li>
                                        <li class="active">Add Property</li>
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

        <!-- #Add Property
            ============================================= -->
            <section id="add-property" class="add-property">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <form class="mb-0"  method="post" enctype="multipart/form-data"   >
                                <div class="form-box">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h4 class="form--title">Thêm phòng</h4>
                                            <?php include('errors.php'); ?>
                                            <?php include('statusMessage.php'); ?>
                                        </div>
                                        <!-- .col-md-12 end -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="property-title">Tên phòng*</label>
                                                <input type="text" class="form-control" name="property-title" id="property-title" required="">
                                            </div>
                                        </div>
                                        <!-- .col-md-12 end -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="property-description">Mô tả*</label>
                                                <textarea class="form-control" name="property-description" id="property-description" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <!-- .col-md-12 end -->
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="select-type">Loại</label>
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-type" id="select-type">
                                                        <option value="">Kiểu Chổ ở</option>
                                                        <?php echo fill_Tyle($conn); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 end -->
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="select-status">Tình trạng</label>
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-status" id="select-status"><option value="">Tình Trạng</option>
                                                        <?php echo fill_Status($conn); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 end -->   
                                        <!-- .col-md-4 end -->
                                        <!-- .col-md-4 end -->
                                        <!-- .col-md-4 end -->
                                        <!-- .col-md-4 end -->
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="Area">Khu</label>
                                                <div class="select--box">
                                                   <i class="fa fa-angle-down"></i>
                                                   <select name="select-zone" id="select-zone"><option value="">Khu</option>
                                                    <?php echo fill_zone($conn); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Size">Diện tích</label>
                                            <input type="text" class="form-control" name="Size" id="Size" placeholder="Đơn vị là m²">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Sale-Rent-Price">Giá*</label>
                                            <!-- onChange="format_curency(this);" --> 
                                            <input type="text" class="form-control" name="Sale-Rent-Price" id="Sale-Rent-Price" placeholder="Giá tiền  trên một tháng">
                                        </div>
                                    </div>
                                    <!-- .=======phan dau==== -->
                                    <!-- .col-md-4 end -->
                                    <!-- .col-md-4 end -->
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group" >
                                            <label for="Video-URL">Hình ảnh</label>
                                            <input type="text" class="form-control" name="Video-URL" id="Video-URL" placeholder="Youtube, Vimeo, Dailymotion, etc..">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Thêm ảnh:</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-12">

                                        <div id="dZUpload" class="dropzone">
                                        <!-- upload file -->
                                        <input type="file" name="files[]" multiple >
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->

                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Vị trí chổ ở</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="select--box">
                                            <label for="address">Địa chỉ*</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ cụ thể VD: số nhà, tên đường" required="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <label for="address">Tỉnh/Thành Phố</label>
                                        <div class="select--box">
                                            <i class="fa fa-angle-down"></i>
                                            <select class="form-control" name="select-Province"  id="select-Province">
                                                <option value="">Tỉnh/Thành Phố</option>
                                                <?php echo fill_Provider($conn); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                       <label for="address">Quận/Huyện</label>
                                       <div class="select--box">
                                        <i class="fa fa-angle-down"></i>
                                        <select class="form-control" name="select-District" id="select-District">
                                            <option value="">Quận/Huyện</option>
                                            <?php echo fill_District($conn); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <hr>
                                </div>
                                <!-- .col-md-4 end -->
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                   <label for="address">Phường/Xã</label>
                                   <div class="select--box">
                                    <i class="fa fa-angle-down"></i>
                                    <select class="form-control" name="select-Ward" id="select-Ward">
                                        <option value="">Phường/Xã</option>
                                        <?php echo fill_Ward($conn); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <hr>
                               <div id="googleMap" style="width: 100%; height: 380px; position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon"><img src="http://maps.gstatic.com/mapfiles/api-3/image/icon_error.png" draggable="false" style="user-select: none;"></div><div class="gm-err-title">Oops! Something went wrong.</div><div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript console for technical details.</div></div></div></div></div>
                           </div>
                           <!-- .col-md-12 end -->
                       </div>
                       <!-- .row end -->
                   </div>
                   <!-- .form-box end -->
                   <input type="submit" id="save" value="save" name="save"  class="btn btn--primary">
               </form>
           </div>
           <!-- .col-md-12 end -->
       </div>
       <!-- .row end -->
   </div>
</section>
<!-- #social-profile  end -->

        <!-- cta #1
            ============================================= -->
            <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90 bg-section" style="background-image: url(&quot;assets/images/cta/bg-1.jpg&quot;);">

                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                            <h3>Join our professional team &amp; agents to start selling your house</h3>
                            <a href="#" class="btn btn--primary">Contact</a>
                        </div>
                        <!-- .col-md-6 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
            <!-- #cta1 end -->
        <!-- Footer #1
            ============================================= -->
            <footer id="footer" class="footer footer-1 bg-white">
            <!-- Widget Section
             ============================================= -->
          <!--  <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 widget--about">
                            <div class="widget--content">
                                <div class="footer--logo">
                                    <img src="image/logo-dark2.png" alt="logo">
                                </div>
                                <p>86 Petersham town, New South Wales Wardll Street, Australia PA 6550</p>
                                <div class="footer--contact">
                                    <ul class="list-unstyled mb-0">
                                        <li>+61 525 240 310</li>
                                        <li><a href="mailto:contact@land.com">contact@land.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                       <!-- <div class="col-xs-12 col-sm-3 col-md-2 col-md-offset-1 widget--links">
                            <div class="widget--title">
                                <h5>Company</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Properties</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                       <!-- <div class="col-xs-12 col-sm-3 col-md-2 widget--links">
                            <div class="widget--title">
                                <h5>Learn More</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                       <!-- <div class="col-xs-12 col-sm-12 col-md-4 widget--newsletter">
                            <div class="widget--title">
                                <h5>newsletter</h5>
                            </div>
                            <div class="widget--content">
                                <form class="newsletter--form mb-40">
                                    <input type="email" class="form-control" id="newsletter-email" placeholder="Email Address">
                                    <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                </form>
                                <h6>Get In Touch</h6>
                                <div class="social-icons">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                  <!--  </div>
                </div>
                <!-- .container end -->
           <!-- </div>
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
        <script src="js/dropzone.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/jquery.gmap.min.js"></script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdd5CkT5Or59lPzUHISxleG_XO96X3-S8&callback=initMap">
    </script> 
    <script>
        // $('#googleMap').gMap({
        //     address: "121 King St,Melbourne, Australia",
        //     zoom: 12,
        //     maptype: 'ROADMAP',
        //     markers: [{
        //         address: "Melbourne, Australia",
        //         maptype: 'ROADMAP',
        //         icon: {
        //             image: "assets/images/gmap/marker1.png",
        //             iconsize: [52, 75],
        //             iconanchor: [52, 75]
        //         }
        //     }]
        // });
        function initMap() {
         map = new google.maps.Map(document.getElementById('googleMap'), {
          center: new google.maps.LatLng(16.055412, 108.202587),
          zoom: 15
      });
     }
 </script>
 <script src="assets/js/map-custom.js"></script>

<a href="facebook.com"></a>

 <div style="position: absolute; left: 0px; top: -2px; height: 1px; overflow: hidden; visibility: hidden; width: 1px;"><span style="position: absolute; font-size: 300px; width: auto; height: auto; margin: 0px; padding: 0px; font-family: Roboto, Arial, sans-serif;">BESbswy</span></div></body></html>
 <script >
     function format_curency(a) {
        a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    }
</script>
<script>  
    //load quan huyen
    $(document).ready(function(){  
      $('#select-Province').change(function(){  
       var PROVINCE_ID = $(this).val();  
       $.ajax({  
        url:"District.php",  
        method:"POST",  
        data:{PROVINCE_ID:PROVINCE_ID},  
        success:function(data){  
         $('#select-District').html(data);  
     }  
 });  
   });  
  }); 
  //load phuong xa
  $(document).ready(function(){  
      $('#select-District').change(function(){  
       var DISTRICT_ID = $(this).val();  
       $.ajax({  
        url:"Ward.php",  
        method:"POST",  
        data:{DISTRICT_ID:DISTRICT_ID},  
        success:function(data){  
         $('#select-Ward').html(data);  
     }  
 });  
   });  
  });   
</script>  