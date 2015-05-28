<?php
	$studentID=$_POST['StudentID'];
	
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";
	
	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
	if($studentID == 0){
		//do nothing
		
		$query = $con->prepare(""); 
				
		//$query->bind_param("s", $searchText);
	}
	else{
		
		//delete
		$delQuery= $con->prepare("delete from interest where studentID=".$studentID.""); 
		$delQuery->execute();
		$delQuery= $con->prepare("delete from student_skills where studentID=".$studentID.""); 
		$delQuery->execute();
		$delQuery= $con->prepare("delete from student where studentID=".$studentID.""); 
		$delQuery->execute();
		$delQuery= $con->prepare("delete from login where personID=".$studentID.""); 
		$delQuery->execute();
		$delQuery= $con->prepare("delete from person where personID=".$studentID.""); 
		$delQuery->execute();
		
	}
	
	$con->close();
	
	echo "student id ".$studentID;
?>