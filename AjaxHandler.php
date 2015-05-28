<?php
$fieldId = $_GET['FieldId'];
if($fieldId == "filterInternship"){
	filterInternship();
}
else if($fieldId == "displayDetails"){
	displayDetails();
}
else if($fieldId == "applyInternship"){
	applyInternship();
}
else if($fieldId == "displayApplications"){
	displayApplications();
}
else if($fieldId == "withdrawApplication"){
	withdrawApplication();
}

function establishConnection(){
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";
	
	$connection = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
	
	return $connection;
}
	
function filterInternship(){
	$searchText = "%{$_GET['Text']}%";
	$searchCriteria = $_GET['Criteria'];
	
	$con = establishConnection();	
	$query = $con->prepare("CALL FilterInternship(?, ?)"); 
	$query->bind_param("ss", $searchText, $searchCriteria);
	$query->execute();
	$query->bind_result($internshipID, $title, $name);

	if ($query->fetch()) {
		echo"<table width=100% border=0>
			<tr>
				<th>Internship</th>
				<th>Company</th>
			</tr>";
		
		echo"<tr>
				<td><a href='' onclick='displayDetails(".$internshipID.")'>".$title."</a></td>
				<td>".$name."</td>
			</tr>";

		while ($query->fetch()) {
			echo"<tr>
				<td><a href='' onclick='displayDetails(".$internshipID.")'>".$title."</a></td>
				<td>".$name."</td>
			</tr>";
		}
		
		echo"</table>";
	}
	else{
		echo "0 results";
	}
	
	$con->close();
}

function displayDetails(){
	$internID = $_GET['InternshipID'];
	$studentID = $_GET["StudentID"];
	
	$con = establishConnection();
	$query = $con->prepare("CALL DisplayDetails(?, ?)"); 
	$query->bind_param("dd", $internID, $studentID);
	$query->execute();
	$query->bind_result($studentWork_Hours, $isApplied, $internshipID, $title, $workHour, $bType, $pay, $sDate, $eDate, $sem, $noOfPos, $supName, $supEmail, $supPh, $cName);

	if ($query->fetch()) {
		echo"<input type='hidden' id='internshipID' value=".$internshipID."></input>
			<input type='hidden' id='isApplied' value=".$isApplied."></input>
			<input type='hidden' id='studentWork_Hours', value=".$studentWork_Hours."></input>
			<input type='hidden' id='workHour', value=".$workHour."></input>
			<table width=100% border=0>
				<tr>
					<td>Internship</td>
					<td>".$title."</td>
				</tr>
				<tr>
					<td>Work Hour</td>
					<td>".$workHour."</td>
				</tr>
				<tr>
					<td>Business Type</td>
					<td>".$bType."</td>
				</tr>
				<tr>
					<td>Pay </td>
					<td>".$pay."</td>
				</tr>
				<tr>
					<td>Start Date</td>
					<td>".$sDate."</td>
				</tr>
				<tr>
					<td>End Date</td>
					<td>".$eDate."</td>
				</tr>
				<tr>
					<td> Semester</td>
					<td>".$sem."</td>
				</tr>
				<tr>
					<td>Number of Position</td>
					<td>".$noOfPos."</td>
				</tr>
				<tr>
					<td>Supervisor Name</td>
					<td>".$supName."</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>".$supEmail."</td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td>".$supPh."</td>
				</tr>
				<tr>
					<td>Company Name</td>
					<td>".$cName."</td>
				</tr>
			</table>";
	}
	else{
		echo "0 results";
	}
	
	$con->close();
}

function applyInternship(){
	$con = establishConnection();
	$studentID = $_GET["StudentID"];
	$internshipID = $_GET["InternshipID"];

	$query = $con->prepare("CALL ApplyInternship(?, ?)"); 
	$query->bind_param("dd", $studentID, $internshipID);
	$query->execute();

	if ($query) {
		echo "Inserted Successfully";
	}
	else{
		echo "Unable to apply";
	}
	
	$con->close();
}

function displayApplications(){
	$con = establishConnection();
	$studentID = $_GET["StudentID"];

	$query = $con->prepare("CALL DisplayApplications(?)"); 
	$query->bind_param("d", $studentID);
	$query->execute();
	$query->bind_result($internshipID, $title, $companyName, $status);
	
	if ($query->fetch()) {
		echo"<input type='hidden' id='internshipID' value=".$internshipID."></input>
			<table width=100% border=0>
			<tr>
				<th>Internship</th>
				<th>Company</th>
				<th>Status</th>
				<th>Action</th>
			</tr>";
		
		echo"<tr>
				<td>".$title."</td>
				<td>".$companyName."</td>
				<td>".$status."</td>";
				if($status == "Placed"){
					echo"<td><input type='button' value='Withdraw' onclick='withdrawApplication(".$internshipID.");' disabled></input></td>";
				}
				else{
					echo "<td><input type='button' value='Withdraw' onclick='withdrawApplication(".$internshipID.");'></input></td>";
				}
			echo"</tr>";

		while ($query->fetch()) {
			echo"<tr>
				<td>".$title."</td>
				<td>".$companyName."</td>
				<td>".$status."</td>";
				if($status == "Placed"){
					echo"<td><input type='button' value='Withdraw' onclick='withdrawApplication(".$internshipID.");' disabled></input></td>";
				}
				else{
					echo "<td><input type='button' value='Withdraw' onclick='withdrawApplication(".$internshipID.");'></input></td>";
				}
			echo"</tr>";
		}
		
		echo"</table>";
	}
	else{
		echo "0 results";
	}
}

function withdrawApplication(){
	$con = establishConnection();
	$studentID = $_GET["StudentID"];
	$internshipID = $_GET["InternshipID"];

	$query = $con->prepare("CALL WithdrawApplication(?, ?)"); 
	$query->bind_param("dd", $studentID, $internshipID);
	$query->execute();

	if ($query) {
		echo "Withdrew Successfully";
	}
	else{
		echo "Unable to withdraw, please contact your admin!";
	}
	
	$con->close();
}
?>