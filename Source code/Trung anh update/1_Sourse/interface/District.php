<?php  
$servername = "localhost";
$username = "root";
$password = "";
$databaseName="qlphongtro";

// Create connection
$conn = new mysqli($servername, $username, $password,$databaseName);
mysqli_set_charset($conn, 'UTF8');  
$output = '';  
if(isset($_POST["PROVINCE_ID"]))  
{  
  if($_POST["PROVINCE_ID"] != '')  
  {  
   $sql = "SELECT * FROM District WHERE DISTRICT_PROVINCE_ID = '".$_POST["PROVINCE_ID"]."'";  
 }  
 else  
 {  
   $sql = "SELECT * FROM District";  
 }  
 $result = mysqli_query($conn, $sql);  
 $output='<option value="">Quận/Huyện</option>';
 while($row = mysqli_fetch_array($result))  
 {  
   $output.='<option value="'.$row["DISTRICT_ID"].'">'.$row["DISTRICT_NAME"].'</option>';
 }  
 echo $output;  
}  
?>  