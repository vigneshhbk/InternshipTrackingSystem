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
			//filterbusiness();
			$('#btnSearch').click(function () {
				var searchKeyword = $('#txtSearch').val();
				var cityKeyword = $('#ddlSearch').val();
			$.post('Filterbusiness.php',{searchData:searchKeyword,citydata:cityKeyword} ,function (data){
				$('#dynamicDiv').html(data);
				return false;
			});
			});
		});
	</script>
	<?php 
		$host     = "localhost";
	$port     = 3306;
	$socket   = ""; 
	$user     = "";
	$password = "";
	$dbname   = "internship";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		

		$query = $con->prepare("SELECT Name,city FROM Business"); 
		$query->execute();
		$query->bind_result($name, $city);
	?>
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
                        <li class="active"><a href="adminbusiness.php">Business</a></li>
                        <li><a href="admininternship.php">Internship</a></li>
                        <li><a href="adminstudent.php">Studemt</a></li>
                        <li><a href="adminsupervisor.php">Supervisor</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <section id="feature" class="transparent-bg">
        <div class="container">
        		 <div>Search Business:</div>
			<input type="text" style="width:400px;" name="txtSearch" id="txtSearch" placeholder="Search by Business Name or city"></input>
			<select id="ddlSearch" name ="ddlSearch">
				<option value="Name">Business Name</option>
				<option value="City">City</option>				
			</select>
			<input type="submit" id="btnSearch" value="Search" ></input>
			<input type="submit" id="btnadd" value="Add" onclick="window.location.href='adminbusinessreg.php'"></input>	
		<div id="dynamicDiv">
			<?php 
				if ($query->fetch()) { ?>
			<table width=100% border=0>
			<tr>
				<td>Business</td>
				<td>City</td>
			</tr>
		
			<tr>
				<td><?php echo $name; ?></td>
				<td><?php echo $city; ?></td>
			</tr>
     <?php 
		while ($query->fetch()) { ?>
		<tr>
				<td> <?php echo $name; ?></td>
				<td> <?php echo $city; ?></td>
			</tr>
		<?php } ?>
		
		</table>
	<?php } ?>
		</div>
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

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>