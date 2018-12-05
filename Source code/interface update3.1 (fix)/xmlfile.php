<?php
$username="root";
$password="root";
$database="qlphongtro";
// require("phpsqlajax_dbinfo.php");

function parseToXML($htmlStr)
{
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost',"root","",$database);
mysqli_set_charset($connection, 'utf8');
if (!$connection) {
	die('Not connected : ' . mysqli_error());
}


// Select all the rows in the markers table
$query = "select ZONE_ID, ZONE_NAME, zone.ZONE_ADDRESS, MIN(room.ROOM_PRICE) AS min_price, MAX(room.ROOM_PRICE) AS max_price, zone.ZONE_LATITUDE, zone.ZONE_LOGITUDE, COUNT(room.ROOM_ID) AS soluong FROM zone INNER JOIN room on zone.ZONE_ID = room.ROOM_ZONE_ID WHERE room.ROOM_STATUS_ID = 1 GROUP BY room.ROOM_ZONE_ID";
$result = mysqli_query($connection,$query);
if (!$result) {
	die('Invalid query: ' . mysqli_error($connection));
}


echo '<zones>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
	// Add to XML document node
	echo '<zone ';
	echo 'id="' . $row['ZONE_ID'] . '" ';
	echo 'name="' . parseToXML($row['ZONE_NAME']) . '" ';
	echo 'address="' . parseToXML($row['ZONE_ADDRESS']) . '" ';
	echo 'min_price="' . $row['min_price'] . '" ';
	echo 'max_price="' . $row['max_price'] . '" ';
	echo 'lat="' . $row['ZONE_LATITUDE'] . '" ';
	echo 'lng="' . $row['ZONE_LOGITUDE'] . '" ';
	echo 'count="' . $row['soluong'] . '" ';
	echo '/>';
	$ind = $ind + 1;
}

// End XML file
echo '</zones>';
?>