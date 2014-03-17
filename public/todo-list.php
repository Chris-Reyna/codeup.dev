<?php
echo "_GET";
var_dump($_GET);
echo "_POST";
var_dump($_POST);
require_once('todo_mysql.php');
require_once('filestore.php');


if(!empty($_POST['TASK'])){
// // Create the prepared statement
$stmt = $mysqli->prepare("INSERT INTO Lists (item) VALUES (?)");

// bind parameters
$stmt->bind_param("s", $_POST['TASK']);

// execute query, return result
$stmt->execute();
}

//remove
if (isset($_GET['remove'])) {
    // // Create the prepared statement
    $stmt = $mysqli->prepare("DELETE FROM Lists WHERE id = ?");
    $test = $_GET['remove'];

    if(!$stmt){
        throw new Exception("Error Processing Request", 1);
        
    }

    // bind parameters
    $stmt->bind_param("s", $test);

    // execute query, return result
    $stmt->execute();

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
   
    $newlist= new Filestore($saved_filename);
    $newitems = $newlist->read($newlist);

    foreach ($newitems as $key => $value) {
        // // Create the prepared statement
        $stmt = $mysqli->prepare("INSERT INTO Lists (item) VALUES (?)");

        // bind parameters
        $stmt->bind_param("s", $value);

        // execute query, return result
        $stmt->execute();
                # code...
    }
 }       
//query to get the parks
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