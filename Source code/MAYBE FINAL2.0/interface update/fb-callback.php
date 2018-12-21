<?php
require_once "config.php";

try {
	$accessToken = $helper->getAccessToken();
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
	echo "Response Exception: " . $e->getMessage();
	exit();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
	echo "SDK Exception: " . $e->getMessage();
	exit();
}

if (!$accessToken) {
	header('Location: login.php');
	exit();
}

$oAuth2Client = $FB->getOAuth2Client();
if (!$accessToken->isLongLived())
	$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

$response = $FB->get("/me?fields=id, first_name, last_name, email,link, picture.type(large)", $accessToken);
$userData = $response->getGraphNode()->asArray();
$_SESSION['userData'] = $userData;
$_SESSION['access_token'] = (string) $accessToken;
// checker tai  khoang lay  id user


$id_facebook=$_SESSION['userData']['id'];

$fullname=$_SESSION['userData']['last_name']." ".$_SESSION['userData']['first_name'];
$emailOfFace=$_SESSION['userData']['email'];

$db = mysqli_connect('localhost', 'root', '', 'qlphongtro');
$user_check_query = "SELECT * FROM users WHERE USERS_ID_FACEBOOK='$id_facebook' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);



  if ($user) { // if user exists
  	if ($user['USERS_ID_FACEBOOK'] == $_SESSION['userData']['id']) {
  		$query = "SELECT * FROM users WHERE USERS_ID_FACEBOOK='$id_facebook'";
  		$result1 = mysqli_query($db,$query);;
  		$row = mysqli_fetch_array($result1);
      $_SESSION['ID'] = $row["USERS_ID"];
    }
  }
  else{
  	$query = "INSERT INTO users (USERS_ID_FACEBOOK,USERS_NAME, USERS_USERNAME) 
  	VALUES($id_facebook,N'$fullname','$emailOfFace')";

  	mysqli_query($db, $query);
  	$query = "SELECT * FROM users WHERE USERS_ID_FACEBOOK='$id_facebook'";
  	$result1 = mysqli_query($db,$query);;
  	$row = mysqli_fetch_array($result1);
    $_SESSION['ID'] = $row["USERS_ID"];
  }


  if(isset($_SESSION['ID'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  
  exit();
  ?>