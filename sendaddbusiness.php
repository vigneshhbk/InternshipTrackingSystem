<?php
	
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
		
		
		$business = $_POST['BUSINESSNAME'];
		$EMAIL = $_POST['EMAIL'];
		$PHONENUMBER = $_POST['PHONENUMBER'];
		$STREET = $_POST['STREET'];
		$CITY = $_POST['CITY'];
		$ZIP = $_POST['ZIP'];
		$ADMINISTRATOR = (int)$_POST['ADMINISTRATOR'];
		
		$sql = "INSERT INTO business (Name,Email,Phone_Number,Street,City,ZIP,AdministratorID) VALUES ('$business','$EMAIL',$PHONENUMBER,'$STREET','$CITY',$ZIP,$ADMINISTRATOR)";	
	
//$query = mysqli_query($sql,$con) or die(mysqli_error("Could not write information to the database"));
			
		 
			/*if (mysql_affected_rows($con) == 0) {
				echo 'Your account was not created.';
			} else {
				echo 'Your account was created successfully';
			*/
			
			if ($con->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $con->error;
				}
		
	

	
	$con->close();
?>