<?php
	$timestamp = date("YmdHis");
	include('functions/login.php'); // Includes Login Script
	if(isset($_SESSION['login_user'])){
		include('functions/session.php');
		if($type_session === 'Admin'){
	    	header("location: adminpanel.php");
	    }else if($type_session === 'User') {
	    	header("location: userpanel.php");
	    }
	}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>MUSO - login</title>
	<link rel="stylesheet" type="text/css" href="../css/adminpanel.css?v=<?php echo $timestamp;?>">
	<style type="text/css">
		form p a{
			color: #e3e3e3;
			text-decoration: none;
		}
	</style>
</head>
<body id="loginBody">
<div id="adDiv">
	<div id="logo">
		<a href="#"><img src="../img/logo.png"></a>
	</div>
	<form action="" method="POST">
		<input type="email" name="email" id="name" placeholder="Email">
		<input type="password" name="password" id="password" placeholder="Password">
		<input name="submit" type="submit" id="login" value="Login">
		<p>Don't have an account? <a href="register.php">Sign Up</a></p>
		<span><?php echo $error; ?></span>
	</form>
</div>
</body>
</html>