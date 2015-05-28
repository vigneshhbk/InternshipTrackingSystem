<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dr. Thompson's Logout Page</title>
</head>

<body>
<h1>Goodbye!</h1>
<h2><a href='login.php'>Login</a></h2>
<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
			
	session_unset();
	session_destroy();
?>
</body>
</html>