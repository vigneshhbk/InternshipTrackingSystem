<?php
	
	$internshipID=$_POST['internshipID'];	
	$studentID=$_POST['studentID'];	
	$isPlaced=$_POST['isPlaced'];	
	
	//echo $studentID;
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "root";
	$password = "tiger";
	$dbname   = "internship";
	
	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
		//update		
												
		$queryStudentUpdate = $con->prepare("update interest set isPlaced='".$isPlaced."' where studentID=? and internshipID=?"); 
		$query->bind_param("dd", $studentID, $internshipID);
		//need to add email in student info
		echo "update interest set isPlaced='".$isPlaced."' where studentID=? and internshipID=?";
												
		$queryStudentUpdate->execute();
		$queryPersonUpdate->execute();
	

	
	//$query->bind_result($studentID, $firstName, $lastName, $companyName);
	
	
	/*if ($query->fetch()) {
		echo"<table width=100% border=0>
			<tr>
				<td>Name</td>
				<td>Major</td>
			</tr>";
		
		echo"<tr>
				<td><a href='http://localhost/InternshipTrackingSystem_sharan/adminstudentEdit.php?studentID=".$studentID."'>".$firstName.' '.$lastName."</a></td>
				<td>".$companyName."</td>
			</tr>";

		while ($query->fetch()) {
			echo"<tr>
				<td><a href='http://localhost/InternshipTrackingSystem_sharan/adminstudentEdit.php?studentID=".$studentID."'>".$firstName.' '.$lastName."</a></td>
				<td>".$companyName."</td>
			</tr>";
		}
		
		echo"</table>";
	}
	else{
		echo "0 results";
	}*/
	
	echo "0 results";//for dynamic div 
	
	$con->close();
?>