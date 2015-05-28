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
		
		if($searchCriteria == "First Name"){
			$query = $con->prepare("SELECT P.PersonID, P.First_name, P.last_name, S.major  FROM Person P, Student S  WHERE P.personID=s.studentID and  P.First_name LIKE ?"); 
		}
		else if($searchCriteria == "Last Name"){
			$query = $con->prepare("SELECT P.PersonID, P.First_name, P.last_name, S.major  FROM Person P, Student S WHERE P.personID=s.studentID and  P.Last_name LIKE ?"); 		
		}
		else if($searchCriteria == "Major"){
			$query = $con->prepare("SELECT P.PersonID, P.First_name, P.last_name, S.major  FROM Person P, Student S  WHERE P.personID=s.studentID and S.major LIKE ?"); 
		}
		
		$query->bind_param("s", $searchText);
	}
	else{
		$query = $con->prepare("SELECT P.PersonID, P.First_name, P.last_name, S.major  FROM Person P, Student S WHERE P.personID=s.studentID"); 
	}

	$query->execute();
	$query->bind_result($studentID, $firstName, $lastName, $companyName);
	
	
	if ($query->fetch()) {
		echo"<table width=100% border=0>
			<tr>
				<td>Name</td>
				<td>Major</td>
			</tr>";
		
		echo"<tr>
				<td><a href='http://localhost/InternshipTrackingSystem/adminstudentEdit.php?studentID=".$studentID."'>".$firstName.' '.$lastName."</a></td>
				<td>".$companyName."</td>
			</tr>";

		while ($query->fetch()) {
			echo"<tr>
				<td><a href='http://localhost/InternshipTrackingSystem/adminstudentEdit.php?studentID=".$studentID."'>".$firstName.' '.$lastName."</a></td>
				<td>".$companyName."</td>
			</tr>";
		}
		
		echo"</table>";
	}
	else{
		echo "0 results";
	}
	
	$con->close();
?>