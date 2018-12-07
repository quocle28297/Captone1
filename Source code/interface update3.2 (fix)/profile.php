<?php include('data.php') ;?>


<?php require_once('server.php') ?>

<?php include('fetch.php') ;?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
  <style type="text/css">.gm-err-container{height:100%;width:100%;display:table;background-color:#e0e0e0;position:relative;left:0;top:0}.gm-err-content{border-radius:1px;padding-top:0;padding-left:10%;padding-right:10%;position:static;vertical-align:middle;display:table-cell}.gm-err-content a{color:#4285f4}.gm-err-icon{text-align:center}.gm-err-title{margin:5px;margin-bottom:20px;color:#616161;font-family:Roboto,Arial,sans-serif;text-align:center;font-size:24px}.gm-err-message{margin:5px;color:#757575;font-family:Roboto,Arial,sans-serif;text-align:center;font-size:12px}.gm-err-autocomplete{padding-left:20px;background-repeat:no-repeat;background-size:15px 15px}
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
</head>

<body>
  <?php require_once('head.html') ?>
  <div class="container ">
   <form class="mb-0"  method="get" enctype="multipart/form-data">
    <div class="form-box ">
      <input style="color:black;float:right;text-align:right;" style="submit" name="profile" id="profile" 
      value="<?php echo getid_f($conn); ?>" maxlength="20" size="5" readonly >
      <span style="color:black;float:right;text-align:right;" style="submit" ">ID :&nbsp </span>
      <div class="row ">	
        <div class="center ">
          <h4>Thông tin cá nhân</h4>
          <!-- tên -->
          <div class="col-xs-12 col-sm-4 col-md-4">

            <div class="form-group ">
              <label for="Size">Tên bạn: </label>  <span class="form-error" id="Name-error-message">...</span>
              <input type="text" class="form-control" name="name-f" 
              id="name-f" placeholder="Tên của bạn ..." value="<?php echo getname_f($conn);?>" maxlength="25">
            </div>  
          </div>


          <!-- end ten -->  
          <!-- SDT -->
          <br/> <br/><br/><br/><br/>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group ">
              <label for="Size">Số điện  thoại: </label><span class="form-error" id="phone-error-message">...</span>
              <input type="text" class="form-control" name="phone-f" 
              id="phone-f" placeholder="Nhập số điện thoại của bạn" value="<?php echo getphone_f($conn);?>"  maxlength="25">
            </div>  

          </div>

          <!-- SDT -->  
          <!-- SDT -->
          <br/> <br/><br/><br/><br/>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group ">
              <label for="Size">Gmail: </label>
              <input type="text" class="form-control" name="Gmail" 
              id="Gmail" placeholder="Đại chỉ Gmail của bạn" value="<?php echo getgmail_f($conn);?>" maxlength="25" readonly>
            </div>  
          </div>
          <!-- SDT -->  
          <!-- btn -->
          <br/> <br/><br/><br/><br/>
          <?php
          if(isset($_GET['profile']))
          {
            if($_GET['profile'] == $_SESSION['ID']){
              $output='';
              echo $output.='
              <div class="container">
              <input type="submit" id="save-f" value="lưu" name="save-f"  class="btn btn--primary">
              </div>';
            }
          }
          ?>
          <!-- btn -->
        </form>
      </div>               
    </div>
  </div>
  <form class="mb-0"  method="post" enctype="multipart/form-data" id="insert_change_pass" >
    <div class="form-box ">
      <input style="color:black;float:right;text-align:right;" style="submit" name="profile" id="profile" 
      value="<?php echo getid_f($conn); ?>" maxlength="20" size="5" readonly >
      <span style="color:black;float:right;text-align:right;" style="submit" ">ID :&nbsp </span>
      <div class="row ">  
        <div class="center ">
          <h4>Đổi mật khẩu</h4>
          <div class="col-xs-12 col-sm-4 col-md-4">

            <div class="form-group ">
              <label for="Size">Mật Khẩu Hiện Tại </label>
              <input type="password" class="form-control" name="old_pass" 
              id="old_pass" placeholder="Mật Khẩu Hiện tại ..." maxlength="25">
            </div>  
          </div>
          <br/> <br/><br/><br/><br/>

          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group ">
              <label for="Size">Mật Khẩu Khẩu mới  </label>
              <input type="password" class="form-control" name="new_pass" 
              id="new_pass" placeholder="Mật Khẩu Mới ..." maxlength="25">
            </div>  
          </div>
          <br/> <br/><br/><br/><br/>

          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group ">
              <label for="Size">Xác Nhận Mật Khẩu mới</label>
              <input type="password" class="form-control" name="new_pass2" 
              id="new_pass2" placeholder="Xác nhận..." maxlength="25">
            </div>  
          </div>
          <br/> <br/><br/><br/><br/>
          <div class="container">
            <input type="submit" id="change_pass" value="Đổi Mật Khẩu" name="change_pass"  class="btn btn--primary">
          </div>

          <!-- btn -->
        </form>
      </div>               
    </div>
  </div>

  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/dropzone.js"></script>
  <script src="js/functions.js"></script>
  <script src="js/jquery.gmap.min.js"></script>
  <script src="js/jscheckvai.js"></script>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function()
  {
   $('#insert_change_pass').on("submit", function(event)
   {  
    event.preventDefault();  
    if($('#old_pass').val() == "")  
    {  
     alert("Chưa nhập mật khẩu cũ");  
   }  
   else if($('#new_pass').val() == "")  
   {
    alert("Chưa nhập mật khẩu mới"); 
  }
  else if($('#new_pass2').val()=="")
  {
    alert("Chưa xác nhận mật khẩu mới"); 
  }
  else if($('#new_pass').val()!=$('#new_pass2').val() )
  {
    alert("Mật khẩu nhập lại không giống nhau"); 
  }
  else  
  {  
   $.ajax(
   {  
    url:"data.php",  
    method:"POST",  
    data:$('#insert_change_pass').serialize(),  
    beforeSend:function()
    {  
     $('#change_pass').val("Lưu");  
   },  
   success:function(data)
   { 
   alert(data);
    //location.reload();
  }  
});  
 }  
});
 });
  
</script>

