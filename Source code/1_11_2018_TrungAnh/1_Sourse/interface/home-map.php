
<?php include('server.php') ?>
<?php
if (isset($_GET['logout'])) {

    session_destroy();
    session_start(); 
    unset($_SESSION['userData']);
    unset($_SESSION['USERS_NAME']);
    unset($_SESSION['ID']);


    
}
require_once "config.php";


$redirectURL = "http://localhost/text/30_10_2017/1_Sourse/interface/fb-callback.php";
$permissions = ['email'];
$loginURL = $helper->getLoginUrl($redirectURL, $permissions);
?>



<?php include("data.php") ?>
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


                            <!-- check nut login -->
                            <div class="module module-login pull-left">
                               <?php  if (!isset($_SESSION['USERS_NAME'])&&!isset($_SESSION['userData'])) : ?>
                               <a class="btn-popup" data-toggle="modal" data-target="#signupModule">Login</a>
                           <?php endif ?>

                           <?php  if (isset($_SESSION['userData'])) : ?>
                            <a class="btn-popup" data-toggle="modal" data-target="#frofile">Welcome <strong> 
                                <?php echo $_SESSION['userData']['first_name']." ".$_SESSION['userData']['last_name'];
                                ?></strong></a>
                            <?php endif ?>

                            <?php  if (isset($_SESSION['USERS_NAME'])) : ?>
                                <a class="btn-popup" data-toggle="modal" data-target="#frofile">Welcome <strong> 
                                    <?php echo $_SESSION['USERS_NAME'];
                                    ?></strong></a>
                                <?php endif ?>
                                <!-- check nut login -->









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
                                                            <div class="signup-form-container ">
                                                                <form class="mb-0" method="post" action="home-map.php" >
                                                                    <?php include('errors.php'); ?>
                                                                    <a type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Facebook" class="btn btn--facebook btn--block"><i class="fa fa-facebook-square"></i>Login with Facebook</a>

                                                                    <div class="or-text">
                                                                        <span>or</span>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control" name="login-email" id="login-email" placeholder="Email Address">
                                                                        <span class="form-error" id="login-email-error-message">tets</span>
                                                                    </div>
                                                                    <!-- .form-group end -->
                                                                    <div class="form-group">
                                                                        <input type="password" class="form-control" name="login-password" id="login-password" placeholder="Password">
                                                                        <span class="form-error" id="login-Password-error-message">tets</span>
                                                                    </div>
                                                                    <!-- .form-group end -->
                                                                    <div class="input-checkbox">
                                                                        <label class="label-checkbox">
                                                                            <span>Remember Me</span>
                                                                            <input type="checkbox">
                                                                            <span class="check-indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                    <input type="submit" class="btn btn--primary btn--block" value="SignIn" name="SignIn" id= "SignIn">
                                                                    <a href="#" class="forget-password">Forget your password?</a>
                                                                </form>
                                                                <!-- form  end -->
                                                            </div>
                                                            <!-- .signup-form end -->
                                                        </div>
                                                        <div class="tab-pane" id="signup">

                                                            <form class="mb-0" method="post" action="home-map.php">
                                                                <?php include('errors.php'); ?>
                                                                <div class="or-text">
                                                                    <span>or</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="full-name"  id="full-name" placeholder="Full Name">
                                                                    <span class="form-error" id="full-name-error-message" value="<?php echo $USERS_NAME; ?>" >tets</span>
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" name="register-email" id="register-email"  placeholder="Email Address">
                                                                    <span class="form-error" id="email-error-message" value="<?php echo $email; ?>">tets</span>
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <!-- passs1 -->
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" name="register-password_1" id="register-password_1" placeholder="Password">
                                                                    <span class="form-error" id="Password-error-message">tets</span>
                                                                </div>
                                                                <!-- passs2 -->
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" name="register-password_2" id="register-password_2" placeholder="Password again" >
                                                                    <span class="form-error" id="Password-error-message-again">tets</span>
                                                                </div>


                                                                <!-- .form-group end -->
                                                                <div class="input-checkbox">
                                                                    <label class="label-checkbox">
                                                                        <span>I agree with all <a href="#">Terms & Conditions</a></span>
                                                                        <input type="checkbox">
                                                                        <span class="check-indicator"></span>
                                                                    </label>
                                                                </div>
                                                                <input type="submit" class="btn btn--primary btn--block" value="Register" name="Register" id ="Register" >
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
        <!-- Hero Search
            ============================================= -->
            <section id="heroSearch" class="hero-search mtop-100 pt-0 pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="slider--content">
                                <div class="text-center">
                                    <h1>Tìm nhà  cùng chúng tôi</h1>
                                </div>
                                <form class="mb-0">
                                    <div class="form-box search-properties">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <div class="select--box">
                                                        <i class="fa fa-angle-down"></i>
                                                        <select name="select-Province" id="select-Province">
                                                            <option value="">Tỉnh/Thành Phố</option>
                                                            <?php echo fill_Provider($conn); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .col-md-3 end -->
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <div class="select--box">
                                                        <i class="fa fa-angle-down"></i>
                                                        <select name="select-District" id="select-District">
                                                            <option value="">Quận/Huyện</option>
                                                            <?php echo fill_District($conn); ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .col-md-3 end -->
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <div class="select--box">
                                                        <i class="fa fa-angle-down"></i>
                                                        <select name="select-Ward" id="select-Ward">
                                                            <option value="">Phường/Xã</option>
                                                            <?php echo fill_Ward($conn); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .col-md-3 end -->
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <input type="submit" value="Search" name="submit" class="btn btn--primary btn--block">
                                            </div>
                                            <!-- .col-md-3 end -->
                                            <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                                <div class="form-group">
                                                    <div class="select--box">
                                                        <i class="fa fa-angle-down"></i>
                                                        <select name="select-type" id="select-type">
                                                            <option value="">Kiểu Chổ ở</option>
                                                            <?php echo fill_Tyle($conn); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .col-md-3 end -->
                                            <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                                <div class="form-group">
                                                    <div class="select--box">
                                                        <i class="fa fa-angle-down"></i>
                                                        <select name="select-Price" id="select-baths">
                                                            <option value="">Giá từ</option>
                                                            <option value="1">Dưới 1 triệu</option>
                                                            <option value="2">Dưới 3 triệu</option>
                                                            <option value="3">Dưới 5 triệu</option>
                                                            <option value="4">Trên 5 triệu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .col-md-3 end 
                                            <div class="col-xs-12 col-sm-6 col-md-6 option-hide">
                                                <div class="filter mb-30">
                                                    <p>
                                                        <label for="amount">Price Range: </label>
                                                        <input id="amount" type="text" class="amount" readonly>
                                                    </p>
                                                    <div class="slider-range"></div>
                                                </div>
                                            </div>
                                            .col-md-3 end -->
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <a class="less--options">More options</a>
                                            </div>
                                        </div>
                                        <!-- .row end -->
                                    </div>
                                    <!-- .form-box end -->
                                </form>
                            </div>
                        </div>
                        <!-- .container  end -->
                    </div>
                    <!-- .slider-text end -->
                </div>
                <div id="map"></div>
            </section>
            <!-- #property-single-slider end -->


        <!-- Feature
            ============================================= -->
            <section id="feature" class="feature feature-1 text-center bg-white pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="heading heading-2 text-center mb-70">
                                <h2 class="heading--title">Simple Steps</h2>
                                <p class="heading--desc">Duis aute irure dolor in reprehed in volupted velit esse dolore</p>
                            </div>
                            <!-- .heading-title end -->
                        </div>
                        <!-- .col-md-12 end -->
                    </div>
                    <!-- .row end -->
                    <div class="row">
                        <!-- feature Panel #1 -->
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="feature-panel">
                                <div class="feature--icon">
                                    <img src="image/5.png" alt="icon img">
                                </div>
                                <div class="feature--content">
                                    <h3>Search For Real Estates</h3>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eule pariate.</p>
                                </div>
                            </div>
                            <!-- .feature-panel end -->
                        </div>
                        <!-- .col-md-4 end -->
                        <!-- feature Panel #2 -->
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="feature-panel">
                                <div class="feature--icon">
                                    <img src="image/6.png" alt="icon img">
                                </div>
                                <div class="feature--content">
                                    <h3>Select Your Favorite</h3>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eule pariate.</p>
                                </div>
                            </div>
                            <!-- .feature-panel end -->
                        </div>
                        <!-- .col-md-4 end -->
                        <!-- feature Panel #3 -->
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="feature-panel">
                                <div class="feature--icon">
                                    <img src="image/7.png" alt="icon img">
                                </div>
                                <div class="feature--content">
                                    <h3>Take Your Key</h3>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eule pariate.</p>
                                </div>
                            </div>
                            <!-- .feature-panel end -->
                        </div>
                        <!-- .col-md-4 end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </section>
            <!-- .feature end -->


    <!-- Footer Scripts
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/js"></script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdd5CkT5Or59lPzUHISxleG_XO96X3-S8&callback=initMap">
    </script> 
</body>

</html>
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