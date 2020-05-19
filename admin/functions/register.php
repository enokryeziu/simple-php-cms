<?php include('db_connect.php'); 
	$nameErr = $emailErr = $passwordErr = "";
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confPassword = $_POST['confPassword'];
		$hashed_password = password_hash($password,PASSWORD_DEFAULT);
	    
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		$nameTest = test_input($name);
		$emailTest = test_input($email);

		if(empty($name) || !preg_match("/^[a-zA-Z ]*$/",$nameTest)){
			$nameErr = "Registration Faild! Your name should only contain letters and white spaces.";
			header('Location: register.php?nameErr=' .$nameErr );
		}else if(empty($email) || !filter_var($emailTest, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Registration Faild! Invalid email format.";
			header('Location: register.php?emailErr=' .$emailErr );
		}else if(strlen($password) < 8){
			$passwordErr = "Registration Faild! Passwords must be at least 8 characters long.";
			header('Location: register.php?passwordErr=' .$passwordErr );
		}else if($password !== $confPassword){
			$confPassword = "Registration Faild! Password confirmation doesn't match the password!";
			header('Location: register.php?confPassword=' .$confPassword );
		} else {
			$query = "SELECT email from users where email=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email1);
			$stmt->store_result();
			$user = $stmt->fetch();
			if($user > 0){
				$emailErr = "Registration Faild! Email exists in server.";
				header('Location: register.php?emailErr=' .$emailErr );
			}else {
				$query = "INSERT INTO users (name,email,password)
				VALUES ('$name','$email','$hashed_password')";

				if($conn->query($query) === TRUE) {
					header('Location: index.php');
				}
				else {
					echo "Error"; sql . "<br>" ;
				}
			}
		}
	}
?>