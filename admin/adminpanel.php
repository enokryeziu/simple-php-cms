<?php
include('functions/session.php');
$timestamp = date("YmdHis");
if(!isset($_SESSION['login_user'])){
	header("location: index.php"); // Redirecting To Home Page
}else if($type_session === 'User') {
	header("location: userpanel.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>MURO - admin panel</title>
	<link href="../css/adminpanel.css?v=<?php echo $timestamp;?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="topbar">
		<a href="#"><img src="../img/logo.png"></a>
		<p><a href="functions/logout.php">Log Out</a></p>
		<p>Welcome: <?php echo $login_session; ?></p>
	</div>
	<div id="sidebar">
		<ul>
			<li class="active"><a href="adminpanel.php">Dashboard</a></li>
			<li><a href="about/about.php">About</a></li>
			<li><a href="testimonial/testimonial.php">Testimonial</a></li>
			<li><a href="services/services.php">Services</a></li>
			
		</ul>
	</div>
	<div id="mainContent">
		<h1>WELCOME</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</body>
</html>