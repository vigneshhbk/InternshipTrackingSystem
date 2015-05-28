<?php
	
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
		
		$internshipid=$_POST['internshipid'];
		$TITLE = $_POST['TITLE'];
		$WORKHOURS = (int)$_POST['WORKHOURS'];
		$BUSINESSTYPE = $_POST['BUSINESSTYPE'];
		$PAY = $_POST['PAY'];
		$STARTDATE = $_POST['STARTDATE'];
		$ENDDATE = $_POST['ENDDATE'];
		$SEMESTER = $_POST['SEMESTER'];
		$NUMBEROFPOSITIONS = (int)$_POST['NUMBEROFPOSITIONS'];
		$STUDENTEVALUATION = $_POST['STUDENTEVALUATION'];
		$SUPERVISOREVALUATION =$_POST['SUPERVISOREVALUATION'];
		$COMPANYID = (int)$_POST['COMPANYID'];
		$ADMINISTRATORID = (int)$_POST['ADMINISTRATORID'];
		$SUPERVISORID = (int)  $_POST['SUPERVISORID'];
		
		
		//$sql = "INSERT INTO business (Name,Email,Phone_Number,Street,City,ZIP,AdministratorID) VALUES ('$business','$EMAIL',$PHONENUMBER,'$STREET','$CITY',$ZIP,$ADMINISTRATOR)";	
		
		/*$sql = "update internship(Title,Work_Hour,Business_Type,Pay,Start_Date,End_Date,Semester,Number_Of_Position,Student_Eval,
				Supervisor_Eval,CompanyID,AdministratorID,SupervisorID) set ('$TITLE',$WORKHOURS,'$BUSINESSTYPE','$PAY',$STARTDATE,$ENDDATE,'$SEMESTER',
				$NUMBEROFPOSITIONS,$STUDENTEVALUATION,$SUPERVISOREVALUATION,$COMPANYID,$ADMINISTRATORID,$SUPERVISORID)";*/
				
				
		$sql =	"update internship set Title='$TITLE',Work_Hour=$WORKHOURS,Business_Type='$BUSINESSTYPE',Pay='$PAY',Start_Date=$STARTDATE,End_Date=$ENDDATE,Semester='$SEMESTER',Number_Of_Position=$NUMBEROFPOSITIONS,
				Student_Eval=$STUDENTEVALUATION,Supervisor_Eval=$SUPERVISOREVALUATION,CompanyID=$COMPANYID,AdministratorID=$ADMINISTRATORID,SupervisorID=$SUPERVISORID where internshipID=$internshipid";
	
//$query = mysqli_query($sql,$con) or die(mysqli_error("Could not write information to the database"));
			
		 
			/*if (mysql_affected_rows($con) == 0) {
				echo 'Your account was not created.';
			} else {
				echo 'Your account was created successfully';
			*/
			
			if ($con->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $con->error;
				}
		
	

	
	$con->close();
?>