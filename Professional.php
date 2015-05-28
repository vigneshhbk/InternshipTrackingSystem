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
	
	$query = $con->prepare("Select  s.StudentID, s.Graduate_Date, s.Start_Date, s.Semester, s.GPA , s.Major , s.Residence_Status , s.Date_Of_Birth, s.Work_Hours from STUDENT s where s.StudentID=?");
	$query->bind_param("d", $studentID);
	
	$query->execute();
	$query->bind_result($StudentID, $Graduate_Date, $Start_Date, $Semester, $GPA , $Major , $Residence_Status , $Date_Of_Birth, $Work_Hours);

	if ($query->fetch()) {
		echo"<table width=100% border=0>
			<tr>
				<td>Student ID </td>
				<td>".$StudentID."</td>
			</tr>
			<tr>
				<td>Graduate Date</td>
				<td>".$Graduate_Date."</td>
			</tr>
			<tr>
				<td>Start_Date  </td>
				<td>".$Start_Date."</td>
			</tr>
			<tr>
				<td>Semester </td>
				<td>".$Semester."</td>
			</tr>
			<tr>
				<td>GPA </td>
				<td>".$GPA."</td>
			</tr>
			<tr>
				<td>Major </td>
				<td>".$Major."</td>
			</tr>
			<tr>
				<td>Residence Status</td>
				<td>".$Residence_Status."</td>
			</tr>
			<tr>
				<td>Date_Of_Birth       :</td>
				<td>".$Date_Of_Birth."</td>
			</tr>
			<tr>	
				<td>Work_Hours </td>
				<td>".$Work_Hours."</td>			
			</tr>";
			
		echo"</table>";
	}
	else{
		echo "0 results";
	}
	
	$con->close();
?>