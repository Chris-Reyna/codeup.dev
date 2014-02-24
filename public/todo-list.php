<?php
echo "<p>GET:</p>";
var_dump($_GET);

echo "<p>POST:</p>";
var_dump($_POST);

?>
<!DOCTYPE>
<html>
	<head>
		<title>TODO List</title>
	</head>
	<body>
		<h1>TODO List</h1>
		<h2>LIST of tasks</h2>
			<ul>
				<?php
				$items = array('Take out the trash', 'Wash the car', 'Cut the grass', 'Shoot the dog'); 
					foreach ($items as $key => $value) {
						echo "<li>$value</li>";
					}
				?>
			</ul>

			<h3>Add Tasks to list</h3>
		<form method="POST" action="">
	    	<p>
	        	<label for="TASK">TASK</label>
	        	<input type="text" id="TASK" name="TASK" value="">
	    	</p>
	    	<p>
	        	<button type="submit">ADD</button>
	    	</p>	
		</form>
	</body>
</html>