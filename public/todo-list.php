<?php
require_once('todo_mysql.php');
require_once('filestore.php');

//query to get the TODO db
$result = $mysqli->query("SELECT * FROM Lists");
?>
<!DOCTYPE>
<html>
	<head>
		<title>TODO List</title>
        <link rel="stylesheet" href="/css/todo_css_ext.css">
	</head>
	<body>
		<h1 id="main" class="header">TODO List</h1>
		<h2 class="header">LIST of tasks</h2>
			
			<?php
            while ($row = $result->fetch_array()) {
                echo "<ul>";
                echo "<li>" . $row['item'] . "</li>";?>
                <a href="?remove=<?= $row['id']; ?>">Delete</a>
                <?= "</ul>";
            }?>
		<h3 class="header">Add Tasks to list</h3>
		<form method="POST" enctype="multipart/form-data" action="todo-list.php">
	    	<p>
	        	<label for="TASK">TASK</label>
	        	<input type="text" id="TASK" name="TASK" autofocus= "autofocus"	value="">
	    	</p>
            <p>
	        	<button type="submit">ADD</button>
	    	</p>	
		</form>

        <h3 id="three" class="header">Upload File</h3>
        <form method="POST" enctype="multipart/form-data" action="todo-list.php">
            <p>
              <label for="upload_file">File to add to list</label>
            <input type="file" id="upload_file" name="upload_file">
            </p>
            <p>
                <input type="submit" value="Upload">
            </p>
        </form>
	</body>
</html>