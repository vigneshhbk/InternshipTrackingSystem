<?php
	$searchText = "%{$_POST['searchData']}%";
	$searchCriteria = $_POST['citydata'];
	$host     = "localhost";
	$port     = 3306;
	$socket   = ""; 
	$user     = "";
	$password = "";
	$dbname   = "internship";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		echo "abc";
	if($searchText != null){		
		if($searchCriteria == "Name"){
			$query = $con->prepare("SELECT Name,city FROM Business WHERE Name LIKE ?"); 
		}
		else if($searchCriteria == "City"){
			$query = $con->prepare("SELECT Name,city FROM Business WHERE city LIKE ?"); 		
		}
		$query->bind_param("s", $searchText);
	}
	else{
		$query = $con->prepare("SELECT Name,city FROM Business"); 
	}

	$query->execute();
	$query->bind_result($name, $city);

	if ($query->fetch()) {
		echo"<table width=100% border=0>
			<tr>
				<td>Business</td>
				<td>City</td>
			</tr>";
		
		echo"<tr>
				<td>".$name."</td>
				<td>".$city."</td>
			</tr>";

		while ($query->fetch()) {
			echo"<tr>
				<td>".$name."</td>
				<td>".$city."</td>
			</tr>";
		}
		
		echo"</table>";
	}
	else{
		echo "0 results";
	}
	
	$con->close();
?>