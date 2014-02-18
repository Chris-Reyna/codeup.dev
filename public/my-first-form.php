<?php

echo "<p>GET:</p>";
var_dump($_GET);

echo "<p>POST:</p>";
var_dump($_POST);

?>


<!DOCTYPE>
<html>
	<head>
		<title>My First HTML Form</title>
	</head>
	<body>
		<h3>User Login</h3>
		<form method="POST" action="">
	    	<p>
	        	<label for="username">Username</label>
	        	<input id="username" name="username" placeholder="Enter Name Here" type="text">
	    	</p>
	    	<p>
	        	<label for="password">Password</label>
	        	<input id="password" name="password" placeholder="Enter Password Here" type="password"> 
	    	</p>
	    	<p>
	        	<button type="submit">Login</button>
	    	</p>
		</form>
		<h3>Compose an Email</h3>
		<form method="POST" action="">
	    	<p>
	        	<label for="TO">TO</label>
	        	<input type="text" id="TO" name="TO" value="">
	    	</p>
	    	<p>
	        	<label for="FROM">FROM</label>
	        	<input type="text" id="FROM" name="FROM" value="">
	    	</p>
	    	<p>
	        	<label for="SUBJECT">SUBJECT</label>
	        	<input type="text" id="SUBJECT" name="SUBJECT" value="">
	    	</p>
	    	<p>
	    		<label for="BODY">BODY</label>
	    		<textarea id="BODY" name="BODY" rows="10" cols="50"></textarea>
	    	</p>	
	    	<p>
	    		<label for="sent_box">
    				<input type="checkbox" id="sent_box" name="sent_box" value="yes" checked> Would you like to send a copy to your sent folder?
				</label>
	    	</p>
	    	<p>
	        	<button type="submit">Send</button>
	    	</p>
		</form>
		
		<h3>Multiple Choice Test</h3>

		<form method="POST" action="">
	    	<p>What's your favorite color?</p>
	    	<label for="qla">
	    		<input type= "radio" id="qla" name="q1" value="Purple"> Purple
	    	</label>
	    	<label for="qlb">
	    		<input type= "radio" id="qlb" name="q1" value="Green"> Green
	    	</label>
	    	<label for="qlc">
	    		<input type= "radio" id="qlc" name="q1" value="Red"> Red
	    	</label>
	    	<label for="qld">
	    		<input type= "radio" id="qld" name="q1" value="Blue"> Blues
	    	</label>
		
			<p>What brand of cars have you own?</p>
		
			<label for="car1"><input type="checkbox" id="car1" name="car[]" value="Delorean">Delorean</label>
			<label for="car2"><input type="checkbox" id="car2" name="car[]" value="Ford">Ford</label>
			<label for="car3"><input type="checkbox" id="car3" name="car[]" value="Chevy">Chevy</label>
			<label for="car4"><input type="checkbox" id="car4" name="car[]" value="Toyota">Toyota</label>

		<p>Click Done when completed.</p>

		<p>
	        	<button type="submit">Done</button>
	    	</p>
		</form>
		
		<h3>Select Testing</h3>
		<form method="POST" action="">
			<label for="teeth">Did you brush your teeth?</label>
			<select id="teeth" name="teeth">
				<option value=0>NO</option>
				<option value=1 selected>YES</option>
			</select>
			<p>
	        	<button type="submit">Done</button>
	    	</p>	
		</form>
	</body>
</html>