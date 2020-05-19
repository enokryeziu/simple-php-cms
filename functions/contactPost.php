<?php include('db_connect.php'); 
	if (isset($_POST['submit'])) {
		$msg = false;
		$name = $_POST['name'];
		$email = $_POST['email'];
		$web = $_POST['web'];
		if(isset($_POST['reason'])){
			$reason = $_POST['reason'];	
		}else {
			$reason = "";
		}
		if(isset($_POST['gender'])){
			$gender = $_POST['gender'];	
		}else {
			$gender = "";
		}
		$message = $_POST['message'];
		if(!empty($_POST['subscribe']))
			$subscribe = 1;
		else {
			$subscribe = 0;
		}
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		$nameTest = test_input($name);
		$emailTest = test_input($email);

		if(empty($name) || !preg_match("/^[a-zA-Z ]*$/",$nameTest)){
			echo "<script>alert('Your name should only contain letters and white spaces.$reason $gender');</script>";
		}else if(empty($email) || !filter_var($emailTest, FILTER_VALIDATE_EMAIL)) {
			echo "<script>alert('Invalid email format.');</script>";
		}else if(empty($reason)){
			echo "<script>alert('Reason is required.');</script>";
		}else if(empty($gender)){
			echo "<script>alert('Gender is required.');</script>";
		}else if(empty($message)){
			echo "<script>alert('Message is required.');</script>";
		}else {
			$query = "INSERT INTO contact VALUES ('','$name','$email','$web','$reason','$gender','$message','$subscribe')";

			if($conn->query($query) === TRUE) {
				$msg = true;
			}
			else {
				echo "Error"; sql . "<br>" ;
			}		
		}

	}
?>