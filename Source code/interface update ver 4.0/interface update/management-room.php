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
<html dir="ltr" lang="en-US">
<head>
    <!--  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Real Estate html5 template">
    <link href="image/favicon.png" rel="icon">
    <!--  -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />   -->
    <link href="css/external.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <title>Roomy</title>
</head> 
<body>   
    <?php require_once('head.html') ?>
    <div class="container"> 
        <div class="form-box"> 

            <h1 align="center"><?php echo getPostDetail_zone(); ?></h1>  
            <?php laod_btn();?>
            <br />  
            <div class="table-responsive">  
               <?php  load_table_room2(); ?>
           </div>  
       </div>
   </div>
</div>
<!--  -->
<div class="container"> 
    <div class="footer--copyright text-center">
        <div class="row footer--bar">
            <span>© 2018 bule team.</span>
        </div>
    </div>
</div>
<script src="js/plugins.js"></script>   
<script src="js/dropzone.js"></script>
<script src="js/functions.js"></script>
</body>  
</html>  
<div id="message_set" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div>
                    <h5 class="modal-title">Các Đề nghị Đặt  phòng mới nhất</h5>
                    <?php  laod_notification()?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>  
 $(document).ready(function() {
    $('#room_data').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
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
     $(document).on('click','#set_room',function(){
        $('#message_set').modal("show");
    });
</script>  