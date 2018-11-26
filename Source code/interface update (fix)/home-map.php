
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


$redirectURL = "http://localhost/php/interface%20update%20(fix)/fb-callback.php";
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
        <link href="css/external_nhat.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style_nhat.css" rel="stylesheet">
        <link href="css/css_trunganh.css" rel="stylesheet">
        <script src="js/js.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!--icon facebook
        -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
  <![endif]-->
  
    <!-- Document Title
        ============================================= -->
        <title>Roomy</title>
    </head>
    <?php
    $username="root";
    $password="root";
    $database="qlphongtro";
    $query = "select ZONE_ID, ZONE_NAME, zone.ZONE_ADDRESS, MIN(room.ROOM_PRICE) AS min_price, MAX(room.ROOM_PRICE) AS max_price, zone.ZONE_LATITUDE, zone.ZONE_LOGITUDE, COUNT(room.ROOM_ID) AS soluong FROM zone INNER JOIN room on zone.ZONE_ID = room.ROOM_ZONE_ID WHERE room.ROOM_STATUS_ID = 1 ";

    if(isset($_GET['select-Province'])&&!empty($_GET['select-Province'])){
        $idProvince = (string)$_GET['select-Province'];
        $query .= " and ZONE_PROVINCE_ID = ". $idProvince;
        if(isset($_GET['select-District'])&&!empty($_GET['select-District'])){
            $idDistrict = (string)$_GET['select-District'];
            $query .= " and ZONE_DISTRICT_ID = ". $idDistrict;
            if (isset($_GET['select-Ward'])&&!empty($_GET['select-Ward'])) {
                $idWard = (string)$_GET['select-Ward'];
                $query .= " and ZONE_WARD_ID = ". $idWard;
            }
        }
    }
    if(isset($_GET['select-type'])&&!empty($_GET['select-type'])){
        $idType = (string)$_GET['select-type'];
        $query .= " and ROOM_TYPE_ID = ". $idType;
    }
    $query .=" GROUP BY room.ROOM_ZONE_ID";
    // require("phpsqlajax_dbinfo.php");

    function parseToXML($htmlStr)
    {
        $xmlStr=str_replace('<','&lt;',$htmlStr);
        $xmlStr=str_replace('>','&gt;',$xmlStr);
        $xmlStr=str_replace('"','&quot;',$xmlStr);
        $xmlStr=str_replace("'",'&#39;',$xmlStr);
        $xmlStr=str_replace("&",'&amp;',$xmlStr);
        return $xmlStr;
    }

    // Opens a connection to a MySQL server
    $connection=mysqli_connect ('localhost',"root","",$database);
    mysqli_set_charset($connection, 'utf8');
    if (!$connection) {
        die('Not connected : ' . mysqli_error());
    }


    // Select all the rows in the markers table

    $result = mysqli_query($connection,$query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error($connection));
    }

    // header("Content-type: text/xml");

    // Start XML file, echo parent node
    /*echo "<?xml version='1.0' ?>";*/
    echo '<zones>';
    $ind=0;
    // Iterate through the rows, printing XML nodes for each
    while ($row = @mysqli_fetch_assoc($result)){
        // Add to XML document node
        echo '<zone ';
        echo 'id="' . $row['ZONE_ID'] . '" ';
        echo 'name="' . parseToXML($row['ZONE_NAME']) . '" ';
        echo 'address="' . parseToXML($row['ZONE_ADDRESS']) . '" ';
        echo 'min_price="' . $row['min_price'] . '" ';
        echo 'max_price="' . $row['max_price'] . '" ';
        echo 'lat="' . $row['ZONE_LATITUDE'] . '" ';
        echo 'lng="' . $row['ZONE_LOGITUDE'] . '" ';
        echo 'count="' . $row['soluong'] . '" ';
        echo '/>';
        $ind = $ind + 1;
    }

    // End XML file
    echo '</zones>';
    if(isset($_GET['select-Province'])&&!empty($_GET['select-Province'])){
        $idProvince = (string)$_GET['select-Province'];
        $queryselect = " select province.PROVINCE_NAME ";
        $queryfrom = " FROM province ";
        $querywhere = "WHERE province.PROVINCE_ID = ".$idProvince;
        if(isset($_GET['select-District'])&&!empty($_GET['select-District'])){
            $idDistrict = (string)$_GET['select-District'];
            $queryselect .= ", district.DISTRICT_NAME ";
            $queryfrom .= " , district ";
            $querywhere .= " and DISTRICT_ID = ".$idDistrict;
            if (isset($_GET['select-Ward'])&&!empty($_GET['select-Ward'])) {
                $idWard = (string)$_GET['select-Ward'];
                $queryselect .= ", ward.WARD_NAME ";
                $queryfrom .= " , ward ";
                $querywhere .= " and WARD_ID = ". $idWard;
            }
        }
        $queryselect .= $queryfrom.$querywhere;
        $result = mysqli_query($connection,$queryselect);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($connection));
        }
        $row = @mysqli_fetch_assoc($result);
    }



    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            <?php
            if(isset($_GET['select-Province'])&&!empty($_GET['select-Province'])) {
                ?>
                $("#select-Province option").filter(function() {
                    return this.text == <?php echo json_encode($row['PROVINCE_NAME']);?>; 
                }).attr('selected', true);
                <?php
            }
            ?>
            <?php
            if(isset($_GET['select-District'])&&!empty($_GET['select-District'])) {
                ?>
                $("#select-District option").filter(function() {
                    return this.text == <?php echo json_encode($row['DISTRICT_NAME']);?>; 
                }).attr('selected', true);
                <?php
            }
            ?>
            <?php
            if(isset($_GET['select-Ward'])&&!empty($_GET['select-Ward'])) {
                ?>
                $("#select-Ward option").filter(function() {
                    return this.text == <?php echo json_encode($row['WARD_NAME']);?>; 
                }).attr('selected', true);
                <?php
            }
            ?>
            
        });
    </script>
    <body>
    <!-- Document Wrapper
        ============================================= -->
        <?php require_once('head.html') ?>
        <!-- Hero Search
            ============================================= -->
            <section id="heroSearch" class="hero-search mtop-100 pt-0 pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="slider--content">

                                <form class="mb-0">
                                    <div class="form-box search-properties">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <div class="select--box">
                                                        <i class="fa fa-angle-down"></i>
                                                        <select name="select-Province" id="select-Province">

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
        <script src="js/js.js"></script>
        <script src="js/jscheckvai.js"></script>
        
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVdRkvgs4_mrMS6VM2wU1x_Osd9In6K7E&callback=initMap">
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