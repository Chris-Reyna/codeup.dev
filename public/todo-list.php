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
				//load file return an array
    			function openFile($filename) {
    				$handle = fopen($filename, "r");
    				$content = fread($handle, filesize($filename));
    				fclose($handle);
    				return explode("\n", $content);
    			}
    			//save an array to a flat file
    			function saveFile($filename, $items) {
    				$itemStr = implode("\n", $items);
    				$handle = fopen($filename, "w");
    				fwrite($handle, $itemStr);
    				fclose($handle);
    			}

    			$items = openFile($filename);

    			//Load file
    			if (isset($_POST['TASK']) && !empty($_POST['TASK'])) {
    				$item = $_POST['TASK'];
    				array_push($items, $item);
    				saveFile($filename, $items);
    			}
    			//remove
    			if (isset($_GET['remove'])) {
    				$item2 = $_GET['remove'];
    				unset($items[$item2]);
    				saveFile($filename, $items);

    				header("Location: todo-list.php");
    				exit;
    			}
				foreach ($items as $key => $item) {
						echo "<li>$item | <a href=\"?remove=$key\">Mark as complete</a> </li>";
				};
				
				?>
			</ul>

			<h3>Add Tasks to list</h3>
		<form method="POST" action="todo-list.php">
	    	<p>
	        	<label for="TASK">TASK</label>
	        	<input type="text" id="TASK" name="TASK" autofocus= "autofocus"	value="">
	    	</p>
	    	<p>
	        	<button type="submit">ADD</button>
	    	</p>	
		</form>
	</body>
</html>