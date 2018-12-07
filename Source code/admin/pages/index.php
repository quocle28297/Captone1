<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Roomy Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!--<link href="../vendor/morrisjs/morris.css" rel="stylesheet"> -->
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    
</head>

<body>
<!-- Thống kê -->
<?php 
    require_once('connect.php');
    $query = "SELECT status.STATUS_NAME as status,COUNT(*) as number from room,status where room.ROOM_STATUS_ID=status.STATUS_ID GROUP by room.ROOM_STATUS_ID";  
    $result = mysqli_query($mysqli, $query);

    $query1="SELECT role.ROLE_NAME as role,COUNT(*) as number from users,role where USERS_ROLE_ID=role.ROLE_ID and (ROLE_ID=2 OR ROLE_ID=3) GROUP by ROLE_ID";
    $result1=mysqli_query($mysqli,$query1);
?>
<script type="text/javascript">  
               google.charts.load('current', {'packages':['corechart']});  
               google.charts.setOnLoadCallback(drawChart);  
               function drawChart()  
               {  
                    var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php 
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
   
                    var options = {  
                          title: 'Tỷ lệ phòng còn trống và phòng đã cho thuê',  
                          //is3D:true,  
                          pieHole: 0.5  
                         };  
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                    chart.draw(data, options);  
               }  
</script> 

<?php
    $query1="SELECT role.ROLE_NAME as role,COUNT(*) as number from users,role where USERS_ROLE_ID=role.ROLE_ID and (ROLE_ID=2 OR ROLE_ID=3) GROUP by ROLE_ID";
    $result1=mysqli_query($mysqli,$query1);
?>

<!-- end Thong ke khu -->
<script type="text/javascript">  
               google.charts.load('current', {'packages':['corechart']});  
               google.charts.setOnLoadCallback(drawChart);  
               function drawChart()  
               {  
                    var data = google.visualization.arrayToDataTable([  
                          ['Role', 'Number'],  
                          <?php 
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["role"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
   
                    var options = {  
                          title: 'Tỷ lệ renter và Landlord',  
                          //is3D:true,  
                          pieHole: 0.5  
                         };  
                    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                    chart.draw(data, options);  
               }  
</script> 
<!-- end thong ke nguoi dung -->
    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('head.html') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            $sql="SELECT Count(*) FROM zone";
                                            $result=mysqli_query($mysqli,$sql);
                                            $row=mysqli_fetch_array($result);
                                            if (!$result){
                                                die ('Câu truy vấn bị sai');
                                            }
                                            else{ echo $row[0];}
                                        ?>
                                    </div>
                                    <div>Zone</div>
                                </div>
                            </div>
                        </div>
                        <a href="zonedetail.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            $sql="SELECT COUNT( DISTINCT USERS_ID) FROM users INNER JOIN zone on users.USERS_ID=zone.ZONE_USER_ID";
                                            $result=mysqli_query($mysqli,$sql);
                                            $row=mysqli_fetch_array($result);
                                            if (!$result){
                                                die ('Câu truy vấn bị sai');
                                            }
                                            else{ echo $row[0];}
                                        ?>
                                    </div>
                                    <div>Landlord</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                            $sql="SELECT COUNT(USERS_ID) FROM users where USERS_ROLE_ID=2";
                                            $result=mysqli_query($mysqli,$sql);
                                            $row=mysqli_fetch_array($result);
                                            if (!$result){
                                                die ('Câu truy vấn bị sai');
                                            }
                                            else{ echo $row[0];}
                                        ?>    

                                    </div>
                                    <div>New User</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>New Report</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ./row -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- bieeu do tron -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê Phòng
                        </div>
                        <div class="panel-body">
                            <div id="piechart" style="width: 485px; height: 300px"></div>  
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <!-- bieeu do tron -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê Người dùng
                        </div>
                        <div class="panel-body">
                            <div id="piechart1" style="width: 450px; height: 330px"></div>  
                            <a href="landlord.php" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row khu-->
            <!-- /.row nguoi dung -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <!--  <script src="../vendor/morrisjs/morris.min.js"></script>-->
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

