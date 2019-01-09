<?php

require_once './connect.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "INSERT INTO users(username, password) VALUES ('$username', '$password')";

// mysql.query function expects 2 arguments, first is the connection to your db variable and the second is your mysql query variable

// $result = mysqli_query($conn, $sql);


if (mysqli_query($conn, $sql)) {
	echo 'success';
}else {
	echo  mysqli_error($conn);
}

// close a previously opened database connection
header('location: ../views/index.php');
mysqli_close($conn);

?>