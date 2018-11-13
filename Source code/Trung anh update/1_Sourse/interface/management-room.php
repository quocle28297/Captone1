<?php
if (isset($_GET['logout'])) {

    session_destroy();
    session_start(); 
    unset($_SESSION['userData']);
    unset($_SESSION['USERS_NAME']);
    unset($_SESSION['ID']);


    
}
?>
<?php include("fetch.php") ;?>
<?php require_once('server.php') ?>
<?php 
if (!isset($_SESSION['ID'])){
    header('Location: home-map.php');
    exit();
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />



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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></<script type="text/javascript"></script>t>
  <![endif]-->

    <!-- Document Title
        ============================================= -->


        <title>Roomy</title>


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
                                <?php  if (isset($_SESSION['ID'])) : ?>
                                    <li><a href="home-map.php?logout='1'"> Thoát </a></li>
                                <?php endif ?>
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
                        <?php echo $_SESSION['userData']['first_name']." ".$_SESSION['userData']['last_name'];
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

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    
    <div class="container">
        <div class="form-box">
           
            <h1 class="alert-box title"><?php echo getPostDetail_zone(); ?> </h1>
            <div class="table-responsive" id="zone_table" >

                <?php  load_table_room(); ?>
            </div>
            <a href="add-property.php" target="_blank" class="btn"><i class="fa fa-plus"></i> Thêm phòng</a>
        </div>
    </div>

</body></html>

<!--ajax load  bang  -->
<script >

    //click xoa
  $(document).on('click', '.delete', function(){
    var id_edit_room = $(this).attr("id_edit_room");
    
    if(confirm("Are you sure you want to remove it?"))
    {
        $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{id_edit_room:id_edit_room},
            success:function(data)
            {
                window.location.reload();
            }
        });
    }
  });  


</script>
