<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

// initializing variables
$USERS_NAME = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'qlphongtro');

// REGISTER USER
if (isset($_POST['Register'])) {

  // receive all input values from the form
  $USERS_NAME = mysqli_real_escape_string($db, $_POST['full-name']);
  $email = mysqli_real_escape_string($db, $_POST['register-email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['register-password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['register-password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($USERS_NAME)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE USERS_USERNAME='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['USERS_USERNAME'] === $email) {
      array_push($errors, "Email đã tồn tại");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (USERS_NAME, USERS_USERNAME, USERS_PASSWORD) 
  			  VALUES(N'$USERS_NAME', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['USERS_NAME'] = $USERS_NAME;
  	$_SESSION['success'] = "You are now logged in";

  	//header('location: index.php');
  }
}


if (isset($_POST['SignIn'])) {
  $username = mysqli_real_escape_string($db, $_POST['login-email']);
  $password = mysqli_real_escape_string($db, $_POST['login-password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE USERS_USERNAME='$username' AND USERS_PASSWORD='$password'";

    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_array($results);
      $_SESSION['ID'] = $row["USERS_ID"];
      $_SESSION['USERS_NAME'] = $row["USERS_NAME"];  
      $_SESSION['success'] = "You are now logged in";
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

