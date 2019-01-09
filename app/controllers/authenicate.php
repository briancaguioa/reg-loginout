<?php 

	session_start();
	require "./connect.php";

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	// var_dump($username);
	// var_dump($password);

	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
	$result = mysqli_query($conn, $sql);


	var_dump($_SESSION);


	if (mysqli_num_rows($result) > 0) {
		$_SESSION['logged_in_user'] = $username;
	} else {
		$_SESSION['error_message'] = "Login Failed";
	}

	header('location: ../views/index.php');




 ?>