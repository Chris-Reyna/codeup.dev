<?php

// Get new instance of MySQLi object
$mysqli = new mysqli('127.0.0.1', 'creyna', 'chris', 'codeup_mysqli_test_db');

// Check for errors
if ($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}

$parks = [
	['name'=>'Acadia', 'location'=>'Maine', 'description'=>'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.', 'date_established'=> '1919-02-26', 'area_in_acres'=> '47,389.67']
	
];

foreach ($parks as $park)
$query = "INSERT INTO national_parks(name, location, description, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['description']}',
	'{$park['date_established']}', '{$park['area_in_acres']}');";
    $mysqli->query($query);

echo $mysqli->host_info . "\n";



?>