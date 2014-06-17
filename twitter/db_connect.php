<?php
error_reporting(E_ERROR);


function connect_to_db() {

	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "twitter";

	$con = mysqli_connect($server, $user, $password, $database);

	// Check connection
	if (mysqli_connect_errno()) {
	  die("Failed to connect to MySQL: " . mysqli_connect_error());
	}

	return $con;
}

function query_db($con, $sql) {
	$res = mysqli_query($con, $sql) or die("DB Error:".mysqli_error($con));
	return $res;
}

function is_user_loggedin() {
	if (isset($_SESSION["user_id"])) {
		return true;
	} else {
		return false;
	}
}














