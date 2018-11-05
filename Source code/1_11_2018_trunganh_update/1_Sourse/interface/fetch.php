<?php

function getPostDetail_zone()
{
	if($_POST && isset($_POST['detail-zone'])){ 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databaseName="qlphongtro";



// Create connection
		$conn = new mysqli($servername, $username, $password,$databaseName);
		mysqli_set_charset($conn, 'UTF8');
		$zoneid=$_POST['detail-zone'];
		$query="SELECT * FROM zone WHERE ZONE_ID =  '$zoneid'";
		$result1 = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($result1)) 
		{
			return $row["ZONE_NAME"];
		}
	}
	else
	{
		return $comment = "Không có Id zone nào";
	}

	
}

function load_table_zone()
{
	$connect = new PDO('mysql:host=localhost;dbname=qlphongtro', 'root', '');
	$connect->exec("set names utf8");

	$query = "SELECT * FROM zone where ZONE_USER_ID ='".$_SESSION['ID']."'";

	$statement = $connect->prepare($query);
	$statement -> execute();
	$result = $statement -> fetchall();
	$number_of_rows=$statement -> rowCount();
	$output='';
	$output .='
	<table class = "table table-bordered table-striped">
	<tr>
	<th>Chi tiết</th>
	<th>Sr. No</th>
	<th>ID</th>
	<th>Tên zone</th>
	<th>Địa chỉ</th>
	<th>Cập nhật</th>
	<th>Xóa</th>
	</tr>
	';
	if($number_of_rows > 0)
	{
		$count =0;
		foreach ($result as $row)
		{
			$count ++;

			$output .='

			<tr>
			<td><form method="POST"
			action="management-room.php">
			<input type="submit" id="'.$row["ZONE_ID"].'"
			value="'.$row["ZONE_ID"].'" 
			name="detail-zone" 
			class="alert-box information">
			</form></td>
			<td>'.$count.'</td>
			<td>'.$row["ZONE_ID"].'</td>
			<td>'.$row["ZONE_NAME"].'</td>
			<td>'.$row["ZONE_ADDRESS"].'</td>
			<td><form method="POST" action="edit-room.php"> <input type="submit" id="'.$row["ZONE_ID"].'" value="'.$row["ZONE_ID"].'" name="Edit"  class="alert-box edit"></form></td>
			<td><button type="button" class="alert-box error" id_edit_zone="'.$row["ZONE_ID"].'" data-name="'.$row["ZONE_NAME"].'"  ></button></td>

			</tr>
			';

		}
	}
	else 
	{
		$output .='
		<tr>
		<td colspan="9" align = "center" style="color:black"> bạn chưa có khu nào </td>
		</tr>
		';
	}
	$output .='</table>';
	echo $output;
}

function load_table_room()

{
	if($_POST && isset($_POST['detail-zone'])){ 
		$connect = new PDO('mysql:host=localhost;dbname=qlphongtro', 'root', '');
		$connect->exec("set names utf8");

		$query="SELECT * FROM room WHERE ROOM_ZONE_ID = ?";

		$statement = $connect->prepare($query);
		$statement -> execute(array($_POST['detail-zone']));
		$result = $statement -> fetchall();
		$number_of_rows=$statement -> rowCount();
		$output='';
		$output .='
		<table class = "table table-bordered table-striped">
		<tr>
		<th>Chi tiết</th>
		<th>Sr. No</th>
		<th>ID</th>
		<th>Tên phòng</th>
		<th>Giá</th>
		<th>diện tích</th>
		<th>Cập nhật</th>
		<th>Xóa</th>
		<th>Thạng thái</th>

		</tr>
		';
		if($number_of_rows > 0)
		{
			$count =0;
			foreach ($result as $row)
			{
				$a= roomID($row["ROOM_TYPE_ID"]);

				$count ++;

				$output .='

				<tr>
				<td><form method="POST"
				action="#">
				<input 
				type="submit" 
				id="'.$row["ROOM_ID"].'"
				value="'.$row["ROOM_ID"].'" 
				name="detail-room" 
				class="alert-box information">
				</form></td>

				<td>'.$count.'</td>
				<td>'.$row["ROOM_ID"].'</td>
				<td>'.$row["ROOM_NAME"].'</td>
				<td>'.$row["ROOM_PRICE"].'</td>
				<td>'.$row["ROOM_ACREAGE"].'</td>

				<td><form method="POST" 
				action="edit-room.php">
				<input 
				type="submit" 
				id="'.$row["ROOM_ID"].'" 
				value="'.$row["ROOM_ID"].'" 
				name="Edit-room"  
				class="alert-box edit">
				</form></td>

				<td><button type="button"
				class="alert-box error"
				id_edit_room="'.$row["ROOM_ID"].'" 
				edit_name="'.$row["ROOM_NAME"].'"
				value="delete"
				>
				
				</button></td>
				<td>'.$a.'</td>
				
				</tr>
				';

			}
		}
		else 
		{
			$output .='
			<tr>
			<td colspan="9" align = "center" style="color:black" > Khu này chưa có phòng nào </td>
			</tr>
			';
		}
		$output .='</table>';
		echo $output;
	}
}
function roomID($ROOM_TYPE_ID)
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databaseName="qlphongtro";

// Create connection
	$conn = new mysqli($servername, $username, $password,$databaseName);
	mysqli_set_charset($conn, 'UTF8');
	
	$query = "SELECT * FROM status where STATUS_ID ='$ROOM_TYPE_ID'";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{

		$output=$row["STATUS_NAME"];
	}
	return $output;
}

if(isset($_POST["id_edit_room"]))
{
	$connect = new PDO('mysql:host=localhost;dbname=qlphongtro', 'root', '');
	$connect->exec("set names utf8");
	$query = "DELETE FROM room WHERE ROOM_ID = '".$_POST["id_edit_room"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
}

if(isset($_POST["id_edit_zone"]))
{
	$connect = new PDO('mysql:host=localhost;dbname=qlphongtro', 'root', '');
	$connect->exec("set names utf8");
	$query = "DELETE FROM zone WHERE ZONE_ID = '".$_POST["id_edit_zone"]."'";
	$statement = $connect->prepare($query);
	$statement->execute();
}
?>