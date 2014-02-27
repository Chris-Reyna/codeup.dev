<?php 
//var_dump($_POST);

$address_book = [];

$filename = "addressbook.csv";

function openFile($filename) {
    $content=[];
    $handle = fopen($filename, "r");
    while(($data = fgetcsv($handle)) !== FALSE){
    	$content[] = $data;
    }
    fclose($handle);
    return $content;
}

function writeCSV($filename, $arrays){
$handle = fopen($filename, 'w');
foreach ($arrays as $array) {
	fputcsv($handle, $array);
}
	fclose($handle);
}

if (file_exists($filename)){
$address_book = openFile($filename);
}else{
	$address_book = [];
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
		array_push($address_book, $entry);
		writeCSV($filename,$address_book);
	}

}

if (isset($_GET['remove'])) {
    $info = $_GET['remove'];
    unset($address_book[$info]);
    writeCSV($filename, $address_book);

    header("Location: address_book.php");
    exit;


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
				    <? foreach ($address_book as $entry) { ?>
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
