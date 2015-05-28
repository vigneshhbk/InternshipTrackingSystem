<?php
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";
	
	$link = mysql_connect($host,$user,$password);
	$db_selected = mysql_select_db($dbname , $link);
	
	//$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		//or die ('Could not connect to the database server' . mysqli_connect_error());
	
	$fname = $_GET['fname'];
	$supid = $_GET['supid'];
	$lname = $_GET['lname'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$street= $_GET['street'];
	$city  = $_GET['city'];
	$zip   = $_GET['zip'];	
	$query = " UPDATE person SET First_Name='$fname', Last_Name='$lname', Email ='$email',  Phone_Number ='$phone', Street ='$street', City = '$city', ZIP = $zip WHERE PersonID =$supid ";
	mysql_query($query);
	
	echo "success";
	//echo alert("Details updated Successfully"+'$City');
	mysql_close();	
?>
