<?php
    require '../functions/db_connect.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../index.php"); // Redirecting To Home Page
    }else if($type_session === 'User') {
        header("location: ../userpanel.php");
    }
    $errText = $errName = $errTitle = $errCompany = "";
    if(isset($_POST['submit'])){
        $text = $_POST['text'];
        $text = mysqli_real_escape_string($conn, $text);
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($conn, $name);
        $title = $_POST['title'];
        $title = mysqli_real_escape_string($conn, $title);
        $company = $_POST['company'];
        $company = mysqli_real_escape_string($conn, $company);
        if(empty($text)) {
            $errText = "Text is required!";
        }elseif (empty($name)) {
            $errName = "Name is required!";
        }elseif (empty($title)) {
            $errTitle = "Title is required!";
        }elseif (empty($company)) {
            $errCompany = "Company is required!";
        }else{
            $query = "INSERT INTO testimonial VALUES ('','$text','$name','$title','$company')";
            if($conn->query($query) === TRUE) {
                header('Location: testimonial.php');
            }
            else {
                echo "Error"; sql . "<br>" ;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>MURO - service add panel</title>
    <link href="../../css/adminpanel.css?v=<?php echo $timestamp;?>" rel="stylesheet" type="text/css">
    <script src="../../script/main.js?v=<?php echo $timestamp;?>"></script>
</head>
<body>
    <div id="topbar">
        <a href="#"><img src="../../img/logo.png"></a>
        <p><a href="../functions/logout.php">Log Out</a></p>
        <p>Welcome: <?php echo $login_session; ?></p>
    </div>
    <div id="sidebar">
        <ul>
            <li><a href="../adminpanel.php">Dashboard</a></li>
            <li><a href="../about/about.php">About</a></li>
            <li class="active"><a href="testimonial.php">Testimonial</a></li>
            <li><a href="../services/services.php">Services</a></li>
        </ul>
    </div>
    <div id="mainContent">
        <form name="testimonial" method="post" id="editServices" onsubmit="return validateTestimonial()">
            <h3>Add new testimonial</h3>
            <label>Name:</label><span class="error" id="namespan"><?php echo $errName; ?></span><br>
            <input type="text" name="name" ><br>
            <label>Text:</label><span class="error" id="textspan"><?php echo $errText; ?></span><br>
            <textarea name="text" id="text"></textarea><br>
            <label>Title:</label><span class="error" id="titlespan"><?php echo $errTitle; ?></span><br>
            <input type="text" name="title"><br>
            <label>Company:</label><span class="error" id="companyspan"><?php echo $errCompany; ?></span><br>
            <input type="text" name="company"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>    