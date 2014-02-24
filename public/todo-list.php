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
				$filename = "to_do_list.txt";

				//$items = array('Take out the trash', 'Wash the car', 'Cut the grass', 'Shoot the dog'); 

    			function openFile($filename) {
    				$handle = fopen($filename, "r");
    				$content = fread($handle, filesize($filename));
    				fclose($handle);
    				return explode("\n", $content);
    			}

    			function saveFile($filename, $items) {
    				$itemStr = implode("\n", $items);
    				$handle = fopen($filename, "w");
    				fwrite($handle, $itemStr);
    				fclose($handle);
    			}

    			$items = openFile($filename);

    			


    			// file_add($_POST['TASK']);
    			if (isset($_POST['TASK'])) {
    				$item = $_POST['TASK'];
    				array_push($items, $item);
    			}

				foreach ($items as $key => $item) {
						echo "<li>$item</li>";
				};
				saveFile($filename, $items);
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