<?php
	if(isset($_POST['submit'])&&!empty($_POST['submit'])){
		if(isset($_SESSION['ID'])&&!empty($_SESSION['ID'])){
			$query = "select USERS_PHONE from users where USERS_ID = ".$_SESSION['ID'];
			$result = mysqli_query($connection,$query);
		    if (!$result) {
		        die('Invalid query: ' . mysqli_error($connection));
		    }
		    $row = @mysqli_fetch_assoc($result);
			if(!empty($row['USERS_PHONE'])){
	            $query = "insert into contract (CONTRACT_ROOM_ID, CONTRACT_USERS_ID, CONTRACT_PRICE, CONTRACT_STATUS, CONTRACT_STARTDATE, CONTRACT_ENDDATE) VALUES (".$idroom.",".$_SESSION['ID'].",".$price.",1,NOW(),NOW())";
	            $result = mysqli_query($connection,$query);
	            if (!$result) {
	                die('Invalid query: ' . mysqli_error($connection));
	            }
	            echo "<script> alert('ĐẶT CHỔ THÀNH CÔNG. VUI LÒNG ĐỢI CHỦ CHỔ Ở XÁC NHẬN!!'); </script>"; 
	        }
	        else
	        	echo "<script> alert('VUI LÒNG CẬP NHẬP SỐ ĐIỆN THOẠI Ở THÔNG TIN CÁ NHÂN TRƯỚC KHI ĐẶT CHỔ'); </script>";
	    }
	    else
	       	echo "<script>  alert('VUI LÒNG ĐĂNG NHẬP TRƯỚC KHI ĐẶT PHÒNG'); </script>";     
    }      
?>