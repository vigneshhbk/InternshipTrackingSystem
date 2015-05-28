<?php
	$searchText = "%{$_GET['Text']}%";
	$searchCriteria = $_GET['Criteria'];
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
	if($_GET['Text'] != null){
		if($searchCriteria == "Title"){
			$query = $con->prepare("SELECT i.Title, b.Name FROM Internship i INNER JOIN Business b ON i.CompanyID = b.CompanyID WHERE Title LIKE ?"); 
		}
		else if($searchCriteria == "Semester"){
			$query = $con->prepare("SELECT i.Title, b.Name FROM Internship i INNER JOIN Business b ON i.CompanyID = b.CompanyID WHERE Semester LIKE ?"); 		
		}
		else if($searchCriteria == "Business_Type"){
			$query = $con->prepare("SELECT i.Title, b.Name FROM Internship i INNER JOIN Business b ON i.CompanyID = b.CompanyID WHERE Business_Type LIKE ?"); 
		}
		
		$query->bind_param("s", $searchText);
	}
	else{
		$query = $con->prepare("SELECT i.Title, b.Name FROM Internship i INNER JOIN Business b ON i.CompanyID = b.CompanyID"); 
	}

	$query->execute();
	$query->bind_result($title, $name);

	if ($query->fetch()) {
		echo"<table width=100% border=0>
			<tr>
				<td>Internship</td>
				<td>Company</td>
			</tr>";
		
		echo"<tr>
				<td>".$title."</td>
				<td>".$name."</td>
			</tr>";

		while ($query->fetch()) {
			echo"<tr>
				<td>".$title."</td>
				<td>".$name."</td>
			</tr>";
		}
		
		echo"</table>";
	}
	else{
		echo "0 results";
	}
	
	$con->close();
?>