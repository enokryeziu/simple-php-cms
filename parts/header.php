<?php
	$timestamp = date("YmdHis"); // output: 20150715164614
?>
<!DOCTYPE html>
<html>
<head>
	<title>MURO - inspire your inspiration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/main.css?v=<?php echo $timestamp;?>">
	<script src="script/main.js?v=<?php echo $timestamp;?>"></script>
	<script src="script/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.dropdown').hover(function(){
				$(this).children('.child').fadeToggle(100);
			});
		});
	</script>
</head>
<body  <?php if($currentPage =='home'){echo 'onload="autoSlideShow()';}?>">
	<div id="wrapper">
		<header>
			<div class="container">
				<div id="logo">
					<a href="index.php"><img src="img/logo.png"></a>
				</div>
				<nav>
					<ul class="parent">
						<li class="<?php if($currentPage =='home'){echo 'active';}?>"><a href="index.php" >Home</a></li>
						<li class="<?php if($currentPage =='about'){echo 'active';}?>"><a href="about.php">About</a></li>
						<li class="<?php if($currentPage =='services'){echo 'active';}?>"><a href="services.php">Services</a></li>
						<li class="dropdown">
							<a href="#">Blog </a>
							<ul class="child">
								<li><a href="#">Page one</a></li>
								<li><a href="#">Page one</a></li>
							</ul>	
						</li>
						<li class="<?php if($currentPage =='contact'){echo 'active';}?>"><a href="contact.php">Contact</a></li>
					</ul>
				</nav>
			</div>
		</header>