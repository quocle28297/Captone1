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
// cd  edit zone
function get_id_provider_ez($conn)
{
	$id = $_POST['Edit-zone'];
	$query="
	SELECT `ZONE_PROVINCE_ID`  from zone WHERE ZONE_ID = $id
	";
	$result=  $results = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	return $row[0];
}
function id_zoone_E($conn)
{
	if(isset($_POST['Edit-zone']))
	{
		return $_POST['Edit-zone'];
	}
}

function get_id_district_ez($conn)
{
	$id = $_POST['Edit-zone'];
	$query="
	SELECT `ZONE_DISTRICT_ID`  from zone WHERE ZONE_ID = $id
	";
	$result=  $results = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	return $row[0];
}

function get_id_ward_ez($conn)
{
	$id = $_POST['Edit-zone'];
	$query="
	SELECT `ZONE_WARD_ID`  from zone WHERE ZONE_ID = $id
	";
	$result=  $results = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	return $row[0];
}

// function fill_Provider($conn)
// {
// 	if(isset($_POST['Edit-zone']))
// 	{

// 	}
// }
//
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
		elseif(isset($_POST['Edit-zone']) && get_id_provider_ez($conn)==$row["PROVINCE_ID"] )
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
		elseif(isset($_POST['Edit-zone'])){
			$query = "SELECT * FROM district where DISTRICT_PROVINCE_ID='".get_id_provider_ez($conn)."'";
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
			elseif(isset($_POST['Edit-zone']) && get_id_district_ez($conn)==$row["DISTRICT_ID"] )
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
			elseif(isset($_POST['Edit-zone'])){
				$query = "SELECT * FROM ward where WARD_DISTRICT_ID='".get_id_district_ez($conn)."'";
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
				elseif(isset($_POST['Edit-zone']) && get_id_ward_ez($conn)==$row["WARD_ID"] )
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
//get  f
		function getname_f($conn)
		{
			if(isset($_GET['profile']))
			{
				$name_f_id = $_GET['profile'];
				$query="SELECT *FROM users where USERS_ID=$name_f_id";
				$result = mysqli_query($conn,$query);
				$row = mysqli_fetch_array($result);
				$output = $row["USERS_NAME"];				
				return $output;
			}
		}

		function getphone_f($conn)
		{
			if(isset($_GET['profile']))
			{
				$name_f_id = $_GET['profile'];
				$query="SELECT *FROM users where USERS_ID=$name_f_id";
				$result = mysqli_query($conn,$query);
				$row = mysqli_fetch_array($result);
				$output = $row["USERS_PHONE"];				
				return $output;
			}
		}

		function getgmail_f($conn)
		{
			if(isset($_GET['profile']))
			{
				$name_f_id = $_GET['profile'];
				$query="SELECT *FROM users where USERS_ID=$name_f_id";
				$result = mysqli_query($conn,$query);
				$row = mysqli_fetch_array($result);
				$output = $row["USERS_USERNAME"];				
				return $output;
			}
		}

		function getid_f($conn)
		{
			if(isset($_GET['profile']))
			{
				$name_f_id = $_GET['profile'];			
				return $name_f_id;
			}
		}
//get  f
		// accept
		if(isset($_POST["id-phong"])&& isset($_POST["date-s"]) && isset($_POST["date-e"]) && isset($_POST["gia"]))
		{ 
			$id_phong = mysqli_real_escape_string($conn, $_POST["id-phong"]);  
			$date_s = mysqli_real_escape_string($conn, $_POST["date-s"]);  
			$date_e = mysqli_real_escape_string($conn, $_POST["date-e"]);  
			$gia = mysqli_real_escape_string($conn, $_POST["gia"]);
			$ID_tenant = mysqli_real_escape_string($conn,$_POST["ID_tenant"]);
			$gia=get_number($gia);
			$query="
			UPDATE contract
			SET 
			`CONTRACT_STARTDATE` = '$date_s', `CONTRACT_ENDDATE` = '$date_e', `CONTRACT_PRICE`='$gia',`CONTRACT_STATUS`='2'
			WHERE 
			`CONTRACT_ROOM_ID`='$id_phong' and `CONTRACT_USERS_ID`='$ID_tenant'
			";
			
			mysqli_query($conn, $query);
			$query2="
			DELETE FROM `contract` WHERE `CONTRACT_ROOM_ID`='$id_phong' and CONTRACT_STATUS='1'";
			mysqli_query($conn, $query2);
			echo $query3="
			UPDATE `room` SET `ROOM_STATUS_ID`='2'
			where
			`ROOM_ID`='$id_phong'
			";
			mysqli_query($conn, $query3);

		}
		// accpt
		//
		function get_number($str){
			$str_d= explode( '₫', $str );

			$str_Tmp=$str_d[0];

			$str_f=explode(',', $str_Tmp);
			print_r($str_f);
			$count= sizeof($str_f);
			$dem=0;
			$result=implode($str_f);
			return  $result;

		}
		//
		//xoa contrac
		if(isset($_POST["id_delete_f"]) && isset($_POST["id_tenant_f"]))
		{
			$id_delete_f=$_POST["id_delete_f"];
			$id_tenant_f=$_POST["id_tenant_f"];
			$query="
			DELETE FROM `contract` where CONTRACT_ROOM_ID = '$id_delete_f' and CONTRACT_USERS_ID = '$id_tenant_f' and CONTRACT_STATUS='1';
			";
			if (mysqli_query($conn, $query)) {
				echo"<script>";       
				echo  "alert('Xóa thành công');";
				echo "</script>";
			} else {
				echo"<script>";       
				echo  "alert('Xóa thất bại');";
				echo "</script>";
			}
		}
		//thay đổi thông tin cá nhân
		if(isset($_GET["save-f"]))
		{
			$profile=mysqli_real_escape_string($conn, $_GET["profile"]);
			$name = mysqli_real_escape_string($conn, $_GET["name-f"]);  
			$phone= mysqli_real_escape_string($conn,$_GET["phone-f"]);
			$query="
			UPDATE `users` SET USERS_NAME = N'$name' , USERS_PHONE ='$phone' where USERS_ID = $profile
			";
			if (mysqli_query($conn, $query)) {
				echo"<script>";       
				echo  "alert('cập nhật thành công');";
				echo "</script>";
			} else {
				echo"<script>";       
				echo  "alert('cập nhật thất bại');";
				echo "</script>";
			}
		}
		// 
		//ket thuc som
		if(isset($_POST["id-phong-e"]) && isset($_POST["date-e-e"]) && isset($_POST["gia-e"]))
		{ 
			$id_phong = mysqli_real_escape_string($conn, $_POST["id-phong-e"]);  
			$date_e = mysqli_real_escape_string($conn, $_POST["date-e-e"]);  
			$gia = mysqli_real_escape_string($conn, $_POST["gia-e"]);
			$ID_tenant = mysqli_real_escape_string($conn,$_POST["ID_tenant-e"]);
			$gia=get_number($gia);
			$query="
			UPDATE contract
			SET 
			`CONTRACT_ENDDATE` = '$date_e', `CONTRACT_PRICE`='$gia',`CONTRACT_STATUS`='3'
			WHERE 
			`CONTRACT_ROOM_ID`='$id_phong' and `CONTRACT_USERS_ID`='$ID_tenant'
			";
			
			mysqli_query($conn, $query);
			$query3="
			UPDATE `room` SET `ROOM_STATUS_ID`='1'
			where
			`ROOM_ID`='$id_phong'
			";
			mysqli_query($conn, $query3);

		}
		//ket thuc som
		//đỏi mật khẩu
		if(isset($_POST["profile"]) && isset($_POST["old_pass"]) && isset($_POST["new_pass"]))
		{
			$id = mysqli_real_escape_string($conn, $_POST["profile"]);
			$old_pass = mysqli_real_escape_string($conn, $_POST["old_pass"]);
			$new_pass = mysqli_real_escape_string($conn, $_POST["new_pass"]);
			$old_pass=md5($old_pass);
			$new_pass=md5($new_pass);
			$user_old_pass = "SELECT * FROM users WHERE USERS_ID='$id' and USERS_PASSWORD ='$old_pass'";
			$result=mysqli_query($conn, $user_old_pass);

			if($row=mysqli_fetch_array($result)>0)
			{
				$query="UPDATE `users` SET `USERS_PASSWORD`= '$new_pass' where USERS_ID='$id' ";
				mysqli_query($conn, $query);
				thongbao1('Đổi Mật Khẩu thành công');
			}
			else
			{
				thongbao1('Mật Khẩu hiện tại không chính xác');
			}
		}
		function thongbao1($text)
		{
			      
			echo  "$text";
			

		}
		//
		?> 
