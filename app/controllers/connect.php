<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "music";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connection failed: ' . mysqli_error($conn) );
}

// echo 'connected successfully';

?>