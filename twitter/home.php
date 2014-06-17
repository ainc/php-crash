<?php
session_start();
require('db_connect.php');
$con = connect_to_db();

if (!is_user_loggedin()) {
	// user is not logged in!!!!!
	header('Location: index.php');
	die();
}
// saving tweets
if (isset($_POST["save_tweet"])) {
	// they want to tweet!!!!

	// clean the input so hackers don't mess everything up.
	$tweet = mysqli_real_escape_string($con, $_POST["tweet"]);
	$user_id = intval($_SESSION["user_id"]);

	// compose the SQL we'll give to the Database to parse.
	$sql = "INSERT INTO `tweet` 
				(`user_id`,`tweet_text`,`datetime_tweeted`)
			VALUES 
				('$user_id','$tweet', NOW())";

	query_db($con, $sql);
	echo "Tweeted inserted into the DB!<br/>";
}

// delete tweets
if (is_numeric($_GET["delete"])) {
	// they've clicked on a delete link!
	$tweet_id = intval($_GET["delete"]);
	$user_id = intval($_SESSION["user_id"]);
	// be sure to add the user id stuff!
	// this way, you must own it to delete it.
	$delete_sql = "DELETE FROM `tweet` 
					WHERE `tweet_id`='$tweet_id' AND `user_id`='$user_id'
					LIMIT 1";
	query_db($con, $delete_sql);
	echo "Hey, I deleted a tweet!";
}

?>
<a href="logout.php">Logout</a><br/>

<form method="POST" action="home.php">
	Tell the world all your useless thoughts: 
	<input type="text" name="tweet" />
	<br/>
	<input type="submit" name="save_tweet" value="Tweet Tweet!"/>
</form>

<?php

$user_id = intval($_SESSION["user_id"]);

$friends_sql = "SELECT `user_id_being_followed`
				FROM `following`
				WHERE `user_id_following` ='$user_id' ";

// SQL string to get all tweets we want.
$tweets_sql = "SELECT `tweet_id`, `user_id`,`tweet_text`, 
					DATE_FORMAT(`datetime_tweeted`, '%W %b %d %Y %h:%i %p') AS readable_date
				FROM `tweet`
				WHERE `user_id` = '$user_id' OR `user_id` IN ($friends_sql)
				ORDER BY `datetime_tweeted` DESC LIMIT 100";
// execute that SQL
$tweets = query_db($con, $tweets_sql);

// loop through the results!
while ($tweet = mysqli_fetch_array($tweets)) {
	// this will execute for every tweet retrieved
	echo $tweet["user_id"]." user id: ";
	echo stripslashes($tweet["tweet_text"]);
	echo "<br/>at: ".$tweet["readable_date"];
	echo "<br/>";

	if ($user_id == $tweet["user_id"]) {
		// i own this tweet!
		$tweet_id = $tweet["tweet_id"];
		echo "<a href='home.php?delete=$tweet_id'>delete</a><br/>";
	}
	echo "<br/><br/>";
}

?>












