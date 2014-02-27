<?php

$blackbook = [];

$filename = "addressbook.csv";

class AddressDataStore {

    public $filename = '';

    function __construct($file = 'addressbook.csv'){
    	$this->filename = $file;

    }

    function read_address_book(){
    $content=[];
    $handle = fopen($this->filename, "r");
    while(($data = fgetcsv($handle)) !== FALSE){
    	$content[] = $data;
    }
    fclose($handle);
    return $content;
    }

    function write_address_book($addresses_array) {
      $handle = fopen($this->filename, 'w');
		foreach ($addresses_array as $array) {
			fputcsv($handle, $array);
		}
		fclose($handle);
    }

}
//create instance of object
$book = new AddressDataStore();
//instance accessing property and assigning it file
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

// if (isset($_GET['remove'])) {
//     $info = $_GET['remove'];
//     unset($blackbook[$info]);
//     $book->write_address_book($filename, $blackbook);

//     header("Location: address_book.php");
//     exit;
// }

?>

<!DOCTYPE>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>CONTACTS</h1>
			<table>
				<tr>
					<th>NAME</th>
					<th>ADDRESS</th>
					<th>CITY</th>
					<th>STATE</th>
					<th>ZIPCODE</th>
					<th>PHONE#</th>
				</tr>
				    <? foreach ($blackbook as $entry) { ?>
				    	<tr>
				    		<? foreach ($entry as $item) { ?>
				    			<td>
				    				<?= $item; ?>
				    			</td>		
				    		<? } ?> 
				    	</tr>
				   <? } ?>				 
			</table>

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
