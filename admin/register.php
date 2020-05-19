<?php
	include('functions/register.php');
	$timestamp = date("YmdHis");
?>
<!DOCTYPE html>
<html>
<head>
	<title>MUSO - login</title>
	<link rel="stylesheet" type="text/css" href="../css/adminpanel.css?v=<?php echo $timestamp;?>">
	<script src="../script/main.js?v=<?php echo $timestamp;?>"></script>
</head>
<body id="loginBody">
<div id="adDiv">
	<div id="logo">
		<a href="#"><img src="../img/logo.png"></a>
	</div>
	<form method="post" name="cForm" onsubmit="return validateRegister()">
		<input type="text" name="name" placeholder="Name">
		<span id="errName"><?php if(isset($_GET['nameErr']))echo $_GET['nameErr']; ?></span>
		<input type="email" name="email" placeholder="Email">
		<span id="errEmail"><?php if(isset($_GET['emailErr']))echo $_GET['emailErr']; ?></span>
		<input type="password" name="password" placeholder="Password">
		<span id="errPassword"><?php if(isset($_GET['passwordErr']))echo $_GET['passwordErr']; ?></span>
		<input type="password" name="confPassword" placeholder="Confirm Password">
		<span id="errConfPassword"><?php if(isset($_GET['confPassword']))echo $_GET['confPassword']; ?></span>
		<input type="submit" name="submit" value="Register">
		<p>Already have an account? <a href="index.php">Log in</a></p>
		
	</form>
</div>
</body>
</html>