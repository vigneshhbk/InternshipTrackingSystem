<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Business | Admin</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">	
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<script src="js/getStudent.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			//filterInternship();
		});
	</script>
    <header id="header">
		<?php if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			
			if(!isset($_SESSION["username"])){
				header('Location: login.php');
				exit();
			}
			
			echo "<script type='text/javascript'>var adminID = ".$_SESSION['adminID']."</script>";
		?>
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><?php echo"Welcome ".$_SESSION['username']; ?></p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><img src="images/logo.png" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
						<!--<li><a href="admin.php">Home</a></li>-->
                        <li ><a href="adminbusiness.php">Business</a></li>
                        <li><a href="admininternship.php">Internship</a></li>
                        <li class="active"><a href="adminstudent.php">Student</a></li>
                        <li><a href="adminsupervisor.php">Supervisor</a></li>
						<li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <section id="feature" class="transparent-bg">
        <div class="container">
			
		<?php

	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "";
	$password = "";
	$dbname   = "internship";
	$studentID=$_GET["studentID"];
	echo "<input type='hidden' id='studentID'; value='".$studentID."'></input>";
	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
	$query = $con->prepare("select L.userID, L.password, P.First_name, P.last_name, P.phone_number, P.street, P.city, P.zip, S.gpa, S.major, S.residence_status, S.semester, S.date_of_birth, S.start_date, S.graduate_date, S.work_hours from person P, student S, Login L where S.studentID=L.personID and S.studentID=P.PersonID and S.studentID=?");
	
	
	
	$query->bind_param('d', $studentID);	//d for int s for string	
	$query->execute();
	$query->bind_result($userID, $password, $studentFirstName, $studentLastName, $studentPhoneNumber, $studentStreet, $studentCity, $studentZIP, $studentGPA, $studentMajor, $studentResidenceStatus, $studentSemester,$studentDOB,$studentStartDate, $studentGraduationDate, $studentWorkHours);
	while ($query->fetch()) {}		
	
		echo "
        <table width=100% border=0>
			<tr>
				<td>First Name</td>
               <td><input type='text' style='width:200px;' id='studentFirstName'; value='".$studentFirstName."'></input></td>
            </tr>
            <tr>
				<td>Last Name</td>
                <td><input type='text' style='width:200px;' id='studentLastName' value='".$studentLastName."'></input></td>
			</tr>
            <tr>
				<td>Phone Number</td>
                <td><input type='text' style='width:200px;' id='studentPhoneNumber' value='".$studentPhoneNumber."'></input></td>
			</tr>
            <tr>
				<td>Address</td>               
			</tr>            
            <tr>
				<td>Street</td>
                <td><input type='text' style='width:200px;' id='studentStreet' value='".$studentStreet."'></input></td>
			</tr>
			<tr>
				<td>City</td>
                <td><input type='text' style='width:200px;' id='studentCity' value='".$studentCity."'></input></td>
			</tr>
			<tr>
				<td>ZIP</td>
                <td> <input type='text' style='width:200px;' id='studentZIP' value='".$studentZIP."'></input></td>
			</tr>

			<tr>
				<td>GPA</td>
                <td><input type='text' style='width:200px;' id='studentGPA' value='".$studentGPA."'></input></td>
			</tr>
            
			<tr>
				<td>Major</td>
                <td><input type='text' style='width:200px;' id='studentMajor' value='".$studentMajor."'></input></td>
			</tr>
			<tr>
				<td>Residence status</td>
                <td><input type='text' style='width:200px;' id='studentResidenceStatus' value='".$studentResidenceStatus."'></input></td>
			</tr>

			<tr>
				<td>Semester</td>
                <td><input type='text' style='width:200px;' id='studentSemester' value='".$studentSemester."'></input></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
                <td><input type='text' style='width:200px;' id='studentDOB' value='".$studentDOB."'></input></td>
			</tr>
			<tr>
				<td>Start Date</td>
                <td><input type='text' style='width:200px;' id='studentStartDate' value='".$studentStartDate."'></input></td>
			</tr>
			<tr>
				<td>Graduation Date</td>
                <td><input type='text' style='width:200px;' id='studentGraduationDate' value='".$studentGraduationDate."'></input></td>
			</tr>

			<tr>
				<td>Work Hours</td>
                <td><input type='text' style='width:200px;' id='studentWorkHours' value='".$studentWorkHours."' disabled></input></td>
			</tr> 
            <tr>
				<td>Authorization</td>               
			</tr> 
			<tr>
				<td>User ID</td>
               <td><input type='text' style='width:200px;' id='userID'; value='".$userID."'></input></td>
            </tr>		
			<tr>
				<td>Password</td>
               <td><input type='text' style='width:200px;' id='password'; value='".$password."'></input></td>
            </tr>		
        </table>";
	?>
	
	 <?php 
	$query = $con->prepare("select ss.skillID, Name , Description, Years_of_experience from Skill s, Student_Skills ss where s.skillID=ss.skillid and ss.studentID= ?");
		
	$query->bind_param('d', $studentID);	//d for int s for string	
	$query->execute();
	$query->bind_result($skillID, $skillName, $skillDesc, $experince);
	
	//to do
	//$addSkill=0;
	echo "<br>Student Skills";
	//echo "<input type='submit' id='btnAddSkill' value='Add Skill' onclick=addSkill()></input><br>";	
	echo"<table id='studentSkills'>";	
	echo"<tr><tr>";
	while ($query->fetch()) {
		
		echo"<tr>
				<td><input type='hidden' id='skillID'; value='".$skillID."'></input></td>
				<td>Skill Name</td>
				<!--<td><input type='text' style='width:200px;' id='".$skillName."' value='".$skillName."'></input></td>-->
				<td><input type='text' style='width:200px;' id='skillName' value='".$skillName."'></input></td>
			";
			
		echo"	<td>Skill Description</td>
				<td><input type='text' style='width:200px;' id='skillDesc' value='".$skillDesc."'></input></td>
			";
			
		echo"	<td>Years of experience</td>
				<td><input type='text' style='width:200px;' id='experience' value='".$experince."'></input></td>
			</tr>";				

		}
		
	echo"</table>";
	echo "<input type='submit' id='btnSkill' value='Add Skill' onclick='addSkillRow();'></input>";
	
	
	
	$query = $con->prepare("select  I.internshipID, I.title, C.name, P.isPlaced from Internship I, Business C, Interest P where p.studentID=? and I.internshipId=P.internshipID and c.CompanyID=I.companyID");
	//echo "select I.internshipID, I.title, C.name, P.isPlaced from Internship I, Business C, Interest P where p.studentID=? and I.internshipId=P.internshipID and c.CompanyID=I.companyID";
	$query->bind_param('d', $studentID);
	$query->execute();
	
	//$query->bind_result($internshipID, $internshipTitle, $companyName, $isPlacedDB);
	$query->bind_result($internshipID, $internshipTitle, $companyName, $isPlaced);
	
	/*if($isPlacedDB==1){
		$isPlaced='Yes';
	}
	else if($isPlacedDB==0){
		$isPlaced='No';
	}*/
	
	echo "<br>Student Internships<br>";	
	
	echo"<table id='intern'>";	
	
	$quote='"';
	$rowCount=0;
	while ($query->fetch()) {
		$rowCount++;
		echo"<tr>
				<td><input type='hidden' id='internshipID'; value='".$internshipID."'></input></td>				
				<td>Internship Title</td>
				<!--<td><input type='text' style='width:200px;' id='".$internshipTitle."' value='".$internshipTitle."'></input></td>-->
				<td><input type='text' style='width:200px;' id='internshipTitle' value='".$internshipTitle."' disabled></input></td>
			";
			
		echo"	<td>Company Name</td>
				<td><input type='text' style='width:200px;' id='companyName' value='".$companyName."' disabled></input></td>
			";
			
		
			
		echo"	<td>Is Placed</td>
				<td><input type='text' style='width:200px;' id='isPlaced'  value='".$isPlaced."'></input></td>'
				<!--<td><input type='submit' id='updateStudentIntern' value='Update' onclick='updateStudentIntern(".$internshipID.", ".$studentID.", ".$quote.$isPlaced.$quote.");'></input></td>-->
			</tr>";			
			
		
		}
	
	echo"</table>";
	
		
	$con->close();
?>  
	
	
	<input type="submit" id="btnSave" value="Save" onclick="addStudent();"></input>
    <input type="submit" id="btnDelete" value="Delete" onclick="deleteStudent();"></input>
	<input type="submit" id="btnCancel" value="Cancel" onclick="window.location.href='adminstudent.php'"></input>
	
	<div id="dynamicDiv"></div>
	
        </div><!--/.container-->
    </section><!--/#feature-->


    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 DataNiners. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
</body>
</html>