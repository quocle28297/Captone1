<?php

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

?>