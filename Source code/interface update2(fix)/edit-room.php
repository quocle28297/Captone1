<?php include('data.php') ;?>


<?php require_once('server.php') ?>
<?php 
if (!isset($_SESSION['ID'])){
	header('Location: home-map.php');
	exit();
}
?>

<?php include('fetch.php') ;?>
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
                                    <!-- <span style="color:black;float:right;text-align:right;" style="submit" name="Edit-room" id="Edit-room">ID Room:&nbsp <?php echo get_Room($conn);?></span> -->

        <!-- <input  style="color:black;float:right;text-align:right;background-color: white;"  required="" name="Edit-room" maxlength="4" size="4" id="Edit-room" disabled  value="<?php echo get_Room($conn)?>"><span style="color:black;float:right;text-align:right;" style="submit" ">ID Room:&nbsp </span></input> 
            <div class="col-xs-12 col-sm-12 col-md-12"> -->

                <input style="color:black;float:right;text-align:right;" style="submit" name="id_Edit-room" id="id_Edit-room"  value="<?php echo get_Room($conn);?>" maxlength="20" size="20" readonly ><span style="color:black;float:right;text-align:right;" style="submit" ">ID Room:&nbsp </span>

                </div>

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
                            <input type="text" class="form-control" name="property-title" id="property-title" required="" value="<?php echo load_room_name($conn); ?>">

                        </div>
                    </div>
                    <!-- .col-md-12 end -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="property-description">Mô tả*</label>
                            <textarea class="form-control" name="property-description" id="property-description" rows="2"><?php echo load_description($conn) ?></textarea>
                        </div>
                    </div>
                    <!-- .col-md-12 end -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="select-type">Loại</label>
                            <div class="select--box">
                                <i class="fa fa-angle-down"></i>
                                <select name="select-type" id="select-type">

                                    <?php echo fill_Tyle_edit($conn); ?>

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
                                <select name="select-status" id="select-status">

                                    <?php echo fill_Status_edit($conn); ?>
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
                                <select name="select-zone" id="select-zone">
                                    <?php echo fill_zone_edit($conn); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- .col-md-4 end -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="Size">Diện tích m²</label>
                            <input type="text" class="form-control" name="Size" id="Size" placeholder="Đơn vị là m²" value="<?php echo load_area($conn);?>">
                        </div>
                    </div>
                    <!-- .col-md-4 end -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="Sale-Rent-Price">Giá*/Tháng</label>
                            <!-- onChange="format_curency(this);" --> 
                            <input type="text" class="form-control" name="Sale-Rent-Price" id="Sale-Rent-Price" placeholder="Giá tiền  trên một tháng" value="<?php echo load_price($conn);?>">
                        </div>
                    </div>
                    <!-- .=======phan dau==== -->
                    <!-- .col-md-4 end -->
                    <!-- .col-md-4 end -->
                    <!-- .col-md-4 end -->
                    <!--md-4 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .form-box end -->

            <div class="form-box">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h4 class="form--title">Ảnh:</h4>

                    </div>
                    <!-- .col-md-12 end -->
                    <div class="col-xs-12 col-sm-4 col-md-12">

                        <div class="table-responsive" id="zone_img" >

                            <?php  load_img_room(); ?>
                        </div>
                    </div>
                </div>
                <!-- .col-md-12 end -->

            </div>
            <!-- .row end -->

        </div>
        <!-- .form-box end -->


        <!-- .form-box end -->
        <div class="container">
            <input type="submit" id="save-edit-room" value="lưu thay đổi" name="save-edit-room"  class="btn btn--primary">
        </div>
    </form>
</div>
<!-- .col-md-12 end -->
</div>
<!-- .row end -->
</div>


<!-- .footer-copyright end -->
</footer>
</div>
<!-- #wrapper end -->

        <!-- Footer Scripts
            ============================================= -->

            <div class="container">
               <div class="footer--copyright text-center">
                <div class="row footer--bar">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <span>© 2018 bule team.</span>
                    </div>

                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </div>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/dropzone.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/jquery.gmap.min.js"></script>

    </body>
    </html>
    <script >
        function format_curency(a) {
          a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
      }
  </script>
  <div id="imageModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Image</h4>
              </div>
              <div class="modal-body">
                  <form id="image_form" method="post" enctype="multipart/form-data">
                      <p><label>Chọn Ảnh</label>
                          <input type="file" name="image" id="image" /></p><br />
                          <input type="hidden" name="action" id="action" value="insert" />
                          <input type="hidden" name="image_id" id="image_id" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />

                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                  </div>
              </div>
          </div>
      </div>
      <script>  
          $('#image_form').submit(function(event){
              event.preventDefault();
              var image_name = $('#image').val();
              if(image_name == '')
              {
               alert("Please Select Image");
               return false;
           }
           else
           {
               var extension = $('#image').val().split('.').pop().toLowerCase();
               if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
               {
                alert("Invalid Image File");
                $('#image').val('');
                return false;
            }
            else
            {
                $.ajax({
                 url:"data.php",
                 method:"POST",
                 data:new FormData(this),
                 contentType:false,
                 processData:false,
                 success:function(data)
                 {
                  location.reload();
              }
          });
            }
        }
    });
          $(document).on('click', '.edit', function(){
              $('#image_id').val($(this).attr("id"));
              $('#action').val("update");
              $('.modal-title').text("Cập nhật");
              $('#insert').val("Cập nhật");
              $('#imageModal').modal("show");
          });

      </script>  