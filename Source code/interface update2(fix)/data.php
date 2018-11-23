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

		if(isset($_POST['select-Province'])&& $_POST['select-Province']== $row["PROVINCE_ID"])
		{
			$output.='<option value="'.$row["PROVINCE_ID"].'" selected="">'.$row["PROVINCE_NAME"].'</option>';
		}
		else 
		{
			$output.='<option value="'.$row["PROVINCE_ID"].'">'.$row["PROVINCE_NAME"].'</option>';
		}
	}
	return $output;
}
//cb quan huyen
function fill_District($conn)
{

	$output = '<option value="">Quận/Huyện</option>';
	if(isset($_POST['select-Province'])||isset($_GET['select-Province']))
	{
		if(isset($_POST['select-Province'])){
			$query = "SELECT * FROM district where DISTRICT_PROVINCE_ID='" .$_POST['select-Province']."'";
		}
		else
			if(isset($_GET['select-Province'])){
				$query = "SELECT * FROM district where DISTRICT_PROVINCE_ID='" .$_GET['select-Province']."'";
			}
		}
		else
		{
			$query = "SELECT * FROM district";
		}
		$result1 = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result1)) 
		{

			if(isset($_POST['select-District'])&& $_POST['select-District']== $row["DISTRICT_ID"])
			{
				$output.='<option value="'.$row["DISTRICT_ID"].'" selected="">'.$row["DISTRICT_NAME"].'</option>';
			}
			else
			{	
				$output.='<option value="'.$row["DISTRICT_ID"].'">'.$row["DISTRICT_NAME"].'</option>';
			}
		}
		return $output;
	}
// cb phuong/xa
	function fill_Ward($conn)
	{

		$output = '<option value="">Phường/Xã</option>';
		if(isset($_POST['select-District'])||isset($_GET['select-District']))
		{
			if(isset($_POST['select-District'])){
				$query = "SELECT * FROM ward where WARD_DISTRICT_ID='".$_POST['select-District']."'";
			}
			else 
				if(isset($_GET['select-District'])){
					$query = "SELECT * FROM ward where WARD_DISTRICT_ID='".$_GET['select-District']."'";
				}
			}
			else
			{
				$query = "SELECT * FROM ward";
			}

			$result1 = mysqli_query($conn,$query);
			while($row = mysqli_fetch_array($result1)) 
			{
				if(isset($_POST['select-Ward'])&& $_POST['select-Ward']== $row["WARD_ID"])
				{
					$output.='<option value="'.$row["WARD_ID"].'" selected="">'.$row["WARD_NAME"].'</option>';
				}
				else
				{
					$output.='<option value="'.$row["WARD_ID"].'">'.$row["WARD_NAME"].'</option>';
				}
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
				if(isset($_POST['select-type'])&& $_POST['select-type']== $row["TYPE_ID"])
				{
					$output.='<option value="'.$row["TYPE_ID"].'" selected="">'.$row["TYPE_NAME"].'</option>';
				}
				else
				{
					$output.='<option value="'.$row["TYPE_ID"].'">'.$row["TYPE_NAME"].'</option>';
				}
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
			else if(isset($_POST['save-edit-room']))
			{
				while($row = mysqli_fetch_array($result)) 
				{
					if(isset($_POST['select-type'])&& $_POST['select-type']== $row["TYPE_ID"])
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
				if(isset($_POST['select-status'])&& $_POST['select-status']== $row["STATUS_ID"])
				{
					$output.='<option value="'.$row["STATUS_ID"].'" selected="">'.$row["STATUS_NAME"].'</option>';
				}
				else
				{
					$output.='<option value="'.$row["STATUS_ID"].'">'.$row["STATUS_NAME"].'</option>';
				}
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

			if(isset($_POST['Edit-room']) ){
				while($row = mysqli_fetch_array($result)) 
				{
			//

			//
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
			else if(isset($_POST['save-edit-room']))
			{
				while($row = mysqli_fetch_array($result)) 
				{
					if(isset($_POST['select-status'])&& $_POST['select-status']== $row["STATUS_ID"])
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

				if(isset($_POST['select-zone'])&& $_POST['select-zone']== $row["ZONE_ID"])
				{
					$output.='<option value="'.$row["ZONE_ID"].'" selected="">'.$row["ZONE_NAME"].'</option>';
				}
				else
				{
					$output.='<option value="'.$row["ZONE_ID"].'">'.$row["ZONE_NAME"].'</option>';
				}
			}

			return $output;
		}
//--
		function fill_zone_edit($conn)
		{

// select 
			$SessionID = $_SESSION['ID'];
			$edit_room_id=$_POST['Edit-room'];
			$query1 = "SELECT * FROM room where ROOM_ID= $edit_room_id ";
			$result1 = mysqli_query($conn,$query1);
			while($row = mysqli_fetch_array($result1)) 
			{
				$zone_of_id=$row["ROOM_ZONE_ID"];
			}
//
			$output = '<option value="">Khu</option>s';
			$query = "SELECT * FROM zone where ZONE_USER_ID = '$SessionID'";
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
			else if(isset($_POST['save-edit-room']))
			{
				while($row = mysqli_fetch_array($result)) 
				{

					if(isset($_POST['select-zone'])&& $_POST['select-zone']== $row["ZONE_ID"])
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
//load  name room edit
		function load_room_name($conn)
		{	

			if(isset($_POST['property-title']))
			{

				return $_POST['property-title'];
			}
			if(isset($_POST['Edit-room'])){
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
		}
//laod description edit
		function load_description($conn)
		{
			if(isset($_POST['property-description']))
			{

				return $_POST['property-description'];
			}
			if(isset($_POST['Edit-room'])){
				$edit_room_id = $_POST['Edit-room'];

				$query1="SELECT *FROM room where ROOM_ID=$edit_room_id";
				$result1 = mysqli_query($conn,$query1);
				while($row = mysqli_fetch_array($result1))
				{
					$output = $row["ROOM_DISCRIBE"];
				}
				return $output;
			}
		}
//load area edit
		function load_area($conn)
		{

			if(isset($_POST['Size']))
			{

				return $_POST['Size'];
			}
			if(isset($_POST['Edit-room'])){	
				$edit_room_id = $_POST['Edit-room'];

				$query1="SELECT *FROM room where ROOM_ID=$edit_room_id";
				$result1 = mysqli_query($conn,$query1);
				while($row = mysqli_fetch_array($result1))
				{
					$output = $row["ROOM_ACREAGE"];
				}
				return $output;
			}
		}
//laod   price edit
		function load_price($conn)
		{	
			if(isset($_POST['Sale-Rent-Price']))
			{

				return $_POST['Sale-Rent-Price'];
			}

			if(isset($_POST['Edit-room'])){	
				$edit_room_id = $_POST['Edit-room'];

				$query1="SELECT *FROM room where ROOM_ID=$edit_room_id";
				$result1 = mysqli_query($conn,$query1);
				while($row = mysqli_fetch_array($result1))
				{
					$output = $row["ROOM_PRICE"];
				}
				return $output;
			}
		}
//get id room
		function get_Room($conn)
		{
			if(isset($_POST['Edit-room']))
			{
				return $_POST['Edit-room'];
			}
			if(isset($_POST['id_Edit-room']))
			{
				return $_POST['id_Edit-room'];
			}
		}
		if(isset($_POST["action"]) && $_POST["action"] == "update")
		{
			$targetDir = "uploads/";
			$fileName = basename($_FILES["image"]["name"]);
	//$fileName = basename($_FILES['image']['name']);
			$fileName = time().'-'.$fileName;
	//$fileName = $_SESSION['ID'].'-'.$fileName;
			$targetFilePath = $targetDir . $fileName;

			$query = "UPDATE image SET IMAGE_NAME = '$fileName' WHERE IMAGE_ID = '".$_POST["image_id"]."'";
			move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
			if(mysqli_query($conn, $query))
			{
				echo 'cập nhật ảnh thành công';
			}
		}

		?> 
