<?php
	$studentID = $_GET["StudentID"];
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
	
	$query = $con->prepare("Select p.First_Name, p.Last_Name, p.Position, p.Email, p.Phone_Number , p.Street , p.City , p.ZIP from PERSON p WHERE p.PersonID=?");
	$query->bind_param("d", $studentID);
	
	$query->execute();
	$query->bind_result($First_Name, $Last_Name, $Position, $Email, $Phone_Number , $Street , $City , $ZIP);

	if ($query->fetch()) {
		echo"<table width=100% border=0>
			
			<tr>
				<td>First Name </td>
				<td>".$First_Name."</td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>".$Last_Name."</td>
			</tr>
			<tr>
				<td>Position  </td>
				<td>".$Position."</td>
			</tr>
			<tr>
				<td>Email 	  </td>
				<td>".$Email."</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>".$Phone_Number."</td>
			</tr>
			<tr>
				<td>Street    </td>
				<td>".$Street."</td>
			</tr>
			<tr>
				<td>City      </td>
				<td>".$City."</td>
			</tr>
			<tr>
				<td>ZIP       </td>
				<td>".$ZIP."</td>
			</tr>";
		
		echo"</table>";
	}
	else{
		echo "0 results";
	}
	
	$con->close();
?>