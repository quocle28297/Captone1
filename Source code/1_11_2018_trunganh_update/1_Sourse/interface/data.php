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

	$output = '<option value="">Tỉnh/Thành Phố</option>';
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

	$output = '<option value="">Quận/Huyện</option>';
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

	$output = '<option value="">Phường/Xã</option>';
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

	$output = '<option value="">Kiểu Chổ ở</option>';
	$query = "SELECT * FROM type";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{
		$output.='<option value="'.$row["TYPE_ID"].'">'.$row["TYPE_NAME"].'</option>';
	}
	return $output;
}
function fill_Tyle_edit($conn)
{
	
// select 
	$edit_room_id=$_POST['Edit-room'];
	$query1 = "SELECT * FROM room where ROOM_ID= $edit_room_id ";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_array($result1)) 
	{
		$type_of_id=$row["ROOM_TYPE_ID"];
	}
//
	$output = '<option value="">Kiểu Chổ ở</option>';
	$query = "SELECT * FROM type";
	$result = mysqli_query($conn,$query);
	
	if(isset($_POST['Edit-room'])){
		while($row = mysqli_fetch_array($result)) 
		{
			if($row["TYPE_ID"] == $type_of_id)
			{
				$output.='<option value="'.$row["TYPE_ID"].'" selected="">'.$row["TYPE_NAME"].'</option>';
			}
			else
			{
				$output.='<option value="'.$row["TYPE_ID"].'">'.$row["TYPE_NAME"].'</option>';
			}
		}
	}
	return $output;
}
//end fill tyle
// deleta SESSION
function deleteSession($name){
	
	if(isset($_SESSION[$name]) )
	{ 
		session_destroy();
		sunset($_SESSION[$name]);
	} 
} 
//--
// chon status
function fill_Status($conn)
{

	$output = '';
	$query = "SELECT * FROM status";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{
		$output.='<option value="'.$row["STATUS_ID"].'">'.$row["STATUS_NAME"].'</option>';
	}
	return $output;
}

function fill_Status_edit($conn)
{
	
// select 
	$edit_room_id=$_POST['Edit-room'];
	$query1 = "SELECT * FROM room where ROOM_ID= $edit_room_id ";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_array($result1)) 
	{
		$status_of_id=$row["ROOM_STATUS_ID"];
	}
//
	$output = '<option value="">Tình Trạng</option>';
	$query = "SELECT * FROM status";
	$result = mysqli_query($conn,$query);
	
	if(isset($_POST['Edit-room'])){
		while($row = mysqli_fetch_array($result)) 
		{
			if($row["STATUS_ID"] == $status_of_id)
			{
				$output.='<option value="'.$row["STATUS_ID"].'" selected="">'.$row["STATUS_NAME"].'</option>';
			}
			else
			{
				$output.='<option value="'.$row["STATUS_ID"].'">'.$row["STATUS_NAME"].'</option>';
			}
		}
	}
	return $output;
}
// End fill status
// select fill zone combobox 
function fill_zone($conn)
{
	$SessionID = $_SESSION['ID'];
	$output = '';
	$query = "SELECT * FROM zone where ZONE_USER_ID = '$SessionID'";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{
		$output.='<option value="'.$row["ZONE_ID"].'">'.$row["ZONE_NAME"].'</option>';
	}
	return $output;
}
//--
function fill_zone_edit($conn)
{
	
// select 
	$edit_room_id=$_POST['Edit-room'];
	$query1 = "SELECT * FROM room where ROOM_ID= $edit_room_id ";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_array($result1)) 
	{
		$zone_of_id=$row["ROOM_ZONE_ID"];
	}
//
	$output = '<option value="">Khu</option>s';
	$query = "SELECT * FROM zone";
	$result = mysqli_query($conn,$query);
	
	if(isset($_POST['Edit-room'])){
		while($row = mysqli_fetch_array($result)) 
		{
			if($row["ZONE_ID"] == $zone_of_id)
			{
				$output.='<option value="'.$row["ZONE_ID"].'" selected="">'.$row["ZONE_NAME"].'</option>';
			}
			else
			{
				$output.='<option value="'.$row["ZONE_ID"].'">'.$row["ZONE_NAME"].'</option>';
			}
		}
	}
	return $output;
}
// end fill zone
//load  name room
function load_room_name($conn)
{
	$output='';
	$edit_room_id=$_POST['Edit-room'];
	
	$query1 = "SELECT * FROM room where ROOM_ID= $edit_room_id ";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_array($result1)) 
	{
		
		$output=$row["ROOM_NAME"];
	}
	return $output;
}
//laod description
function load_description($conn)
{
	
	$edit_room_id = $_POST['Edit-room'];

	$query1="SELECT *FROM room where ROOM_ID=$edit_room_id";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_array($result1))
	{
		$output = $row["ROOM_DISCRIBE"];
	}
	return $output;
}
//load area
function load_area($conn)
{
	
	$edit_room_id = $_POST['Edit-room'];

	$query1="SELECT *FROM room where ROOM_ID=$edit_room_id";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_array($result1))
	{
		$output = $row["ROOM_ACREAGE"];
	}
	return $output;
}
//laod   price
function load_price($conn)
{
	
	$edit_room_id = $_POST['Edit-room'];

	$query1="SELECT *FROM room where ROOM_ID=$edit_room_id";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_array($result1))
	{
		$output = $row["ROOM_PRICE"];
	}
	return $output;
}
//get id room
function get_Room($conn)
{
	return $_POST['Edit-room'];
}

?> 
