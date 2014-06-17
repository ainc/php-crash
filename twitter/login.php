<?php
session_start();
require('db_connect.php');
$con = connect_to_db();

$username = $_POST["username"];
$password = $_POST["password"];

$login_sql = "SELECT * FROM `user` WHERE `username`='$username' 
	AND `password`= '$password' LIMIT 1";

$user = query_db($con, $login_sql);

$user_data = mysqli_fetch_array($user);

if (isset($user_data["user_id"])) {

	$_SESSION["user_id"] = $user_data["user_id"];
	$_SESSION["username"] = $user_data["username"];

	header('Location: home.php');
	die();
} else {

	echo "You're not logged in!";
}

?>