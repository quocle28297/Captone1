<?php
if (isset($_GET['logout'])) {

    session_destroy();
    session_start(); 
    unset($_SESSION['userData']);
    unset($_SESSION['USERS_NAME']);
    unset($_SESSION['ID']);


    
}
?>
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
                                <li><a href="add-property.php">add property</a></li>
                                <li><a href="home-map.php?logout='1'"> Thoát </a></li>
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
                        <a href="add-property.php" target="_blank" class="btn"><i class="fa fa-plus"></i> add property</a>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

    </header>

            <!--  -->
            <div class="container">
                <div class="form-box">
                    <div class="alert-box success" ><span>success: </span><h6 style="text-align: center;">Tạo phòng thành công.<h6></div> 
                        <a href="add-property.php" target="_blank" class="btn"><i class="fa fa-plus"></i> Thêm phòng</a> 
                        
                    </div>
                </div>
            </body></html>
