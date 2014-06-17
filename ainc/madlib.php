<form method="GET" action="madlib.php">
	Name: <input type="text" name="my_name"/><br/>
	Body Part: <input type="text" name="body_part"/><br/>
	Adjective: <input type="text" name="adj"/><br/>
	Noun: <input type="text" name="noun"/><br/>
	Verb: <input type="text" name="verb"/><br/> 

	<input type="submit" value="Go!" name="submit"/>
</form>

<?php

$myData = $_GET;

if (isset($myData["submit"])) {

	$name = $myData["my_name"];
	$body_part = $myData["body_part"];
	$adj = $myData["adj"];
	$noun = $myData["noun"];
	$verb = $myData["verb"];
	 
	echo "Hey, ".$name."! Just writing you today to let you know that my ".$body_part." seems ".$adj." today.";

	echo "<br/> I also got a new ".$adj." ".$noun." last week. It's pretty awesome. I ".$verb." on it all the time now.";
	 
 }
?>