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
mysqli_set_charset($db, 'UTF8');

// REGISTER USER
if (isset($_POST['Register'])) {

  // receive all input values from the form
  $USERS_NAME = mysqli_real_escape_string($db, $_POST['full-name']);
  $email = mysqli_real_escape_string($db, $_POST['register-email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone-h']);
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
  if (count($errors) == 0 ) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (USERS_NAME, USERS_USERNAME, USERS_PASSWORD,USERS_PHONE) 
    VALUES(N'$USERS_NAME', '$email', '$password','$phone')";
    mysqli_query($db, $query);
    thongbao('Bạn đăng  ký tài khoản thành công  vui lòng đăng nhập');
    
    //header('location: index.php');
  }
}
//hien  thong bao
function thongbao($text)
{
  echo"<script>";       
  echo  "alert('$text');";
  echo "</script>";
  
}
//

//end Register
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
      thongbao('Bạn đăng nhập thành công');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
//select  room
if (isset($_POST['save'])) {
  $ROOM_NAME = mysqli_real_escape_string($db, $_POST['property-title']);
  $ROOM_PRICE = mysqli_real_escape_string($db, $_POST['Sale-Rent-Price']);
  $ROOM_DISCRIBE = mysqli_real_escape_string($db, $_POST['property-description']);
  $ROOM_ACREAGE  = mysqli_real_escape_string($db, $_POST['Size']);
  $ROOM_STATUS_ID = mysqli_real_escape_string($db, $_POST['select-status']);
  $ROOM_ZONE_ID = mysqli_real_escape_string($db, $_POST['select-zone']);
  $ROOM_TYPE_ID = mysqli_real_escape_string($db, $_POST['select-type']);
  $count ='false';

  if ($ROOM_TYPE_ID=="") {
    array_push($errors, "Bạn chưa chọn kiểu");
  }

  if ($ROOM_ZONE_ID=="") {
    array_push($errors, "Bạn chưa chọn khu");
  }
  if ($ROOM_STATUS_ID=="") {
    array_push($errors, "Bạn chưa chọn trình  trạng");
  }

  if (empty($ROOM_ACREAGE)) {
    array_push($errors, "Bạn chưa nhập diện tích");
  }
  if (empty($ROOM_ACREAGE)) {
    array_push($errors, "diện tích chỉ được nhập số");
  }

  if (empty($ROOM_NAME)) {
    array_push($errors, "Bạn chưa nhập tên phòng");
  }
  if ($ROOM_PRICE=="") {
    array_push($errors, "Bạn chưa nhập giá thuê");
  }
  if (empty($ROOM_PRICE)&&($ROOM_PRICE != 0)) {
    array_push($errors, "Bạn chưa nhập giá thuê");
  }
  if ((!is_numeric($ROOM_PRICE)) && (!empty($ROOM_PRICE))) {
    array_push($errors, "Giá chỉ được nhập số ");
  }
  if (empty($ROOM_DISCRIBE)) {
    array_push($errors, "Bạn Chưa nhập mô tả");
  }
  $ROOM_ID=$_SESSION['ID'].time();

  if(count(array_filter($_FILES['files']['name']))>5){
    array_push($errors, "Bạn  chọn nhiều  hơn 5 ảnh");
  }
  if(count(array_filter($_FILES['files']['name']))<1){
    array_push($errors, "Bạn  chưa chọn ảnh");
  }


  if (count($errors) == 0) 

  {
    $query = "INSERT INTO `room`(`ROOM_ID`,`ROOM_NAME`, `ROOM_PRICE`, `ROOM_DISCRIBE`, `ROOM_ACREAGE`, `ROOM_STATUS_ID`, `ROOM_ZONE_ID`, `ROOM_TYPE_ID`) VALUES ('$ROOM_ID',N'$ROOM_NAME','$ROOM_PRICE',N'$ROOM_DISCRIBE','$ROOM_ACREAGE','$ROOM_STATUS_ID','$ROOM_ZONE_ID','$ROOM_TYPE_ID')";
    $results = mysqli_query($db, $query);
    if($results)
    {
      $count ='true';
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
            $count='false';

          }

        }
        else
        {
          array_push($errors, "lỗi hình ảnh !!");
          $count='false';

        }
        if(!empty($errorMsg)){
          $count='true';
          //array_push($errors, "aaa".$errorMsg);
        }
        else
        {
         array_push($errors, 'file được chọn không phải ảnh hoặc ảnh quá lớn  !!');
         $count='false';
       }

     }

   }
 }

 //array_push($errors, $count);
 if($count == 'true'&& count($errors) == 0)
 {
   header('Location: management-zone.php?add-room-success');
 }
 if($count == 'false')
 {
   $query = "DELETE FROM `room` WHERE ROOM_ID='$ROOM_ID'";
   if (mysqli_query($db, $query)) {
    array_push($errors, "ok");
  } else {
    array_push($errors, "no". mysqli_error($db));
  }
}

}
//end create room
//get
function get_name_province($conn){
  if(isset($_POST['select-Province']))
  {
    $query = "SELECT PROVINCE_NAME FROM PROVINCE WHERE PROVINCE_ID='".$_POST['select-Province']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    return $row[0];

  }
}
function get_name_District($conn){
  if(isset($_POST['select-District']))
  {
    $query = "SELECT DISTRICT_NAME FROM district WHERE DISTRICT_ID='".$_POST['select-District']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    return $row[0];

  }
}
function get_name_Ward($conn){
  if(isset($_POST['select-District']))
  {
    $query = "SELECT WARD_NAME FROM ward WHERE WARD_ID='".$_POST['select-Ward']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    return $row[0];

  }
}
// get
// create zone
if (isset($_POST['save-zone'])) 
{
  $ZONE_NAME = mysqli_real_escape_string($db, $_POST['zone-title']);
  $ZONE_ADDRESS=mysqli_real_escape_string($db,$_POST['address']);
  $ZONE_PROVINCE_ID=mysqli_real_escape_string($db,$_POST['select-Province']);
  $ZONE_DISTRICT_ID=mysqli_real_escape_string($db,$_POST['select-District']);
  $ZONE_WARD_ID=mysqli_real_escape_string($db,$_POST['select-Ward']);
  $ZONE_PROVINCE_name=get_name_province($conn);
  $ZONE_DISTRICT_name=get_name_District($conn);
  $ZONE_WARD_name=get_name_Ward($conn);


  if (empty($ZONE_NAME)) {
    array_push($errors, "Bạn chưa nhập tên phòng");
  }
  if (empty($ZONE_ADDRESS)) {
    array_push($errors, "Bạn chưa nhập địa chỉ");
  }
  if ($ZONE_PROVINCE_ID=='') {
    array_push($errors, "Bạn Chưa chọn Tỉnh/Thành phố");
  }
  if ($ZONE_DISTRICT_ID=='') {
    array_push($errors, "Bạn Chưa chọn Quận/Huyện");
  }
  if ($ZONE_WARD_ID=='') {
    array_push($errors, "Bạn Chưa chọn Phường/Xã");
  }
  $a=$ZONE_ADDRESS.'+'.$ZONE_WARD_name.'+'.$ZONE_DISTRICT_name.'+'.$ZONE_PROVINCE_name;
  //array_push($errors, "$a");
  

  //array_push($errors, " $lat");
  //array_push($errors, " $lng");

  $zone_ueser_ID=$_SESSION['ID'];
  if (count($errors) == 0) 
  {
    $arr=getCoordinates($a);
    $lat=$arr[0];
    $lng=$arr[1];
    if (empty($lat)||empty($lng)) {
      array_push($errors, "Địa chỉ không tồn tại");
    }
    $query = "INSERT INTO `zone`
    (`ZONE_USER_ID`, `ZONE_NAME`, `ZONE_ADDRESS`,  `ZONE_WARD_ID`, `ZONE_DISTRICT_ID`, `ZONE_PROVINCE_ID`,`ZONE_LOGITUDE`,`ZONE_LATITUDE`)
    VALUES
    ('$zone_ueser_ID',N'$ZONE_NAME',N'$ZONE_ADDRESS','$ZONE_WARD_ID','$ZONE_DISTRICT_ID','$ZONE_PROVINCE_ID','$lng',' $lat')";
    $results = mysqli_query($db, $query);
    if($results)
    {
      array_push($statusMessage, "Bạn vừa thêm khu thành Công!!");
      header('Location:management-zone.php? ');
    }
    else
    {

      array_push($errors, "Bạn vừa thêm   khu thất  bại vui  lòng  nhập lại!!");

    }
  }

}
//end create zone
//edit zone
if (isset($_POST['edit-zone-f'])) 
{
  $ZONE_NAME = mysqli_real_escape_string($db, $_POST['zone-title']);
  $ZONE_ADDRESS=mysqli_real_escape_string($db,$_POST['address']);
  $ZONE_PROVINCE_ID=mysqli_real_escape_string($db,$_POST['select-Province']);
  $ZONE_DISTRICT_ID=mysqli_real_escape_string($db,$_POST['select-District']);
  $ZONE_WARD_ID=mysqli_real_escape_string($db,$_POST['select-Ward']);
  $id_zone=mysqli_real_escape_string($db,$_POST['id_zone_e']);
  $ZONE_PROVINCE_name=get_name_province($conn);
  $ZONE_DISTRICT_name=get_name_District($conn);
  $ZONE_WARD_name=get_name_Ward($conn);


  if (empty($ZONE_NAME)) {
    array_push($errors, "Bạn chưa nhập tên phòng");
  }
  if (empty($ZONE_ADDRESS)) {
    array_push($errors, "Bạn chưa nhập địa chỉ");
  }
  if ($ZONE_PROVINCE_ID=='') {
    array_push($errors, "Bạn Chưa chọn Tỉnh/Thành phố");
  }
  if ($ZONE_DISTRICT_ID=='') {
    array_push($errors, "Bạn Chưa chọn Quận/Huyện");
  }
  if ($ZONE_WARD_ID=='') {
    array_push($errors, "Bạn Chưa chọn Phường/Xã");
  }
  $a=$ZONE_ADDRESS.'+'.$ZONE_WARD_name.'+'.$ZONE_DISTRICT_name.'+'.$ZONE_PROVINCE_name;
  //array_push($errors, "$a");
  

  //array_push($errors, " $lat");
  //array_push($errors, " $lng");

  $zone_ueser_ID=$_SESSION['ID'];
  if (count($errors) == 0) 
  {
    $arr=getCoordinates($a);
    $lat=$arr[0];
    $lng=$arr[1];
    if (empty($lat)||empty($lng)) {
      array_push($errors, "Địa chỉ không tồn tại");
    }
    $query = "UPDATE `zone` SET
    `ZONE_NAME`=N'$ZONE_NAME', `ZONE_ADDRESS`=N'$ZONE_ADDRESS',
    `ZONE_WARD_ID`='$ZONE_WARD_ID',
    `ZONE_DISTRICT_ID`='$ZONE_DISTRICT_ID',
    `ZONE_PROVINCE_ID`='$ZONE_PROVINCE_ID',
    `ZONE_LOGITUDE`='$lng',
    `ZONE_LATITUDE`=' $lat'
    WHERE `ZONE_ID`='$id_zone'
    ";
    $results = mysqli_query($db, $query);
    if($results)
    {
     
     header('Location:management-zone.php?Editzone');
     thongbao('cập nhập thành công!!');
     array_push($statusMessage, "cập nhập thành công!!");
      //
   }
   else
   {

    array_push($errors, "cập nhập thất bại");

  }
}

}
if(isset($_GET['Editzone']))
{
  array_push($statusMessage, "cập nhập thành công!!");
}
//edit zone
// get kinh do vi do
function getCoordinates($address){
  $mapApiKey= 'AIzaSyBaEjohZpjSWkzIXQP0u01FZpZSe5Uxuhs';
  $address = urlencode($address);
  $url = "https://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" .$address ."&key=".$mapApiKey;
  $response = file_get_contents($url);
  $json = json_decode($response,true);
  $lat = $json['results'][0]['geometry']['location']['lat'];
  $lng = $json['results'][0]['geometry']['location']['lng'];

  return array($lat, $lng);
}
// get kinh do vi do

// notification success-zone
if(isset($_GET['message-zone']))
{
  array_push($statusMessage, "Bạn vừa thêm khu thành Công!!");
}

if(isset($_GET['message-editroom']))
{
  array_push($statusMessage, "Bạn cập nhật phòng thành công !!");
}

if(isset($_GET['error-image']))
{
  array_push($statusMessage, "Bạn tạo phòng  thành công !!");
  array_push($errors,"Lưu ảnh  bị  lỗi  vui  lòng cập nhập lại ảnh ");
}
if(isset($_GET['add-room-success']))
{
  array_push($statusMessage, "Bạn vừa thêm phòng thành Công!!");
}

//giu  lai text  khi submit
function give_name_room()
{
  if(isset($_POST['property-title']))
  {

    return $_POST['property-title'];
  }
}
//giu lai dien tich
function give_value_area()
{
  if(isset($_POST['Size']))
  {

    return $_POST['Size'];
  }
}
//giu lai gia
function give_value_price()
{
  if(isset($_POST['Sale-Rent-Price']))
  {

    return $_POST['Sale-Rent-Price'];
  }
}
//giu lai noi dung
function give_value_description()
{
  if(isset($_POST['property-description']))
  {

    return $_POST['property-description'];
  }
}
//giu lai noi dung
function give_value_zone()
{
  if(isset($_POST['zone-title']))
  {

    return $_POST['zone-title'];
  }
}
//lay data --edit zone
function get_value_zone_E($db)
{
  if(isset($_POST['Edit-zone']))
  {
    $id = $_POST['Edit-zone'];
    $query="
    SELECT `ZONE_NAME`  from zone WHERE ZONE_ID = $id
    ";
    $result=  $results = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    return $row[0];
  }
}

function get_value_address_E($db)
{
  if(isset($_POST['Edit-zone']))
  {
    $id = $_POST['Edit-zone'];
    $query="
    SELECT `ZONE_ADDRESS`  from zone WHERE ZONE_ID = $id
    ";
    $result=  $results = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    return $row[0];
  }
}
//-- edit zone
function give_value_address()
{
  if(isset($_POST['address']))
  {

    return $_POST['address'];
  }
}
// save  update


if(isset($_POST['save-edit-room']))
{
  $ROOM_NAME = mysqli_real_escape_string($db, $_POST['property-title']);
  $ROOM_PRICE = mysqli_real_escape_string($db, $_POST['Sale-Rent-Price']);
  $ROOM_DISCRIBE = mysqli_real_escape_string($db, $_POST['property-description']);
  $ROOM_ACREAGE  = mysqli_real_escape_string($db, $_POST['Size']);
  $ROOM_STATUS_ID = mysqli_real_escape_string($db, $_POST['select-status']);
  $ROOM_ZONE_ID = mysqli_real_escape_string($db, $_POST['select-zone']);
  $ROOM_TYPE_ID = mysqli_real_escape_string($db, $_POST['select-type']);
  $count =0;

  if ($ROOM_TYPE_ID=="") {
    array_push($errors, "Bạn chưa chọn kiểu");
  }

  if ($ROOM_ZONE_ID=="") {
    array_push($errors, "Bạn chưa chọn khu");
  }
  if ($ROOM_STATUS_ID=="") {
    array_push($errors, "Bạn chưa chọn trình  trạng");
  }

  if (empty($ROOM_ACREAGE)) {
    array_push($errors, "Bạn chưa nhập diện tích");
  }
  if (empty($ROOM_ACREAGE)) {
    array_push($errors, "diện tích chỉ được nhập số");
  }

  if (empty($ROOM_NAME)) {
    array_push($errors, "Bạn chưa nhập tên phòng");
  }
  if ($ROOM_PRICE=="") {
    array_push($errors, "Bạn chưa nhập giá thuê");
  }
  if (empty($ROOM_PRICE)&&($ROOM_PRICE != 0)) {
    array_push($errors, "Bạn chưa nhập giá thuê");
  }
  if ((!is_numeric($ROOM_PRICE)) && (!empty($ROOM_PRICE))) {
    array_push($errors, "Giá chỉ được nhập số ");
  }
  if (empty($ROOM_DISCRIBE)) {
    array_push($errors, "Bạn Chưa nhập mô tả");
  }
  $ROOM_ID=$_POST['id_Edit-room'];

  if (count($errors) == 0) 

  {
    $query = "UPDATE `room` SET `ROOM_NAME`=N'$ROOM_NAME',`ROOM_PRICE`='$ROOM_PRICE',`ROOM_DISCRIBE`=N'$ROOM_DISCRIBE',`ROOM_ACREAGE`='$ROOM_ACREAGE',`ROOM_STATUS_ID`='$ROOM_STATUS_ID',`ROOM_ZONE_ID`='$ROOM_ZONE_ID',`ROOM_TYPE_ID`='$ROOM_TYPE_ID'WHERE  `ROOM_ID`= '$ROOM_ID' ";
    $results = mysqli_query($db, $query);
    if($results)
    {
      $count ++;
    }
    else
    {

      array_push($errors, "Bạn cập nhật phòng thất  bại vui  lòng  nhập lại!!");

    }
  }
  if (count($errors) == 0 && !empty('file')) 
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
          header('Location: management-zone.php?message-editroom');        }
          else
          {
           array_push($errors, 'file được chọn không phải ảnh hoặc ảnh quá lớn bạn lui  lòng vào phần cập nhập để cập nhập lại ảnh xin cảm ơn!!');
         }

       }
     }

   }
   if($count ==1 )
   {
    header('Location: management-zone.php?message-editroom');

  }
}

?>