<?php

// Get new instance of MySQLi object
$mysqli = new mysqli('127.0.0.1', 'creyna', 'chris', 'codeup_mysqli_test_db');

// Check for errors
if ($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}
// Create the query and assign to var
$query = 'CREATE TABLE national_parks (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(75) NOT NULL,
    location VARCHAR(20) NOT NULL,
    description VARCHAR(500) NOT NULL,
    date_established VARCHAR(20) NOT NULL,
    area_in_acres VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);';

if (!$mysqli->query($query)) {
    throw new Exception("Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error);
}

echo $mysqli->host_info . "\n";

?>