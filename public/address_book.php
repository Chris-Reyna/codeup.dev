<?php


require_once('address_data_store.php');

$blackbook = [];

$filename = "addressbook.csv";


//create instance of object
$book = new AddressDataStore('addressbook.csv');

//assigning a variable to instance that is accessing the return from the method
$blackbook = $book->read_address_book();

//instance accessing method 2 passing variable assigned to return of method 1
$book->write_address_book($blackbook);

if (file_exists($filename)){
$book -> read_address_book($filename);
}else{
	$blackbook = [];
}

$error = 'Please fill out required fields';

if (!empty($_POST)) {
	$contactname = $_POST['contactname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$entry = [$contactname, $address, $city, $state, $zip, $phone];

	
	if (empty($contactname) || empty($address) || empty($city) || empty($state) || empty($zip)){
		echo $error;
	}else {
		array_push($blackbook, $entry);
		$book-> write_address_book($blackbook);
	}

}

if (isset($_GET['remove'])) {
    $info = $_GET['remove'];
    unset($blackbook[$info]);
    $book->write_address_book($blackbook);

    header("Location: address_book.php");
    exit;
}
if (count($_FILES) > 0 && $_FILES['upload_file']['error'] == 0) {
    // Set the destination directory for uploads
    $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
    // Grab the filename from the uploaded file by using basename
    $pathname = basename($_FILES['upload_file']['name']);
    // Create the saved filename using the file's original name and our upload directory
    $saved_filename = $upload_dir . $pathname;
    // Move the file from the temp location to our uploads directory
    move_uploaded_file($_FILES['upload_file']['tmp_name'], $saved_filename);
    
    $newbook= new AddressDataStore($saved_filename);
    $newItems = $newbook->read_address_book();
    
    $blackbook = array_merge($blackbook, $newItems);
    
    $book->write_address_book($blackbook);
}


?>

<!DOCTYPE>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>CONTACTS</h1>
			<table border="2" style="width:500px">
				<tr>
					<th>NAME</th>
					<th>ADDRESS</th>
					<th>CITY</th>
					<th>STATE</th>
					<th>ZIPCODE</th>
					<th>PHONE#</th>
				</tr>
				    <? foreach ($blackbook as $key => $entry) { ?> 
				    	<tr>
				    		<? foreach ($entry as $item) { ?>
				    			<td>
				    				<?= htmlspecialchars(strip_tags($item)); ?> 
				    			</td>		
				    		<? } ?> <td><a href= "?remove=<?= $key?>">Delete Contact</a></td>
				    	</tr> 
				   <? } ?> 			 
			</table>
		<h3>Upload File</h3>
        <form method="POST" enctype="multipart/form-data" action="address_book.php">
            <p>
              <label for="upload_file">File to upload</label>
            <input type="file" id="upload_file" name="upload_file">
            </p>
            <p>
                <input type="submit" value="Upload">
            </p>
        </form>
		<h3>Contact Information</h3>
		<form method="POST" action="">
	    	<p>
	        	<label for="contactname">Contact name</label>
	        	<input id="contactname" name="contactname" placeholder="Enter Name" autofocus= "autofocus" type="text" required>
	    	</p>
	    	<p>
	        	<label for="address">Home Address</label>
	        	<input id="address" name="address" placeholder="Enter Address" type="text" required> 
	    	</p>
	    	<p>
	    		<label for="city">City</label>
	    		<input id="city" name="city" placeholder="Enter City" type="text" required>
	    	</p>
	    	<p>
	    		<label for="state">State</label>
	    		<input id="state" name="state" placeholder="Enter State" type="text" required>
	    	</p>
	    	<p>
	    		<label for="zip">Zipcode</label>
	    		<input id="zip" name="zip" placeholder="Enter Zipcode" type="text" required>
	    	</p>
	    	<p>
	    		<label for="phone">Phone Number</label>
	    		<input id="phone" name="phone" placeholder="Enter Phone Number" type="text">
	    	</p>
	    	<p>
	        	<button type="submit">SUBMIT</button>
	    	</p>
		</form>
	</body>
</html>
