<?php 
	require '../functions/db_connect.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../index.php"); // Redirecting To Home Page
    }else if($type_session === 'User') {
        header("location: ../userpanel.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location: testimonial.php");
    }

    $query = "SELECT * from testimonial where id=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id,$text,$name,$title,$company);
    $stmt->store_result();
    $user = $stmt->fetch();

    $errText = $errName = $errTitle = $errCompany = "";

	if(isset($_POST['submit'])){
        $text2 = $_POST['text'];
        $text2 = mysqli_real_escape_string($conn, $text2);
        $name2 = $_POST['name'];
        $name2 = mysqli_real_escape_string($conn, $name2);
        $title2 = $_POST['title'];
        $title2 = mysqli_real_escape_string($conn, $title2);
        $company2 = $_POST['company'];
        $company2 = mysqli_real_escape_string($conn, $company2);
        if(empty($text2)) {
            $errText = "Text is required!";
        }elseif (empty($name2)) {
            $errName = "Name is required!";
        }elseif (empty($title2)) {
            $errTitle = "Title is required!";
        }elseif (empty($company2)) {
            $errCompany = "Company is required!";
        }else{
            $sql = "UPDATE testimonial SET title = '$title2', name = '$name2', text = '$text2', company = '$company2' WHERE id = '$id'";
            if($conn->query($sql) === TRUE) {
                header('Location: testimonial.php');
            }
            else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>MURO - testimonial edit panel</title>
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
        <form id="editServices" method="post" name="testimonial" onsubmit="return validateTestimonial()">
            <h3>You are now editing <?php echo $name."'s"; ?> testimonial  from company <?php echo $company; ?>!</h3>
            <label>Name:</label><span class="error" id="namespan"><?php echo $errName; ?></span><br>
            <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter name"><br>
            <label>Text:</label><span class="error" id="textspan"><?php echo $errText; ?></span><br>
            <textarea name="text" id="text" placeholder="Type your text..."><?php echo $text; ?></textarea><br>
            <label>Title:</label><span class="error" id="titlespan"><?php echo $errTitle; ?></span><br>
            <input type="text" name="title" value="<?php echo $title ?>"><br>
            <label>Company:</label><span class="error" id="companyspan"><?php echo $errCompany; ?></span><br>
            <input type="text" name="company" value="<?php echo($company); ?>"><br>
            <input type="submit" name="submit" value="Save">
        </form>
    </div>
</body>
</html>