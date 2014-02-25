<?php
echo "<p>GET:</p>";
var_dump($_GET);

echo "<p>POST:</p>";
var_dump($_POST);

echo "<p>FILE</p>";
var_dump($_FILES);


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
                //Verify there were uploaded files and no errors
                if (count($_FILES) > 0 && $_FILES['upload_file']['error'] == 0) {
                    // Set the destination directory for uploads
                    $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
                    // Grab the filename from the uploaded file by using basename
                    $pathname = basename($_FILES['upload_file']['name']);
                    // Create the saved filename using the file's original name and our upload directory
                    $saved_filename = $upload_dir . $pathname;
                    // Move the file from the temp location to our uploads directory
                    move_uploaded_file($_FILES['upload_file']['tmp_name'], $saved_filename);
                }

                //Check if we saved a file
                if (isset($saved_filename)) {
                    // If we did, show a link to the uploaded file
                    echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
                }
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
				
				<?foreach ($items as $key => $item) : ?>
						<li><?= $item?> | <a href= "?remove=<?= $key?>">Mark as complete</a> </li>
				<? endforeach ?>
                
			</ul>

			<h3>Add Tasks to list</h3>
		<form method="POST" enctype="multipart/form-data" action="todo-list.php">
	    	<p>
	        	<label for="TASK">TASK</label>
	        	<input type="text" id="TASK" name="TASK" autofocus= "autofocus"	value="">
	    	</p>
            <p>
	        	<button type="submit">ADD</button>
	    	</p>	
		</form>
        <h1>Upload File</h1>

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