<?php 
$address_book = [];
$filename = 'address_book.php';

$handle = fopen('address_book.php', 'w');

foreach ($address_book as $key) {
	fputscsv($handle, $fields);
}
fclose($handle);


?>

<!DOCTYPE>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h3>Contact Information</h3>
		<form method="POST" action="">
	    	<p>
	        	<label for="contactname">Contact name</label>
	        	<input id="contactname" name="contactname" placeholder="Enter Name Here" type="text">
	    	</p>
	    	<p>
	        	<label for="address">Home Address</label>
	        	<input id="address" name="address" placeholder="Enter Address Here" type="text"> 
	    	</p>
	    	<p>
	    		<label for="city">City</label>
	    		<input id="city" name="city" placeholder="Enter City Here" type="text">
	    	</p>
	    	<p>
	    		<label for="state">State</label>
	    		<input id="state" name="state" placeholder="Enter State Here" type="text">
	    	</p>
	    	<p>
	    		<label for="zip">Zipcode</label>
	    		<input id="zip" name="zip" placeholder="Enter Zipcode Here" type="text">
	    	</p>
	    	<p>
	    		<label for="phone">Phone Number</label>
	    		<input id="phone" name="phone" placeholder="Enter Phone Number Here" type="text">
	    	</p>
	    	<p>
	        	<button type="submit">SUBMIT</button>
	    	</p>
		</form>
	</body>
</html>
