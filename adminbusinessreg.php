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
                        <div class="top-number"><p>	<?php echo"Welcome ".$_SESSION['username']; ?></p></div>
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
                        <li class="active"><a href="adminbusiness.php">Business</a></li>
                        <li><a href="admininternship.php">Internship</a></li>
                        <li><a href="adminstudent.php">Student</a></li>
                        <li><a href="adminsupervisor.php">Supervisor</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="register" class="container text-center" >
 <img src="images/register.jpg" style="width:304px;height:228px"> 
<form action="sendaddbusiness.php" method="post"> 
<b><u><center><h2><FONT TYPE="times new roman" color="maroon">BUSINESS REGISTRATION FORM</font></h2></CENTER></u></b>

        <table align=center>
			<tr>
				<td>BUSINESS NAME:</td>
               <td><input type='text' style='width:200px;' id='BUSINESSNAME' name='BUSINESSNAME'; ></input></td>
            </tr>
			<tr><br>
			<td>EMAIL:</td>
               <td><input type='text' style='width:200px;' id='EMAIL' name='EMAIL'; ></input></td></br>
            </tr>
			<tr>
				<td>PHONE NUMBER:</td>
               <td><input type='text' style='width:200px;' id='PHONENUMBER' name='PHONENUMBER'; ></input></td>
            </tr>
			<tr>
				<td>STREET:</td>
               <td><input type='text' style='width:200px;' id='STREET' name='STREET'; ></input></td>
            </tr>
			<tr>
				<td>CITY:</td>
               <td><input type='text' style='width:200px;' id='CITY' name='CITY'; ></input></td>
            </tr>
			<tr>
				<td>ZIP:</td>
               <td><input type='text' style='width:200px;' id='ZIP' name='ZIP'; ></input></td>
            </tr>
			
        <tr>
		<td>ADMINISTRATOR:</td>
		<td><SELECT  id='ADMINISTRATOR' name='ADMINISTRATOR';>
                 
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

		</td></tr>
	 </table>
		 
	
<input type="submit" name="submitForm" value=" Submit "  />  <input type="reset" value="Cancel">
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