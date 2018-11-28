<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName="qlphongtro";

// Create connection
$conn = new mysqli($servername, $username, $password,$databaseName);
mysqli_set_charset($conn, 'UTF8');
if(isset($_POST["id-phong"])&& isset($_POST["date-s"]) && isset($_POST["date-e"]) && isset($_POST["gia"]))
    { 
      $id_phong = mysqli_real_escape_string($conn, $_POST["id-phong"]);  
      $date_s = mysqli_real_escape_string($conn, $_POST["date-s"]);  
      $date_e = mysqli_real_escape_string($conn, $_POST["date-e"]);  
      $gia = mysqli_real_escape_string($conn, $_POST["gia"]);  
     // $gia=get_number($gia);
      $query="
      UPDATE contract SET `CONTRACT_STARTDATE` = '2018-11-26', `CONTRACT_ENDDATE` = '2019-12-26', `CONTRACT_PRICE`='300000',`CONTRACT_STATUS`='2' WHERE `CONTRACT_ROOM_ID`='31543142445' 
      ";
      mysqli_query($conn, $query);
      // if () {
      //   thongbao('ok');
      // } else {
      //   thongbao('lỗi');
      //   // echo "lỗi: " . mysqli_error($conn);
      // }
    }
?>