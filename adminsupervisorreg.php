<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Admin</title>
	<script language="JavaScript" type="text/javascript">
	function ValidateAlpha()
	{	
		var keyCode = window.event.keyCode;
		if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32 && keyCode!=8)
		{
			window.event.returnValue = false;
			alert("Please enter only letters");
		}
	}
	function ValidateNum()
	{
		var keyCode = window.event.keyCode;
		if ((keyCode < 48 || keyCode > 57) && keyCode!=8)
		{
			window.event.returnValue = false;
			alert("Please enter only numbers");
		}
	}

	</script>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	    
    <script src="js/jquery.js"></script>
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
                        <li><a href="adminbusiness.php">Business</a></li>
                        <li><a href="admininternship.php">Internship</a></li>
                        <li><a href="adminstudent.php">Student</a></li>
                        <li class="active"><a href="adminsupervisor.php">Supervisor</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="register" class="container text-center"  >
 <img src="images/register.jpg" style="width:304px;height:228px">    
 <form action = "AddSupervisor.php" method = "POST" /> 
<center>
 <b><u><h2><FONT TYPE="times new roman" color="maroon">SUPERVISOR REGISTRATION FORM</font></h2></u></b>
<table style="text-align:center" border="1" cellspacing="0" cellpadding="10" width=350 height=350>
			<tr>
				<td>First Name</td>
               <td><input type='text' style='width:200px;' name='FirstName'onkeypress="ValidateAlpha()" ></input></td>
            </tr>
            <tr>
				<td>Last Name</td>
                <td><input type='text' style='width:200px;' name='LastName' onkeypress="ValidateAlpha()"></input></td>
			</tr>
			<tr>
				<td>Email ID</td>
                <td><input type='text' style='width:200px;' name='Email' ></input></td>
			</tr>
            <tr>
				<td>Phone Number</td>
                <td><input type='text' style='width:200px;' name='PhoneNumber'onkeypress="ValidateNum()"></input></td>
			</tr>
            <tr>
				<td>Address</td>               
			</tr>            
            <tr>
				<td>Street</td>
                <td><input type='text' style='width:200px;' name='Street'></input></td>
			</tr>
			<tr>
				<td>City</td>
                <td><input type='text' style='width:200px;' name='City' onkeypress="ValidateAlpha()"></input></td>
			</tr>
			<tr>
				<td>ZIP</td>
                <td> <input type='text' style='width:200px;' name='ZIP' onkeypress="ValidateNum()"></input></td>
			</tr>

			<tr>
				<td>COMPANY ID</td>
                <td><input type='text' style='width:200px;' name='CompanyID' onkeypress="ValidateNum()"></input></td>
			</tr>
			<tr>
				<td> <input type="Submit" value="Register"></input></td>        		
				<td> <input type="reset" value="Reset"></input></td>        		
			</tr>
		</table>
</center>
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
</body>
</html>