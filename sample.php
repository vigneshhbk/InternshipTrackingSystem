<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Student</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
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

<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p>	Admin name goes here </p></div>
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
                        <li class="active"><a href="adminbusiness.php">Business</a></li>
                        <li><a href="admininternship.php">Internship</a></li>
                        <li><a href="adminstudent.php">Studemt</a></li>
                        <li><a href="adminsupervisor.php">Supervisor</a></li>
                                                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="register" class="container text-center">
	
<form action="sendaddinternship.php" method="post"> 

<?php

	$host     = "localhost";
	$port     = 3306;
	$socket   = "";
	$user     = "root";
	$password = "";
	$dbname   = "internship";
	$internshipID=2;

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
	$query = $con->prepare("select Title,Work_Hour,Business_Type,Pay,Start_Date,End_Date,Semester,Number_Of_Position,Student_Eval,Supervisor_Eval,CompanyID,AdministratorID,SupervisorID from internship where internshipid=?");
		
		 
	
	$query->bind_param('d', $internshipID);	//d for int s for string	
	$query->execute();
	$query->bind_result($TITLE, $WORKHOURS, $BUSINESSTYPE, $PAY, $STARTDATE, $ENDDATE, $SEMESTER, $NUMBEROFPOSITIONS, $STUDENTEVALUATION, $SUPERVISOREVALUATION,$COMPANYID,$ADMINISTRATORID, $SUPERVISORID);
	while ($query->fetch()) {}
   
    echo " 	 
	<table width=100% border=0>
	
		<tr><td  ><br>TITLE        <input type= 'text'; name='TITLE' ; id ='TITLE' ; value='".$TITLE."'><br></td></tr> 
		<tr><td ><BR>WORK HOURS     <input type= 'text' name='WORKHOURS' id ='WORKHOURS' value='".$WORKHOURS."'><br></td></tr>
		<tr><td><BR>BUSINESS TYPE   <input type= 'text' name='BUSINESSTYPE' id ='BUSINESSTYPE' value='".$BUSINESSTYPE."'><br></td></tr>
		<tr><td><BR>PAY             <input type= 'text' name='PAY' id ='PAY' value='".$PAY."'><br></td></tr>
		<tr><td><BR>START DATE      <input type= 'text' name='STARTDATE' id ='STARTDATE' value='".$STARTDATE."'><br></td></tr>
		<tr><td><BR>END DATE        <input type= 'text' name='ENDDATE' id ='ENDDATE' value='".$ENDDATE."'><br></td></tr>
		<tr><td><BR>SEMESTER        <input type= 'text' name='SEMESTER' id ='SEMESTER' value='".$SEMESTER."'><br></td></tr>

		<tr><td><BR>NUMBER OF POSITIONS: 
				<SELECT NAME='NUMBEROFPOSITIONS' value='".$NUMBEROFPOSITIONS."'>
						 
				<option value='01'> 01</option>
				<option value='02'> 02</option>
				<option value='03'> 03</option>
				<option value='04'> 04</option>
				<option value='05'> 05</option>
				<option value='06'> 06</option>
		    	<option value='07'> 07</option>
				<option value='08'> 08</option>
				<option value='09'> 09</option>
				<option value='10'> 10</option>
				</select>
				</br></td></tr>

		<tr><td><BR>STUDENT EVALUATION: 
				<SELECT NAME='STUDENTEVALUATION' value='".$STUDENTEVALUATION."'>
						 
				<option value='0'> 0</option>
		<option value='1'> 1</option>

				</select>
				</br></td></tr>
		<tr><td><BR>SUPERVISOR EVALUATION: 
				<SELECT NAME='SUPERVISOREVALUATION' value='".$SUPERVISOREVALUATION."'>
						 
				<option value='0'> 0</option>
		<option value='1'> 1</option>
				</select>
				</br></td></tr>
		<tr><td><BR>COMPANY: 
				<SELECT NAME='COMPANYID' value='".$COMPANYID."'>
					<option value='01'> 01</option>
					<option value='02'> 02</option>
					<option value='03'> 03</option>
					<option value='04'> 04</option>
					<option value='05'> 05</option>
					<option value='06'> 06</option>
					<option value='07'> 07</option>
					<option value='08'> 08</option>
					<option value='09'> 09</option>
					<option value='20'> 20</option>
					
				</select>
				</br></td></tr>
		<tr><td><BR>ADMINISTRATOR: 
				<SELECT NAME='ADMINISTRATORID' value='".$ADMINISTRATORID."'>
						 
				<option value='01'> 01</option>
				<option value='02'> 02</option>
				<option value='03'> 03</option>
				<option value='04'> 04</option>
				<option value='05'> 05</option>
				<option value='06'> 06</option>
		    	<option value='07'> 07</option>
				<option value='08'> 08</option>
				<option value='09'> 09</option>
				<option value='10'> 10</option>
				</select>
				</select>
				</br></td></tr>
		<tr><td><BR>SUPERVISOR: 
				<SELECT NAME='SUPERVISORID' value='".$SUPERVISORID."'>				
						 
				<option value='01'> 01</option>
				<option value='02'> 02</option>
				<option value='03'> 03</option>
				<option value='04'> 04</option>
				<option value='05'> 05</option>
				<option value='06'> 06</option>
		    	<option value='07'> 07</option>
				<option value='08'> 08</option>
				<option value='09'> 09</option>
				<option value='12'> 12</option>
				</select>
				</select>
				</br></td></tr>
			</table>";	
			$con->close();
			?>
<BR>
<input type="submit" value="Register">  <input type="reset" value="Cancel">
<BR>
</form>
	  
        
    </section>

    

     <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 DataNiners. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                    
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->


    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>