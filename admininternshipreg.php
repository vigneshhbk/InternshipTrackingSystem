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
                        <div class="top-number"><p>	<?php echo"Welcome ".$_SESSION['username']; ?> </p></div>
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
                        <li><a href="adminbusiness.php">Business</a></li>
                        <li class="active"><a href="admininternship.php">Internship</a></li>
                        <li><a href="adminstudent.php">Studemt</a></li>
                        <li><a href="adminsupervisor.php">Supervisor</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="register" class="container text-center">
	
<form action="sendaddinternship.php" method="post"> 
      
<b><u><center><h2><FONT TYPE="times new roman" color="maroon">INTERNSHIP FORM</font></h2></CENTER></u></b>
<table style="width:100%">
  
 <tr><td  ><br>TITLE        <input type= "text" name="TITLE" id ="TITLE"><br></td></tr>
<tr><td ><BR>WORK HOURS     <input type= "text" name="WORKHOURS" id ="WORKHOURS"><br></td></tr>
<tr><td><BR>BUSINESS TYPE   <input type= "text" name="BUSINESSTYPE" id ="BUSINESSTYPE"><br></td></tr>
<tr><td><BR>PAY             <input type= "text" name="PAY" id ="PAY"><br></td></tr>
<tr><td><BR>START DATE      <input type= "text" name="STARTDATE" id ="STARTDATE"><br></td></tr>
<tr><td><BR>END DATE        <input type= "text" name="ENDDATE" id ="ENDDATE"><br></td></tr>
<tr><td><BR>SEMESTER        <input type= "text" name="SEMESTER" id ="SEMESTER"><br></td></tr>

<tr><td><BR>NUMBER OF POSITIONS: 
		<SELECT NAME="NUMBEROFPOSITIONS">
                 
        <option value="01"> 01</option>
		<option value="02"> 02</option>
		<option value="03"> 03</option>
		<option value="04"> 04</option>
		<option value="05"> 05</option>
		<option value="06"> 06</option>
		<option value="07"> 07</option>
		<option value="08"> 08</option>
		<option value="09"> 09</option>
		<option value="10"> 10</option>
		</select>
		</br></td></tr>
<tr><td><BR>STUDENT EVALUATION: 
		<SELECT NAME="STUDENTEVALUATION">
                 
        <option value="0"> 0</option>
<option value="1"> 1</option>

		</select>
		</br></td></tr>
<tr><td><BR>SUPERVISOR EVALUATION: 
		<SELECT NAME="SUPERVISOREVALUATION">
                 
        <option value="0"> 0</option>
<option value="1"> 1</option>
		</select>
		</br></td></tr>
<tr><td><BR>COMPANY: 
		<SELECT NAME="COMPANYID">
			<option value="01"> 01</option>
			<option value="02"> 02</option>
			<option value="03"> 03</option>
			<option value="04"> 04</option>
			<option value="05"> 05</option>
			<option value="06"> 06</option>
			<option value="07"> 07</option>
			<option value="08"> 08</option>
			<option value="09"> 09</option>
			<option value="20"> 20</option>
		</select>
		</br></td></tr>
<tr><td><BR>ADMINISTRATOR: 
		<SELECT NAME="ADMINISTRATORID">
                 
			<option value="01"> 01</option>
			<option value="02"> 02</option>
			<option value="03"> 03</option>
			<option value="04"> 04</option>
			<option value="05"> 05</option>
			<option value="06"> 06</option>
			<option value="07"> 07</option>
			<option value="08"> 08</option>
			<option value="09"> 09</option>
			<option value="10"> 10</option>
		</select>
		</br></td></tr>
<tr><td><BR>SUPERVISOR: 
		<SELECT NAME="SUPERVISORID">
                 
		<option value="01"> 01</option>
		<option value="02"> 02</option>
		<option value="03"> 03</option>
		<option value="04"> 04</option>
		<option value="05"> 05</option>
		<option value="06"> 06</option>
		<option value="07"> 07</option>
		<option value="08"> 08</option>
		<option value="09"> 09</option>
		<option value="12"> 12</option>
		</select>
		</br></td></tr>
	</table>
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