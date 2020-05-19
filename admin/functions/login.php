<?php
require ('db_connect.php');

session_start();
$error = '';
if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Email or Password is invalid";
	}
	else {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT email,password,type from users where email=?";

		// To protect MySQL injection for Security purpose
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email,$pw,$type);
		$stmt->store_result();
		$user = $stmt->fetch();

		if( count($user) > 0 && password_verify($password, $pw)) {
		    $_SESSION['login_user'] = $email;
		    if($type === 'Admin'){
		    	header("location: ../adminpanel.php");
		    }else if($type === 'User') {
	    		header("location: userpanel.php");
	    	}        
	    }
		else {
		    $error = "Email or Password is invalid";
		}
		mysqli_close($conn);
	}
}
?>
