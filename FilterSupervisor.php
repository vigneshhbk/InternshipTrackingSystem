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
		if($searchCriteria == "Name"){
			$query = $con->prepare("select SupervisorID, first_name, last_name, name from person p, Business c, supervisor s where first_name like ? and c.companyID=s.companyID and s.supervisorID=p.personID ");
		}
		else if($searchCriteria == "Company"){
			$query = $con->prepare("select SupervisorID,first_name, last_name, name from person p, Business c, supervisor s where name like ? and s.companyID = c.companyID and p.personID=s.supervisorID"); 		
		}
	
		$query->bind_param("s", $searchText);
	}
	else{
		$query = $con->prepare("select SupervisorID, first_name, last_name, name from person p, Business c, supervisor s where s.companyID = c.companyID and p.personID=s.supervisorID"); 
	}

	$query->execute();
	$query->bind_result($supervisorID, $First_name, $Last_name, $name);

	if ($query->fetch()) {
		echo"<table width=100% border=0>
			<tr>
				<td>Supervisor Name</td>
				<td>Company Name</td>
			</tr>";
		
		echo"<tr>
				<td><a href='' onclick='displayDetailstoedit(".$supervisorID.")'>".$First_name." ".$Last_name." </a> </td>
				<td> ".$name." </td>
			</tr>";

		while ($query->fetch()) {
			echo"<tr>
				<td><a href='' onclick='displayDetailstoedit(".$supervisorID.")'>".$First_name." ".$Last_name."</a></td>
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