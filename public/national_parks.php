<?php
//connect to data base
// Get new instance of MySQLi object
require_once('national_park_store.php');

$sortCol = $_GET['sort_column'];
$sortOrder = $_GET['sort_order'];

//query to get the parks
$result = $mysqli->query("SELECT * FROM national_parks ORDER BY $sortCol $sortOrder");

//if (!empty($_POST))
	
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
	<form method="POST" action="">
	    	<p>
	        	<label for="pname">Park Name</label>
	        	<input id="pname" name="pname" placeholder="Park Name Here" type="text">
	    	</p>
	    	<p>
	        	<label for="plocation">Location</label>
	        	<input id="plocation" name="plocation" placeholder="Location Here" type="text" required> 
	    	</p>
	    	<p>
	        	<label for="date">Date Established</label>
	        	<input id="date" name="date" placeholder="YYYY-MM-DD" type="text" required>
	    	</p>
	    	<p>
	        	<label for="acre">Acreage</label>
	        	<input id="acre" name="acre" placeholder="Acreage Here" type="number" required>
	    	</p>
	    	<p>
	        	<label for="descript">Description</label>
	        	<textarea id="descript" name="descript" rows="10" cols="50" required></textarea>
	    	</p>

	    	<p>
	        	<button type="submit">Submit Park</button>
	    	</p>
		</form>

</body>
</html>