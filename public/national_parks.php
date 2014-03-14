<?php
//connect to data base
// Get new instance of MySQLi object
require_once('national_park_store.php');

$sortCol = $_GET['sort_column'];
$sortOrder = $_GET['sort_order'];

//query to get the parks
$result = $mysqli->query("SELECT * FROM national_parks ORDER BY $sortCol $sortOrder");
	
?>


<!DOCTYPE>
<html>
<head>
	<title>National Parks List</title>
</head>
<body>
	<h1><a href="http://en.wikipedia.org/wiki/List_of_national_parks_of_the_United_States">National Parks</a></h1>
	<table border='20'>
		<tr>
			<th>
				<a href="?sort_column=name&sort_order=asc">&uarr;</a>
				Name
				<a href="?sort_column=name&sort_order=desc">&darr;</a>
			</th>
			<th width="10%"><a href="?sort_column=location&sort_order=asc">&uarr;</a>
				Location
				<a href="?sort_column=location&sort_order=desc">&darr;</a>
			</th>
			<th width="7%"><a href="?sort_column=date_established&sort_order=asc">&uarr;</a>
				Est.
				<a href="?sort_column=date_established&sort_order=desc">&darr;</a>
			</th>
			<th><a href="?sort_column=area_in_acres&sort_order=asc">&uarr;</a>
				Area
				<a href="?sort_column=area_in_acres&sort_order=desc">&darr;</a>
			</th>
			<th>Description</th>
		</tr>
	
	<?php
		
	//loop though the data base
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['location'] . "</td>";
		echo "<td>" . $row['date_established'] . "</td>";
		echo "<td>" . $row['area_in_acres'] . "</td>";
		echo "<td>" . $row['description'] . "</td>";
		echo "</tr>";
	}
	?>
	</table>

</body>
</html>