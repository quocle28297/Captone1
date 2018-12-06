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

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/css_trunganh.css" rel="stylesheet">
    <link href="../css/external.css" rel="stylesheet">
    <!-- <link href="../css/style.css" rel="stylesheet"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
<?php require_once('connect.php'); ?>
    <div id="wrapper">

        <!-- Navigation -->  
        <?php require_once('head.html'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý khu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tổng số khu nhà 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                    
                            <?php 
                                $connect = new PDO('mysql:host=localhost;dbname=qlphongtro', 'root', '');
                                $connect->exec("set names utf8");

                                $query = "SELECT ZONE_ID,users.USERS_NAME, ZONE_NAME,ZONE_ADDRESS FROM zone, users where ZONE_USER_ID=users.USERS_ID";

                                $statement = $connect->prepare($query);
                                $statement -> execute();
                                $result = $statement -> fetchall();
                                $number_of_rows=$statement -> rowCount();
                                $output='';
                                $output .='
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Chi tiết</th>
                                        <th>Sr. No</th>
                                        <th>ID</th>
                                        <th>Tên zone</th>
                                        <th>Địa chỉ</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </thead>
                                ';
                                if($number_of_rows > 0)
                                {
                                    $count =0;
                                    foreach ($result as $row)
                                    {
                                        $count ++;

                                        $output .='
                                        <tbody>
                                        <tr>
                                        <td><form method="POST"
                                        action="management-room.php">
                                        <input type="submit" id="'.$row["ZONE_ID"].'"
                                        value="'.$row["ZONE_ID"].'" 
                                        name="detail-zone" 
                                        class="alert-box information">
                                        </form></td>
                                        <td>'.$count.'</td>
                                        <td>'.$row["ZONE_ID"].'</td>
                                        <td>'.$row["ZONE_NAME"].'</td>
                                        <td>'.$row["ZONE_ADDRESS"].'</td>
                                        <td><button type="button" class="alert-box delete" id_edit_zone="'.$row["ZONE_ID"].'" data-name="'.$row["ZONE_NAME"].'"   value="delete" ></button></td>

                                        </tr>
                                        <tbody>
                                        ';

                                    }
                                }
                                else 
                                {
                                    $output .='
                                    <tr>
                                    <td colspan="9" align = "center" style="color:black"> bạn chưa có khu nào </td>
                                    </tr>
                                    ';
                                }
                                $output .='</table>';
                                echo $output;
                            ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
