<?php

$servername = "localhost";
$username = "root";
$password = "";
$databaseName="qlphongtro";

// Create connection
$conn = new mysqli($servername, $username, $password,$databaseName);
mysqli_set_charset($conn, 'UTF8');
function connect ($conn)
{
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
}
// cb tinh/thanh pho
function fill_Provider($conn)
{
	$output = '';
	$query = "SELECT * FROM PROVINCE";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{
		$output.='<option value="'.$row["PROVINCE_ID"].'">'.$row["PROVINCE_NAME"].'</option>';
	}
	return $output;
}
//cb quan huyen
function fill_District($conn)
{

	$output = '';
	$query = "SELECT * FROM district";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{
		$output.='<option value="'.$row["DISTRICT_ID"].'">'.$row["DISTRICT_NAME"].'</option>';
	}
	return $output;
}
// cb phuong/xa
function fill_Ward($conn)
{

	$output = '';
	$query = "SELECT * FROM ward";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{
		$output.='<option value="'.$row["WARD_ID"].'">'.$row["WARD_NAME"].'</option>';
	}
	return $output;
}
//selete style
function fill_Tyle($conn)
{

	$output = '';
	$query = "SELECT * FROM type";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{
		$output.='<option value="'.$row["TYPE_ID"].'">'.$row["TYPE_NAME"].'</option>';
	}
	return $output;
}
// deleta SESSION
function deleteSession($name){
	
	if(isset($_SESSION[$name]) )
    { 
      session_destroy();
       sunset($_SESSION[$name]);
	} 
    } 
	

?> 