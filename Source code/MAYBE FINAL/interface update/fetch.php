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
			<td><button type="button" class="alert-box delete" id_edit_zone="'.$row["ZONE_ID"].'" data-name="'.$row["ZONE_NAME"].'"   value="delete" ></button></td>

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
		<th>Stt</th>
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

				<td><form method="post"
				action="edit-room.php">
				<input 
				type="submit" 
				id="'.$row["ROOM_ID"].'" 
				value="'.$row["ROOM_ID"].'" 
				name="Edit-room"  
				class="alert-box edit">
				</form></td>

				<td><button type="button"
				class="alert-box delete"
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
function roomID($ROOM_Status_ID)
{
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databaseName="qlphongtro";

// Create connection
	$conn = new mysqli($servername, $username, $password,$databaseName);
	mysqli_set_charset($conn, 'UTF8');
	//array_push($errors,"dkm cmmm");
	
	$query = "SELECT * FROM status where STATUS_ID ='$ROOM_Status_ID'";
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
function load_img_room()
{
	if($_POST && isset($_POST['Edit-room'])||isset($_POST['save-edit-room'])){ 
		$connect = new PDO('mysql:host=localhost;dbname=qlphongtro', 'root', '');
		$connect->exec("set names utf8");

		$query="SELECT * FROM image WHERE IMAGE_ROOM_ID = ?";

		$statement = $connect->prepare($query);
		if(isset($_POST['Edit-room']))
		{
			$statement -> execute(array($_POST['Edit-room']));
		}
		else
		{
			$statement -> execute(array($_POST['id_Edit-room']));
		}
		$result = $statement -> fetchall();
		$number_of_rows=$statement -> rowCount();
		$output='';
		
		if($number_of_rows > 0)
		{
			$output .='
			<table class = "table table-bordered table-striped">
			';
			if($number_of_rows > 0)
			{
				$count =0;
				foreach ($result as $row)
				{


					$count ++;

					$output .='

					<tr>
					<td>'.$count.'</td>
					<td><a target="_blank" href="uploads/'.$row["IMAGE_NAME"].'">
					<img src="uploads/'.$row["IMAGE_NAME"].'" class="img-thumbnail" width="100" height="100" /></td></a>
					<td>'.$row["IMAGE_NAME"].'</td>
					<td><button type="button" class="alert-box edit" id="'.$row["IMAGE_ID"].'">Cập nhật</button></td>
					</tr>
					';

				}
			}
			else 
			{
				$output .='
				<tr>
				<td colspan="9" align = "center" style="color:black" > không có ảnh nào </td>
				</tr>
				';
			}
			$output .='</table>';
		}
		else
		{
			$output.='
			<span style="color: red" >Bạn Được Thêm Tối Đa 5 Ảnh </span>
			<div id="dZUpload" class="dropzone">
			<input type="file" name="files[]" multiple >
			</div>
			';
		}

		echo $output;
	}
}
//load  chi tietred 
function chitiet_red($CONTRACT_STATUS)
{
	if($CONTRACT_STATUS =='1')
	{
		$output='
		warning		
		';
	}
	else
	{
		$output='
		information
		';
	}
	return $output;
}
//
//get room contract 
function get_contract_statucs($connect,$id_room)
{
	$query="SELECT `CONTRACT_STATUS` FROM `contract` WHERE CONTRACT_ROOM_ID = $id_room";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array( $result);
	return $row[0];

}
//
function load_table_room2()
{
	
	if($_POST && isset($_POST['detail-zone'])){ 
		$detail_zone = $_POST['detail-zone'];

		$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
		$query ="SELECT * FROM room WHERE ROOM_ZONE_ID = '$detail_zone'" ; 
		mysqli_set_charset($connect, 'UTF8'); 
		$result = mysqli_query($connect, $query);
		$output='';
		$output .='
		<table id="room_data" class = "table table-bordered table-striped">  
		<thead>  
		<tr>
		<th>Chi tiết</th>
		<th>Stt</th>
		<th>ID</th>
		<th>Tên phòng</th>
		<th>Giá</th>
		<th>diện tích</th>
		<th>Cập nhật</th>
		<th>Xóa</th>
		<th>Thạng thái</th>
		</tr>
		</thead>  
		';

		$count =0;
		while($row = mysqli_fetch_array($result) )
		{
			$get_contract_statucs=get_contract_statucs($connect,$row["ROOM_ID"]);
			$color_chitiet = chitiet_red($get_contract_statucs);
			$a= roomID($row["ROOM_STATUS_ID"]);
			$status=statusred($row["ROOM_STATUS_ID"]);
			//format tiền
			$Room_price=number_format($row["ROOM_PRICE"]).'₫';
			$count ++;

			$output .='

			<tr>
			<td><form method="post"
			action="accept.php">
			<input 
			type="hidden"
			id="'.$row["ROOM_ID"].'"
			value="'.$row["ROOM_ID"].'" 
			name="detail-room">
			<input type="submit" value="Chi Tiết"
			class="alert-box '.$color_chitiet.'">
			</form></td>

			<td><p class="table_trunganh">'.$count.'</p></td>
			<td><p class="table_trunganh">'.$row["ROOM_ID"].'</p></td>
			<td><p class="table_trunganh">'.$row["ROOM_NAME"].'</p></td>
			
			<td><p class="table_trunganh">'.$Room_price.'</p></td>
			<td> <p class="table_trunganh"> '.$row["ROOM_ACREAGE"].'&nbspm²</p></td>

			<td><form method="post"
			action="edit-room.php">
			<input 
			type="hidden" 
			id="'.$row["ROOM_ID"].'" 
			value="'.$row["ROOM_ID"].'" 
			name="Edit-room"  
			class="alert-box edit">
			<input type="submit" value="Cập nhật"
			class="alert-box edit">
			</form></td>

			<td><button type="button"
			class="alert-box delete"
			id_edit_room="'.$row["ROOM_ID"].'" 
			edit_name="'.$row["ROOM_NAME"].'"
			value="delete"
			>xóa

			</button></td>
			<td>'.$status.' '.$a.'<p></td>

			</tr>
			';

		}

		$output .='
		<tfoot>
		<tr>
		<th>Chi tiết</th>
		<th>Stt</th>
		<th>ID</th>
		<th>Tên phòng</th>
		<th>Giá</th>
		<th>diện tích</th>
		<th>Cập nhật</th>
		<th>Xóa</th>
		<th>Thạng thái</th>
		</tr>
		</tfoot>
		</table>';
		echo $output;
	}
}
//laod  red  statý
function statusred($status_ID)
{
	$output='';
	if($status_ID == '1' )
	{
		$output='
		<p class="table_trunganh">
		';
	}
	if($status_ID == '2' )
	{
		$output='
		<p class="table_tunganhred">
		';
	}		
	return $output;
}
//
function load_table_zone2()
{	
	
	$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
	$query = "SELECT * FROM zone where ZONE_USER_ID ='".$_SESSION['ID']."'";
	mysqli_set_charset($connect, 'UTF8');
	$result = mysqli_query($connect, $query);
	$output='';
	$output .='
	<table id="zone_data" class = "table table-bordered table-striped">  
	<thead>  
	<tr>
	<th>Chi tiết</th>
	<th>Stt</th>
	<th>ID</th>
	<th>Tên zone</th>
	<th>Địa chỉ</th>
	<th>Cập nhật</th>
	<th>Xóa</th>
	</tr>
	<thead>  
	<tbody>
	';

	$count =0;
	while($row = mysqli_fetch_array($result))
	{
		$count ++;

		$output .='
		

		<tr>
		<td><form method="POST"
		action="management-room.php">
		<input 
		type="hidden" 
		id="'.$row["ZONE_ID"].'"
		value="'.$row["ZONE_ID"].'" 
		name="detail-zone" 
		>
		<input
		type ="submit"
		value="Chi Tiết"
		class="alert-box information"
		 >
		</form></td>

		<td><p class="table_trunganh">'.$count.'</p></td>
		<td><p class="table_trunganh">'.$row["ZONE_ID"].'</p></td>
		<td><p class="table_trunganh">'.$row["ZONE_NAME"].'</p></td>
		<td><p class="table_trunganh">'.$row["ZONE_ADDRESS"].'</p></td>

		<td><form method="POST" 
		action="Edit-zone.php"> 
		<input 
		type="hidden" 
		id="'.$row["ZONE_ID"].'" 
		value="'.$row["ZONE_ID"].'" 
		name="Edit-zone"  
		>
		<input
		type ="submit"
		value="Cập Nhật"
		class="alert-box edit"
		 >
		</form></td>

		<td><button type="button" 
		class="alert-box delete" 
		id_edit_zone="'.$row["ZONE_ID"].'" 
		data-name="'.$row["ZONE_NAME"].'" >
		</button></td>
		</tr>
		
		';
	}

	$output .='
	</tbody>
	<tfoot>
	<tr>
	<th>Chi tiết</th>
	<th>Stt</th>
	<th>ID</th>
	<th>Tên zone</th>
	<th>Địa chỉ</th>
	<th>Cập nhật</th>
	<th>Xóa</th>
	</tr>
	</tfoot>
	</table>';
	echo $output;
}
// format dd/mm/yyyy
function time_count($time1,$time2)
{
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databaseName="qlphongtro";

// Create connection
	$conn = new mysqli($servername, $username, $password,$databaseName);
	mysqli_set_charset($conn, 'UTF8');
	//array_push($errors,"dkm cmmm");
	
	$query = "SELECT TIMESTAMPDIFF(MONTH, '$time1', '$time2	')";
	$result1 = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result1)) 
	{

		$output=$row[0];
	}
	return $output;
}
// format dd/mm/yyyy
function load_table_accept()
{
	if(isset($_POST['detail-room']))
	{
		$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
		$query = "SELECT * FROM contract where CONTRACT_ROOM_ID ='".$_POST['detail-room']."'and CONTRACT_STATUS='1'";

		mysqli_set_charset($connect, 'UTF8');
		$result = mysqli_query($connect, $query);
		$output='';
		$output .='
		<div class="table-responsive"> 
		<table id="zone_data" class = "table table-bordered table-striped">  
		<thead>  
		<tr>
		<th>ID Phòng</th>
		<th>ID người thuê</th>
		<th>Ngày bắt đầu</th>
		<th>Ngày kết thúc</th>
		<th>Giá tiền</th>
		<th>Đồng ý</th>
		<th>Từ chối</th>
		</tr>
		<thead>  
		<tbody>
		';

		$count =0;
		while($row = mysqli_fetch_array($result))
		{

			$count_day=0;
			$timestar = $row["CONTRACT_STARTDATE"];
			$timesend=$row["CONTRACT_ENDDATE"];

			$count_day=time_count($timestar,$timesend);
		//$first_date = strtotime('timestar');
		//$second_date = strtotime('timesend');
			$timestar=date("d/m/Y", strtotime($timestar));
			$timesend=date("d/m/Y", strtotime($timesend));
		//$Room_price=number_format($row["ROOM_PRICE"]).'₫';

		//$date_diff = date_diff($first_date, $second_date);

		//$datediff = $timesend - $timesend;
			$Price = $row["CONTRACT_PRICE"];
			$Price=$count_day*$Price;
			$Price = number_format($Price).'₫';
			$Price_1 = number_format($row["CONTRACT_PRICE"]).'₫';



			$output .='


			<tr>
			<td><p class="table_trunganh">'.$row["CONTRACT_ROOM_ID"].'</p></td>
			<td><a href="viewprofile.php?profile='.$row["CONTRACT_USERS_ID"].'" target="_blank" ><p class="table_trunganh_id">'.$row["CONTRACT_USERS_ID"].'<p></a></td>
			<td><p class="table_trunganh">'.$timestar.'</p></td>
			<td><p class="table_trunganh">'.$timesend.'</p></td>
			<td><p class="table_trunganh">'.$Price.'</p></td>

			<td><button type="button" 
			class="alert-box success" 
			id="'.$row["CONTRACT_ROOM_ID"].'" 
			value="'.$row["CONTRACT_ROOM_ID"].'"
			date-s="'.$row["CONTRACT_STARTDATE"].'"
			date-e="'.$row["CONTRACT_ENDDATE"].'"
			gia="'.$Price_1.'"
			ID_tenant="'.$row["CONTRACT_USERS_ID"].'">
			Đồng ý		
			</button></td>


			<td><button type="button" 
			class="alert-box delete" 
			id_delete_f="'.$row["CONTRACT_ROOM_ID"].'" 
			value-d="'.$row["CONTRACT_ROOM_ID"].'"
			date-s="'.$row["CONTRACT_STARTDATE"].'"
			date-e="'.$row["CONTRACT_ENDDATE"].'"
			gia="'.$Price_1.'"
			id_tenant_f="'.$row["CONTRACT_USERS_ID"].'">
			Từ Chối	
			</button></td>
			';
		}

		$output .='
		</tbody>
		<tfoot>
		<tr>
		<th>ID Phòng</th>
		<th>ID người thuê</th>
		<th>Ngày bắt đầu</th>
		<th>Ngày kết thúc</th>
		<th>Giá tiền</th>
		<th>Đồng ý</th>
		<th>Từ chối</th>
		</tr>
		</tfoot>
		</table>
		</div>
		';
		echo $output;
	}
	
}
// load thoong tin  phong  dang thue
function load_table_accept_ok()
{	
	$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
	$query = "SELECT * FROM contract where CONTRACT_ROOM_ID ='".$_POST['detail-room']."'and CONTRACT_STATUS='2'";
	mysqli_set_charset($connect, 'UTF8');
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
	$output='';
	if(mysqli_num_rows($result) > 0)
	{
		$count_day=0;
	// lấy data
		$timestar = $row["CONTRACT_STARTDATE"];
		$timesend=$row["CONTRACT_ENDDATE"];
	// chạy hàm đếm  phía trên
		$count_day=time_count($timestar,$timesend);
		//$first_date = strtotime('timestar');
		//$second_date = strtotime('timesend');
	//định dạng d m y
		$timestar=date("d/m/Y", strtotime($timestar));
		$timesend=date("d/m/Y", strtotime($timesend));
		//$Room_price=number_format($row["ROOM_PRICE"]).'₫';

		//$date_diff = date_diff($first_date, $second_date);

		//$datediff = $timesend - $timesend;
	//tiền = giá sql * time
		$Price = $row["CONTRACT_PRICE"];
		$Price=$count_day*$Price;
		$Price = number_format($Price).'₫';
	//form tiền
		$Price_1 = number_format($row["CONTRACT_PRICE"]).'₫';
		//  lấy  tên
		$name=get_name_fetch($row["CONTRACT_USERS_ID"]);
		$output .='
		<div class="center1 ">
		<h5>Thông tin người thuê</h5>
		<div class="col-xs-12 col-sm-4 col-md-4">      
		<div class="form-group ">
		<label for="Size">Tên người thuê:  </label>
		<a href = "viewprofile.php?profile='.$row["CONTRACT_USERS_ID"].'" target="_blank"><b>Chi Tiết<b> </a>
		<span class="form-control">'.$name.'</span>
		</div>  
		</div>
		<br/> <br/><br/><br/><br/>
		<div class="col-xs-12 col-sm-4 col-md-4">      
		<div class="form-group ">
		<label for="Size">ID Phòng:  </label>
		<span class="form-control">'.$row["CONTRACT_ROOM_ID"].'</span>
		</div>  
		</div>
		<br/> <br/><br/><br/><br/>
		<div class="col-xs-12 col-sm-4 col-md-4">      
		<div class="form-group ">
		<label for="Size">Ngày Bắt Đầu:  </label>  
		<span class="form-control">'.$timestar.'</span>
		</div>  
		</div>
		<br/> <br/><br/><br/><br/>
		<div class="col-xs-12 col-sm-4 col-md-4">      
		<div class="form-group ">
		<label for="Size">Ngày kết thúc :  </label>  
		<span class="form-control">'.$timesend.'</span>
		</div>  
		</div>
		<br/> <br/><br/><br/><br/>
		<div class="col-xs-12 col-sm-4 col-md-4">      
		<div class="form-group ">
		<label for="Size">Tổng tiền :  </label>  
		
		<span class="form-control">'.$Price.'</span>
		</div>  
		</div>
		<br/>
		<button type="button" 
		class="alert-box delete1" 
		id="id_end"
		id_end_room="'.$_POST['detail-room'].'"
		date="'.$row["CONTRACT_ENDDATE"].'"
		gia_e="'.$Price.'"
		ID_tenant_e='.$row["CONTRACT_USERS_ID"].'
		>
		Kết thúc Sớm
		</button>
		<br/> <br/><br/><br/><br/><br/>
		</div>
		';
	}
	else 
	{

		$output='Chưa có ai đặt  phòng';
	}

	echo $output;
}

//accept
function check_room_free()
{
	if(isset($_POST['detail-room'])){
		$connect = mysqli_connect("localhost", "root", "", "qlphongtro"); 

		$query = "SELECT * FROM contract where CONTRACT_ROOM_ID ='".$_POST['detail-room']."'and CONTRACT_STATUS='1'";

		$result = mysqli_query($connect, $query); 
		if(mysqli_num_rows($result) > 0)
		{
			load_table_accept();
		}
		else
		{
			load_table_accept_ok();
		}
	}
	else
	{
		
	}
}
// get  name  với  id
function get_name_fetch($id_user)
{
	$connect = mysqli_connect("localhost", "root", "", "qlphongtro"); 

	$query = "SELECT `USERS_NAME` FROM `users` WHERE USERS_ID = '$id_user'";
	mysqli_set_charset($connect, 'UTF8');
	$result = mysqli_query($connect, $query); 
	$row=mysqli_fetch_array($result);
	return $row[0];

}
function history()
{
	if(isset($_POST['id_roon_h']))
	{
		$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
		$query = "SELECT * FROM contract where CONTRACT_ROOM_ID ='".$_POST['id_roon_h']."'and CONTRACT_STATUS='3'";

		mysqli_set_charset($connect, 'UTF8');
		$result = mysqli_query($connect, $query);
		$output='';
		if(mysqli_num_rows($result) > 0)
		{
			$output .='
			<div class="table-responsive"> 
			<table id="zone_data" class = "table table-bordered table-striped">  
			<thead>  
			<tr>
			<th>ID Phòng</th>
			<th>ID người thuê</th>
			<th>Ngày bắt đầu</th>
			<th>Ngày kết thúc</th>
			<th>Giá tiền một tháng</th>
			<th>Tổng tiền</th>
			</tr>
			<thead>  
			<tbody>
			';

			$count =0;
			while($row = mysqli_fetch_array($result))
			{

				$count_day=0;
				$timestar = $row["CONTRACT_STARTDATE"];
				$timesend=$row["CONTRACT_ENDDATE"];

				$count_day=time_count($timestar,$timesend);
		//$first_date = strtotime('timestar');
		//$second_date = strtotime('timesend');
				$timestar=date("d/m/Y", strtotime($timestar));
				$timesend=date("d/m/Y", strtotime($timesend));
		//$Room_price=number_format($row["ROOM_PRICE"]).'₫';

		//$date_diff = date_diff($first_date, $second_date);

		//$datediff = $timesend - $timesend;
				$Price = $row["CONTRACT_PRICE"];
				$Price=$count_day*$Price;
				$Price = number_format($Price).'₫';
				$Price_1 = number_format($row["CONTRACT_PRICE"]).'₫';



				$output .='


				<tr>
				<td><p class="table_trunganh">'.$row["CONTRACT_ROOM_ID"].'</p></td>
				<td><a href="viewprofile.php?profile='.$row["CONTRACT_USERS_ID"].'" target="_blank" ><p class="table_trunganh_id">'.$row["CONTRACT_USERS_ID"].'<p></a></td>
				<td><p class="table_trunganh">'.$timestar.'</p></td>
				<td><p class="table_trunganh">'.$timesend.'</p></td>
				<td><p class="table_trunganh">'.$Price_1.'</p></td>
				<td><p class="table_trunganh">'.$Price.'</p></td>
				';
			}

			$output .='
			</tbody>
			<tfoot>
			<tr>
			<th>ID Phòng</th>
			<th>ID người thuê</th>
			<th>Ngày bắt đầu</th>
			<th>Ngày kết thúc</th>
			<th>Giá tiền một tháng</th>
			<th>Tổng tiền</th>
			</tr>
			</tfoot>
			</table>
			</div>
			';
		}
		else
		{
			$output.='Không có lịch sử thuê phòng';

		}
		echo $output;
	}
	
}
function sum_room()
{
	if(isset($_POST['id_roon_h']))
	{
		$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
		$query = "SELECT * FROM contract where CONTRACT_ROOM_ID ='".$_POST['id_roon_h']."'and CONTRACT_STATUS='3'";

		mysqli_set_charset($connect, 'UTF8');
		$result = mysqli_query($connect, $query);
		$output='';
		
		$count =0;
		while($row = mysqli_fetch_array($result))
		{

			$count_day=0;
			$timestar = $row["CONTRACT_STARTDATE"];
			$timesend=$row["CONTRACT_ENDDATE"];

			$count_day=time_count($timestar,$timesend);
		//$first_date = strtotime('timestar');
		//$second_date = strtotime('timesend');
			$timestar=date("d/m/Y", strtotime($timestar));
			$timesend=date("d/m/Y", strtotime($timesend));
		//$Room_price=number_format($row["ROOM_PRICE"]).'₫';

		//$date_diff = date_diff($first_date, $second_date);

		//$datediff = $timesend - $timesend;
			$Price = $row["CONTRACT_PRICE"];
			$Price=$count_day*$Price;
			$count+=$Price;



		}
		$count = number_format($count).'₫';
	}
	return $count;
}
//load thong bao dat phong
function laod_notification()
{	
	if(isset($_POST['detail-zone']))
	{
		$detail_zone = $_POST['detail-zone'];
		$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
		$query ="SELECT * FROM room WHERE ROOM_ZONE_ID = '$detail_zone'"; 

		mysqli_set_charset($connect, 'UTF8');
		$result = mysqli_query($connect, $query);
		$output='';
		$output .='
		<table id="zone_data" class = "table table-bordered table-striped">  
		<thead>  
		<tr>
		<th>Chi tiết</th>

		</tr>
		<thead>  
		<tbody>
		';

		$count =0;
		while($row = mysqli_fetch_array($result))
		{
			if(get_contract_statucs($connect,$row["ROOM_ID"])==1)
			{
				$count ++;

				$output .='


				<tr>
				<td><form method="POST"
				action="accept.php"
				target="_blank">
				<input 
				type="submit" 
				id="'.$row["ROOM_ID"].'"
				value="'.$row["ROOM_ID"].'" 
				name="detail-room" 
				class="alert-box warning">
				</form></td>
				';
			}
		}

		$output .='
		</tbody>
		<tfoot>
		<tr>
		<th>Chi tiết</th>
		</tr>
		</tfoot>
		</table>';
		echo $output;
	}
}
//
//laod btn thong bao
function laod_btn()
{
	$output='';
	$detail_zone = $_POST['detail-zone'];
	$connect = mysqli_connect("localhost", "root", "", "qlphongtro");  
	$query ="SELECT * FROM room WHERE ROOM_ZONE_ID = '$detail_zone'"; 

	mysqli_set_charset($connect, 'UTF8');
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			if(get_contract_statucs($connect,$row["ROOM_ID"])==1)
			{
				$output.='
				<button type="button" 
				class="alert-box warning" 
				id="set_room">
				Có Đề Nghị đặt phòng
				</button>
				';
				break;
			}
		}
	}
	echo $output;
}
//
?>