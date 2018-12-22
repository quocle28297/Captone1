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
        
        <?php require_once('head.html') ?>


            
            <section id="add-property" class="add-property">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <form class="mb-0"  method="post" enctype="multipart/form-data"   >
                                <div class="form-box">
                                  <input style="color:black;float:right;text-align:right;" style="submit" name="id_zone_e" id="id_zone_e"  value="<?php echo id_zoone_E($conn);?>" maxlength="20" size="20" readonly ><span style="color:black;float:right;text-align:right;" style="submit" ">ID khu:&nbsp </span>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h4 class="form--title">Thêm Khu</h4>
                                            <?php include('errors.php'); ?>
                                            <?php include('statusMessage.php'); ?>
                                        </div>
                                        <!-- .col-md-12 end -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="zone-title">Tên zone</label>
                                                <input type="text" class="form-control" name="zone-title" id="zone-title" required="" value="<?php echo give_value_zone(); 
                                                      echo get_value_zone_E($db);
                                                 ?>">
                                            </div>
                                        </div>



                                        <!-- .col-md-12 end -->
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="select--box">
                                                <label for="address">Địa chỉ*</label>
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ cụ thể VD: số nhà, tên đường" required="" value="<?php echo give_value_address(); echo get_value_address_E($db);
                                                ?>">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <label for="address">Tỉnh/Thành Phố</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select class="form-control" name="select-Province"  id="select-Province">
                                                    
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
                     <input type="submit" id="edit-zone-f" value="Lưu" name="edit-zone-f"  class="btn btn--primary">
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
           
               <div class="footer--copyright text-center">
                <div class="container">
                    <div class="row footer--bar">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <span>© 2018 <a href=""></a> bule team.</span>
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