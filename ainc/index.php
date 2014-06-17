<?php
	$greeting = "Waddup, ";
	$name = "Tommy";
	$lastname = "Crush";
	echo $greeting.$name;

	echo "<br/><br/>";

	if ($name == "fred") {
		echo "Yes, your name is fred";
	
	} else if ($name == "Tommy") {
		echo "Hey Tommy!!!!!";

	} else {
		echo "You are a stranger. Stranger Danger!";
	}

	echo "<br/><br/>";

	if ($name == "Tommy" or $lastname == "Crush") {
		echo "You are Tommy Crush";
	}


function sayMyName($name) {
	echo "Hello, ".$name."<br/>";
}

sayMyName("Mark Zuckerburg");
sayMyName("Bob Smith");
sayMyName("John Doe");


$people = array(
	"Tommy Crush",
	"Brian Raney",
	"Nick Such",
	"David Booth",
);

echo "<br>";
echo "Let's say hi to AInc<br/>";
foreach ($people as $person) {
	sayMyName($person);
}

// lets say hello to the first person
sayMyName($people[0]);

$names = array(
	"Tommy" => "Crush",
	"Brian" => "Raney",
	"Nick" => "Such",
);

foreach ($names as $firstname => $lastname) {
	echo $firstname."'s last name is ".$lastname."<br/>";
}


echo "<br>";
echo $names["Tommy"];

$settings = array(
	"bgColor" => "#ffffff",
);

echo $settings["bgColor"];




















