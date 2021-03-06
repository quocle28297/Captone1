<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

// initializing variables
$USERS_NAME = "";
$email    = "";
$errors = array(); 
$statusMessage=array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'qlphongtro');

// REGISTER USER
if (isset($_POST['Register'])) {

  // receive all input values from the form
  $USERS_NAME = mysqli_real_escape_string($db, $_POST['full-name']);
  $email = mysqli_real_escape_string($db, $_POST['register-email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['register-password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['register-password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($USERS_NAME)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
   array_push($errors, "The two passwords do not match");
 }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
 $user_check_query = "SELECT * FROM users WHERE USERS_USERNAME='$email' LIMIT 1";
 $result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['USERS_USERNAME'] === $email) {
      array_push($errors, "Email đã tồn tại");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (USERS_NAME, USERS_USERNAME, USERS_PASSWORD) 
   VALUES(N'$USERS_NAME', '$email', '$password')";
   mysqli_query($db, $query);
   $_SESSION['USERS_NAME'] = $USERS_NAME;
   $_SESSION['success'] = "You are now logged in";

  	//header('location: index.php');
 }
}


if (isset($_POST['SignIn'])) {
  $username = mysqli_real_escape_string($db, $_POST['login-email']);
  $password = mysqli_real_escape_string($db, $_POST['login-password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE USERS_USERNAME='$username' AND USERS_PASSWORD='$password'";

    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_array($results);
      $_SESSION['ID'] = $row["USERS_ID"];
      $_SESSION['USERS_NAME'] = $row["USERS_NAME"];  
      $_SESSION['success'] = "You are now logged in";
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
if (isset($_POST['save'])) {
  $ROOM_NAME = mysqli_real_escape_string($db, $_POST['property-title']);
  $ROOM_PRICE = mysqli_real_escape_string($db, $_POST['Sale-Rent-Price']);
  $ROOM_DISCRIBE = mysqli_real_escape_string($db, $_POST['property-description']);
  $ROOM_ACREAGE  = mysqli_real_escape_string($db, $_POST['Size']);
  $ROOM_STATUS_ID = mysqli_real_escape_string($db, $_POST['select-status']);
  $ROOM_ZONE_ID = mysqli_real_escape_string($db, $_POST['select-zone']);
  $ROOM_TYPE_ID = mysqli_real_escape_string($db, $_POST['select-type']);
  if (empty($ROOM_NAME)) {
    array_push($errors, "Bạn chưa nhập tên phòng");
  }
  if (empty($ROOM_PRICE)) {
    array_push($errors, "Bạn chưa nhập giá thuê");
  }
  if (empty($ROOM_DISCRIBE)) {
    array_push($errors, "Bạn Chưa nhập mô tả");
  }
  $ROOM_ID=$_SESSION['ID'].time();

  if(count(array_filter($_FILES['files']['name']))>5){
    array_push($errors, "Bạn  chọn nhiều  hơn 5 ảnh");
  }


  if (count($errors) == 0) 

  {
    $query = "INSERT INTO `room`(`ROOM_ID`,`ROOM_NAME`, `ROOM_PRICE`, `ROOM_DISCRIBE`, `ROOM_ACREAGE`, `ROOM_STATUS_ID`, `ROOM_ZONE_ID`, `ROOM_TYPE_ID`) VALUES ('$ROOM_ID',N'$ROOM_NAME','$ROOM_PRICE',N'$ROOM_DISCRIBE','$ROOM_ACREAGE','$ROOM_STATUS_ID','$ROOM_ZONE_ID','$ROOM_TYPE_ID')";
    $results = mysqli_query($db, $query);
    if($results)
    {
      array_push($statusMessage, "Bạn vừa thêm phòng thành Công!!");
    }
    else
    {

      array_push($errors, "Bạn vừa thêm  phòng thất  bại vui  lòng  nhập lại!!");

    }
  }
  if (count($errors) == 0) 
  {
    $targetDir = "uploads/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['files']['name']))){
      foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
        $fileName = basename($_FILES['files']['name'][$key]);
        $fileName = time().'-'.$fileName;
        $fileName = $_SESSION['ID'].'-'.$fileName;
        $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
          if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
            $insertValuesSQL = $fileName;
          }else{
            $errorUpload .= $_FILES['files']['name'][$key].', ';
          }
        }else{
          $errorUploadType .= $_FILES['files']['name'][$key].', ';
        }

        if(!empty($insertValuesSQL))
        {
          $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
      //$insertValuesSQL=time().$insertValuesSQL;
          $insert = $db->query("INSERT INTO image (IMAGE_NAME, IMAGE_ROOM_ID) VALUES ('$insertValuesSQL','$ROOM_ID')");
          if($insert)
          {
            $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
          }
          else
          {
            array_push($errors, "Đã có lỗi xảy ra  khi  đưa ảnh  lên.!!");
          }

        }
        else
        {
          array_push($errors, "Bạn chưa nhập ảnh !!");
        }
        if(!empty($errorMsg)){
          array_push($statusMessage, "Tải ảnh lên thành công.!!");
          header('Location: Message.php');
        }
        else
        {
         array_push($errors, 'file được chọn không phải ảnh hoặc ảnh quá lớn bạn lui  lòng vào phần cập nhập để cập nhập lại ảnh xin cảm ơn!!');
       }

     }

   }


 }

}

