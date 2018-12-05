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
    <form action="history_rent.php" method="post" target="_blank">
      <input id="id_roon_h" name="id_roon_h"  value="<?php echo $_POST['detail-room'];?>" type="text" readonly="" />
      <script type="text/javascript">
       $("#id_roon_h").hide();
     </script>
     <input class="btn" type="submit" value="Lịch Sử" />
   </form>
   <?php require_once('errors.php') ?>
   <?php require_once('statusMessage.php') ?>
   <br/><br/>         
   <?php   check_room_free(); ?>  
 </div>

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
<div id="imageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div>
          <h4 class="modal-title">Xác Nhận thông tin</h4>
        </div>

        <div class="modal-body">
          <form id="insert_acc" method="post>
            <div class="row ">
              <p><label></label></p>
              <div class="form-group ">
                <label for="Size">ID Người Thuê: </label>  
                <input type="text" class="form-control" name="ID_tenant" 
                id="ID_tenant"   maxlength="25">
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
              <div class="form-group ">
                <label for="Size">ID Phòng: </label>  
                <input type="text" class="form-control" name="id-phong" 
                id="id-phong"   maxlength="25">
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
              <div class="form-group ">
                <label for="Size">Giá tiền: </label>  
                <input type="text" class="form-control" name="gia" 
                id="gia" placeholder="Giá Thuê 1 tháng"  maxlength="25">
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div>  
              <div class="form-group ">
                <label for="Size">Ngày Bắt Đầu: </label>
                <input name="date-s" id="date-s" type="date" class="form-control" min="<?php echo date('Y-m-d', strtotime('-10 years'));?>" max="<?php echo date('Y-m-d', strtotime('+15 years'));?>"/>
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
              <div class="form-group ">
                <label for="Size">Ngày kết thúc: </label>
                <input name="date-e" id="date-e" type="date" class="form-control" min="<?php echo date('Y-m-d', strtotime('-10 years'));?>" max="<?php echo date('Y-m-d', strtotime('+15 years'));?>"/>
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
            </div>  
          </div>

          <input type="submit" name="insert" id="insert" value="Đồng ý" class="alert-box accept" />
          <div class="modal-footer">
          </form>

          <button type="button" class="alert-box cancel" data-dismiss="modal">Thoát</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- kết thúc sớm -->
<div id="end_early" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div>
          <h4 class="modal-title">Xác Nhận thông tin</h4>
        </div>

        <div class="modal-body">
          <form id="insert_end" method="post>
            <div class="row ">
              <p><label></label></p>
              <div class="form-group ">
                <label for="Size">ID Người Thuê: </label>  
                <input type="text" class="form-control" name="ID_tenant-e" 
                id="ID_tenant-e"   maxlength="25" readonly="">
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
              <div class="form-group ">
                <label for="Size">ID Phòng: </label>  
                <input type="text" class="form-control" name="id-phong-e" 
                id="id-phong-e"   maxlength="25" readonly="">
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
              <div class="form-group ">
                <label for="Size">Tổng tiền nhận đc </label>  
                <input type="text" class="form-control" name="gia-e" 
                id="gia-e" placeholder="Giá Thuê 1 tháng"  maxlength="25">
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div>  
              <div class="form-group ">
                <label for="Size">Ngày kết thúc: </label>
                <input name="date-e-e" id="date-e-e" type="date" class="form-control" data-date-format="dd/mm/yyyy" min="<?php echo date('Y-m-d', strtotime('-10 years'));?>"
                max="<?php echo date("Y-m-d");?>"/>
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
            </div>  
          </div>

          <input type="submit" name="insert-e" id="insert-e" value="Đồng ý" class="alert-box accept" />
          <div class="modal-footer">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--  -->
<script >


  $(document).ready(function()
  {
   $('#insert_acc').on("submit", function(event)
   {  
    event.preventDefault();  
    if($('#gia').val() == "")  
    {  
     alert("Chưa nhập giá");  
   }  

   else  
   {  
     $.ajax(
     {  
      url:"data.php",  
      method:"POST",  
      data:$('#insert_acc').serialize(),  
      beforeSend:function()
      {  
       $('#insert').val("Đồng ý");  
     },  
     success:function(data)
     {  
      location.reload();
    }  
  });  
   }  
 });
 });

  $(document).on('click', '.success', function(){
    $('#id-phong').val($(this).attr("id"));
    $('#date-s').val($(this).attr("date-s"));
    $('#date-e').val($(this).attr("date-e"));
    $('#gia').val($(this).attr("gia"));
    $('#ID_tenant').val($(this).attr("ID_tenant"));
    $('#imageModal').modal("show");
  }); 
   //click xoa
   $(document).on('click', '.delete', function(){
    var id_delete_f = $(this).attr("id_delete_f");
    var id_tenant_f = $(this).attr("ID_tenant_f");

    if(confirm("Bạn chắc chắn  muốn xóa"))
    {
      $.ajax({
        url:"data.php",
        method:"POST",
        data:{id_delete_f:id_delete_f,
          id_tenant_f:id_tenant_f
        },
        success:function(data)
        {
          window.location.reload();      
          alert('Xóa đề  nghị  thành công');
        }
      });
    }
  });  

   $(document).on('click', '#id_end', function(){
    $('#id-phong-e').val($(this).attr("id_end_room"));
    $('#ID_tenant-e').val($(this).attr("ID_tenant_e"));
    $('#gia-e').val($(this).attr("gia_e"));
    $('#date-e-e').val($(this).attr("date"));
    //$('#date-e-e').val($(this).attr("date_e_e"));
    $('#end_early').modal("show");
  }); 


   $(document).ready(function()
   {
     $('#insert_end').on("submit", function(event)
     {  
      event.preventDefault();  
      if($('#gia-e').val() == "")  
      {  
       alert("Chưa nhập giá");  
     }  
     else if($('#date-e-e').val()=="")
     {
      alert("Ngày kết thúc trống"); 
    }
    else  
    {  
     $.ajax(
     {  
      url:"data.php",  
      method:"POST",  
      data:$('#insert_end').serialize(),  
      beforeSend:function()
      {  
       $('#insert-e').val("Đồng ý");  
     },  
     success:function(data)
     {  
      location.reload();
    }  
  });  
   }  
 });
   });


 </script>
