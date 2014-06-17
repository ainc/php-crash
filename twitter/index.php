<?php 
require('db_connect.php');
$con = connect_to_db();

// $user = query_db($con, "SELECT * FROM user LIMIT 1;");
// $user_data = mysqli_fetch_array($user);
// print_r($user_data);

if (array_key_exists("l", $_GET) and $_GET["l"] == 1) {
	echo "Thanks for coming by.<br/>";
}

?>
<form action="login.php" method="POST">
	username: <input type="text" name="username"/><br/>
	password: <input type="password" name="password" /><Br/>
	<input type="submit" value="Login!">
</form>