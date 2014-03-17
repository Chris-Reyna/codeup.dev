<?php
require_once('filestore.php');

$mysqli = new mysqli('127.0.0.1', 'creyna', 'chris', 'TODO');

// Check for errors
if ($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}




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


?>