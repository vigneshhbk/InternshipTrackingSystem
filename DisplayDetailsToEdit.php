<?php
	$supervisorID = $_GET['supervisorID'];
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";

	$link = mysql_connect($host,$user,$password);
	$db_selected = mysql_select_db($dbname , $link);


	$query = "SELECT PersonID, First_Name, Last_Name, Email, Phone_Number, Street, City, ZIP, CompanyID from person p, supervisor s where PersonID = $supervisorID and s.supervisorID =  $supervisorID";
	$SupervisorRS = mysql_query($query);
	$query1 = "SELECT name from business b where companyID = (select companyID from supervisor where supervisorID = $supervisorID)";
	$CompanynameRS = mysql_query($query1);
	while($row = mysql_fetch_assoc($SupervisorRS)) {
		echo"<table width=100% border=0>
			<tr>
				<td>Supervisor ID</td>
				<td><div id = \"supid\" >".$row['PersonID']."</div> </td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><div id = \"fname\" contenteditable>".$row['First_Name']."</div></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><div id = \"lname\" contenteditable>".$row['Last_Name']."</div></td>
			</tr>
			<tr>
				<td>Email ID</td>
				<td><div id =\"email\" contenteditable>".$row['Email']."</div></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><div id =\"phone\" contenteditable>".$row['Phone_Number']."</div></td>
			</tr>
			<tr>
				<td>Street</td>
				<td><div id =\"street\" contenteditable>".$row['Street']."</div></td>
			</tr>
			<tr>
				<td>City</td>
				<td><div id =\"city\" contenteditable>".$row['City']."</div></td>
			</tr>
			<tr>
				<td>ZIP Code</td>
				<td><div id =\"zip\" contenteditable>".$row['ZIP']."</div></td>
			</tr>
			<tr>
				<td>CompanyID</td>
				<td>".$row['CompanyID']."</td>
			</tr>
			</table>";
	}	
	while($row = mysql_fetch_assoc($CompanynameRS)) {
		echo"<table width=100% border=0>
		<tr>
				<td>Company Name</td>
				<td>".$row['name']."</td>
		</tr>
		</table>";
	}
		
	mysql_close();
?>