<?php
$list = new Filestore('to_do_list.txt');

$items = $list->read();

//Load file
if (isset($_POST['TASK']) && !empty($_POST['TASK'])) {
    $item = $_POST['TASK'];
    array_push($items, $item);
    $list->write($items);
}
//remove
if (isset($_GET['remove'])) {
    $item2 = $_GET['remove'];
    unset($items[$item2]);
    $list->write($items);

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
    $items = array_merge($items, $newitems);
    //var_dump($newitems);
    
$list->write($items);
}
?>