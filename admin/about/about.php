<?php
	require '../functions/db_connect.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../index.php"); // Redirecting To Home Page
    }
    $query = "SELECT * from about";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $errTitle = $errInfo = $errTwitter = '';
    if(isset($_POST['submit'])){
        $id = $row['id'];
        $title = $_POST['title'];
        $title2 = mysqli_real_escape_string($conn, $title);
        $info = $_POST['info'];
        $info2 = mysqli_real_escape_string($conn, $info);
        $twitter = $_POST['twitter'];
        $datetime2 = new DateTime();
        $datetime = $datetime2->format('Y-m-d H:i:s');
        if(empty($title2)){
            $errTitle = "Title should not be empty.";
        } else if(empty($info2)){
            $errInfo = "Info should not be empty.";
        } else if(empty($twitter) || !preg_match("/@([A-Za-z0-9_]{1,15})/",$twitter)){
            $errTwitter = "Invalid twitter username format";
        }else {
            $sql = "UPDATE about SET title = '$title2', info = '$info2', twitter = '$twitter', lastChange = '$datetime' WHERE id = '$id'";
            if($conn->query($sql) === TRUE) {
                header('Location: about.php');
            }
            else {
                echo "Error: <br>" . $conn->error;
            }  
        } 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>MURO - service panel</title>
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
            <li class="active"><a href="about.php">About</a></li>
            <li><a href="../testimonial/testimonial.php">Testimonial</a></li>
            <li><a href="../services/services.php">Services</a></li>
        </ul>
    </div>
    <div id="mainContent">
        <form id="editServices" method="post" class="aboutForm" name="aboutForm" onsubmit="return validateAbout()">
            <h3>About page</h3>
            <label>Title:</label><span class="error" id="errTitle"><?php echo $errTitle; ?></span><br>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Enter title"><br>
            <label>Info:</label><span class="error" id="errInfo"><?php echo $errInfo; ?></span><br>
            <textarea name="info" id="text" placeholder="Type your info..." style="min-width: 700px;min-height: 400px;"><?php echo $row['info']; ?></textarea><br>
            <label>Twitter Username:</label><span class="error" id="errTwitter"><?php echo $errTwitter; ?></span><br>
            <input type="text" name="twitter" value="<?php echo $row['twitter']; ?>"><br>
            <input type="submit" name="submit" value="Save"><br><br>    
            <span>Last change: <?php echo $row['lastChange']; ?> </span>
        </form>
    </div>
</body>
</html>