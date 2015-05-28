<?php
	//$searchText = "%{$_GET['Text']}%";
	//$searchCriteria = $_GET['Criteria'];
	$studentID=$_POST['studentID'];
	$studentFirstName=$_POST['studentFirstName'];	
	$studentLastName=$_POST['studentLastName'];
	$studentPhoneNumber=$_POST['studentPhoneNumber'];
	$studentStreet=$_POST['studentStreet'];
	$studentCity=$_POST['studentCity'];
	$studentZIP=$_POST['studentZIP'];
	$studentGPA=$_POST['studentGPA'];
	$studentMajor=$_POST['studentMajor'];
	$studentResidenceStatus=$_POST['studentResidenceStatus'];
	$studentSemester=$_POST['studentSemester'];
	$studentDOB=$_POST['studentDOB'];
	$studentStartDate=$_POST['studentStartDate'];
	$studentGraduationDate=$_POST['studentGraduationDate'];
	$studentWorkHours=$_POST['studentWorkHours'];	
	
	$userID=$_POST['userID'];		
	$passwordStudent=$_POST['password'];		

	$internshipIDs=$_POST['internshipIDs'];	
	$placements=$_POST['placements'];	
	
	$skillIDs=$_POST['skillIDs'];
	$skills=$_POST['skills'];	
	$skillDescs=$_POST['skillDescs'];	
	$experiences=$_POST['experiences'];				
	
	//print_r ($internshipIDs[0]);
	/*foreach ($internshipIDs as &$value) {
		echo $value;
	}*/
	//echo $studentID;
	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";
	
	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
	for ($i = 0; $i < count($internshipIDs); ++$i) {
	
	}

		
	if($studentID == 0){
		//insert		
		//$query = $con->prepare(""); 				
		//$query->bind_param("s", $searchText);		
		
		$queryPersonInsert = $con->prepare("insert into Person (First_name,last_name, phone_Number, Street, city, zip, position) values ('".$studentFirstName."', '".$studentLastName."', ".$studentPhoneNumber.", '".$studentStreet."', '".$studentCity."' ,'".$studentZIP."', 'Student')"); 	
		$queryPersonInsert->execute();		
		
		$queryNewStudent=$con->prepare("select max(personID) as maxPerson from person"); 						
		$queryNewStudent->execute();
		$queryNewStudent->bind_result($newPersonID);
		while($queryNewStudent->fetch()){			
		}
		
		$queryStudentInsert = $con->prepare("insert into student (StudentID, Graduate_Date, start_date, semester, GPA,  Major, Residence_Status, Date_Of_Birth, Work_Hours) values (".$newPersonID.", '".$studentGraduationDate."', '".$studentStartDate."', '".$studentSemester."', ".$studentGPA.", '".$studentMajor."',  '".$studentResidenceStatus."', '".$studentDOB."', ".$studentWorkHours." )"); 						
		$queryStudentInsert->execute();	
		
		$queryLoginInsert = $con->prepare("insert into login (userID, personID, password) values ('".$userID."',".$newPersonID.", '".$passwordStudent."' )"); 	
		$queryLoginInsert->execute();
		
		
		 for ($i = 0; $i < count($skillIDs); ++$i) {			
				//insert into skill	 
				$queryInsertSkill = $con->prepare("insert into skill (Description, Name) values ("."'".$skillDescs[$i]."'".", "."'".$skills[$i]."'".")"); 
				$queryInsertSkill->execute();
				
				$queryNewSkillID=$con->prepare("select max(SkillID) as maxSkill from skill"); 				
				$queryNewSkillID->execute();
				$queryNewSkillID->bind_result($newSkillID);
				while($queryNewSkillID->fetch()){			
				}
				$queryInsertStudentSkill = $con->prepare("insert into Student_skills (SkillID, StudentID, years_of_experience) values (".$newSkillID.", ".$newPersonID.", ".$experiences[$i].")"); 
				//echo "insert into Student_skills (SkillID, StudentID, years_of_experience) values (".$newSkillID.", ".$studentID.", ".$experiences[$i].")";				
				$queryInsertStudentSkill->execute();	
				
						 
		 }
		
	}
	else{
		//update														
		$queryStudentUpdate = $con->prepare("update student set 	Graduate_Date='".$studentGraduationDate."', 
													start_date='".$studentStartDate."',
													semester='".$studentSemester."',
													GPA=".$studentGPA.",
													Major='".$studentMajor."',
													Residence_Status='".$studentResidenceStatus."',
													Date_Of_Birth='".$studentDOB."',
													Work_Hours=".$studentWorkHours."
												where StudentID=".$studentID.""); 
		//need to add email in student info
		$queryPersonUpdate = $con->prepare("update person set 	First_name='".$studentFirstName."', 
													last_name='".$studentLastName."',													
													phone_Number=".$studentPhoneNumber.",
													Street='".$studentStreet."',
													city='".$studentCity."',
													zip='".$studentZIP."'													
												where personID=".$studentID.""); 
												
		$queryLoginUpdate = $con->prepare("update login set 	userID='".$userID."' 
												where personID=".$studentID.""); 
		/*foreach ($internshipIDs as &$internshipID) {
			echo $internshipID;
		}*/							
		$queryStudentUpdate->execute();
		$queryPersonUpdate->execute();
		$queryLoginUpdate->execute();
		
		
		//updated or add skills
		 for ($i = 0; $i < count($skillIDs); ++$i) {
			 if($skillIDs[$i]==0){
				//insert into skill	 
				$queryInsertSkill = $con->prepare("insert into skill (Description, Name) values ("."'".$skillDescs[$i]."'".", "."'".$skills[$i]."'".")"); 
				$queryInsertSkill->execute();
				
				$queryNewSkillID=$con->prepare("select max(SkillID) as maxSkill from skill"); 				
				$queryNewSkillID->execute();
				$queryNewSkillID->bind_result($newSkillID);
				while($queryNewSkillID->fetch()){			
				}
				$queryInsertStudentSkill = $con->prepare("insert into Student_skills (SkillID, StudentID, years_of_experience) values (".$newSkillID.", ".$studentID.", ".$experiences[$i].")"); 
				//echo "insert into Student_skills (SkillID, StudentID, years_of_experience) values (".$newSkillID.", ".$studentID.", ".$experiences[$i].")";				
				$queryInsertStudentSkill->execute();				
				
				
			}else{
			
				//update skills
				$queryStudentSkillUpdate = $con->prepare("update student_skills set years_of_experience=".$experiences[$i]." where skillID=".$skillIDs[$i]." and studentID=".$studentID.""); 
				//echo "update student_skills set years_of_experience=".$experiences[$i]." where skillID=".$skillIDs[$i]." and studentID=".$studentID."";

				$querySkillUpdate = $con->prepare("update skill set description="."'".$skillDescs[$i]."'".", name="."'".$skills[$i]."'"." where skillID=".$skillIDs[$i].""); 
				//echo "update skill set description="."'".$skillDescs[$i]."'".", name="."'".$skills[$i]."'"." where skillID=".$skillIDs[$i]."";
				$queryStudentSkillUpdate->execute();
				$querySkillUpdate->execute();			
					
			}
			 
		 }
		 for ($i = 0; $i < count($internshipIDs); ++$i) {			
		
			$queryInterestUpdate = $con->prepare("update interest set isPlaced=".$placements[$i]." where studentID=".$studentID." and internshipID=".$internshipIDs[$i].""); 
			//echo "update interest set isPlaced=".$placements[$i]." where studentID=".$studentID." and internshipID=".$internshipIDs[$i]."";
			$queryInterestUpdate->execute();
		}	
		
		


		//
		/*$query = $con->prepare("select I.internshipID, I.title, C.name, P.isPlaced from Internship I, Business C, Interest P where p.studentID=? and I.internshipId=P.internshipID and c.CompanyID=I.companyID");
		$query->bind_param('d', $studentID);
		$query->execute();
		$query->bind_result($internshipID, $internshipTitle, $companyName, $isPlaced);
		
		while ($query->fetch()) {
			//echo "printing int id and isplaced ".$internshipID." ".$isPlaced;
		}*/

		//
		
	}
	
	$con->close();
?>