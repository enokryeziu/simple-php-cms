<?php 
	include('functions/contactPost.php');
	$currentPage = 'contact';
	include('parts/header.php');
?>
	<section class="pagestitle">
			<h1>Contact</h1>
		</section>
		<form id="contactForm" name="cForm" onsubmit="return validateForm()" method="post">
			<input  type="text" name="name" placeholder="Your name">
			<input  type="email" name="email" placeholder="Email">
			<input  type="text" name="web" placeholder="Website">
			<select class="selectStyle" name="reason">
				<option value="" disabled selected>Select your option</option>
				<option value="sales">Sales</option>
			  	<option value="helpdesk">Help Desk</option>
			  	<option value="billing">Billing</option>
			  	<option value="support">Support</option>
			  	<option value="other">Other</option>
			</select><br>
			<div id="genderDiv">
			<input type="radio" name="gender" value="male" class="gen" id="male"> <label class="lab">Male</label><br>
  			<input type="radio" name="gender" value="female" class="gen" id="female"> <label class="lab">Female</label><br>
  			</div>
			<textarea name="message" id="text" placeholder="Type your text..."></textarea>	<br>
			<input type="checkbox" name="subscribe" value="subscribe" class="gen"> Subscribe to Muro's newsletters <br>
			<input  type="submit" id="subButton" value="Submit" name="submit">
			<span><?php if(!empty($msg) && $msg === true) echo "<script>alert('Email u dergua me sukses. Brenda 24h do te kthehet pergjigja!');</script>"; ?></span> 
		</form>
		<section id="info">
			<ul>
				<li><img src="img/marker.png"><p>Box 564, Disneyland<br><b>USA</b></p></li>
				<li><img src="img/phone.png"><p>+1 (212) 513 2145</p></li>
				<li><img src="img/email.png"><p>johndoe@muro.com</p></li>
			</ul>
		</section>
<?php include('parts/footer.php'); ?>