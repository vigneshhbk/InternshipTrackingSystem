<!DOCTYPE html>
<?php  //Start the Session
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
 require('connect.php');
 	$personID='';
if (isset($_POST['username']) and isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT PersonID FROM `login` WHERE UserID='$username' and Password='$password'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);

	if ($count == 1){
		if($row = mysql_fetch_assoc($result))
		{
			$personID = $row['PersonID'];	
		}
		
		$_SESSION['username'] = $username;
		echo "<script type='text/javascript'>var studentID = ".$personID."</script>";
	}
	else{
		echo "Invalid Login Credentials.";
	}
}
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
$query = "SELECT CONCAT(First_Name, ' ', Last_Name) AS Name, Position FROM `person` WHERE personID=$personID"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
echo"hi";
$_SESSION['username'] = $row["Name"];
if(strcasecmp($row['Position'], "ADMIN") == 0 || strcasecmp($row['Position'], "Administrator") == 0){	
	$_SESSION["adminID"] = $personID;
	header('Location: adminbusiness.php'); 		
}
else if(strcasecmp($row['Position'], "STUDENT") ==0){
	$_SESSION['studentID'] = $personID;
	header('Location: stupers.php'); 		
}
 
}else{
?>
 <head>
<title>Internship Tracking System - Login</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body bgcolor="#d3d3d3">
<!-- Form for logging in the users -->

<div class="register-form">
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
  <img src="images/loginlogo.png">
<h1>Login</h1>
<form action="login.php" method="POST">
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" /></p>
 
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" placeholder="password" /></p>
    <input class="btn register" type="submit" name="submit" value="Login" />
    </form>
</div>
<?php } ?>
</body>
</html>