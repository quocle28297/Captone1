<?php  
	$query = "select CONTRACT_ROOM_ID, CONTRACT_USERS_ID from contract where CONTRACT_ROOM_ID = ".$idroom." and CONTRACT_USERS_ID =".$_SESSION['ID'];
	$result = mysqli_query($connection,$query);
	if (!$result) {
	    die('Invalid query: ' . mysqli_error($connection));
	}
	$rowcount=mysqli_num_rows($result);
	
?>