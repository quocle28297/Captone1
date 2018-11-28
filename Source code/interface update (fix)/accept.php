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
    <?php require_once('errors.php') ?>
    <?php require_once('statusMessage.php') ?>
    <br/><br/>      
    <div class="table-responsive"> 
      <?php   load_table_accept(); ?>
    </div>
    <div>
      <a href="add-zone.php" target="_blank" class="btn"><i class="fa fa-plus"></i> Thêm khu</a>
    </div> 
  </div>
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
                <label for="Size">Id Phòng: </label>  
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
                <input name="date-s" id="date-s" type="date" class="form-control"/>
                <!-- <span class="form-error" id="Name-error-message">...</span> -->
              </div> 
              <div class="form-group ">
                <label for="Size">Ngày kết thúc: </label>
                <input name="date-e" id="date-e" type="date" class="form-control"/>
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
    $('#imageModal').modal("show");
  }); 

</script>
--> -->