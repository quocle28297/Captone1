<?php  
$servername = "localhost";
$username = "root";
$password = "";
$databaseName="qlphongtro";

// Create connection
$conn = new mysqli($servername, $username, $password,$databaseName);
mysqli_set_charset($conn, 'UTF8');  
$output = '';  
if(isset($_POST["DISTRICT_ID"]))  
{  
  if($_POST["DISTRICT_ID"] != '')  
  {  
   $sql = "SELECT * FROM WARD WHERE WARD_DISTRICT_ID = '".$_POST["DISTRICT_ID"]."'";  
 }  
 else  
 {  
   $sql = "SELECT * FROM WARD";  
 }  
 $result = mysqli_query($conn, $sql);  
 $output='<option value="">Phường/Xã</option>';
 while($row = mysqli_fetch_array($result))  
 {  
   $output.='<option value="'.$row["WARD_ID"].'">'.$row["WARD_NAME"].'</option>';
 }  
 echo $output;  
}  
?>  