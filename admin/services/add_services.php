<?php
    require '../functions/db_connect.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../index.php"); // Redirecting To Home Page
    }else if($type_session === 'User') {
        header("location: ../userpanel.php");
    }
    $errTitle = $errDescription = $errPhoto = $errCreatedDate = "";
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $title = mysqli_real_escape_string($conn, $title);
        $description = $_POST['description'];
        $description = mysqli_real_escape_string($conn, $description);
        $created_date = $_POST['created_date'];
        if(empty($title)) {
            $errTitle = "Title is required!";
        }elseif (empty($description)) {
            $errDescription = "Description is required!";
        }elseif (empty($_FILES["fileToUpload"]["name"])) {
            $errPhoto = "Picture is required!";
        }
        elseif (empty($created_date)) {
            $errCreatedDate = "Date is required!";
        }else{
            $target_dir = "../../img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $errPhoto = "File is not an image.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $errPhoto = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $query = "INSERT INTO services VALUES ('','$title','$description','$target_file','$created_date')";
                    if($conn->query($query) === TRUE) {
                        header('Location: services.php');
                    }
                    else {
                        echo "Error"; sql . "<br>" ;
                    }
                } else {
                    $errPhoto = "Sorry, there was an error uploading your photo.";
                }
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
            <li><a href="../testimonial/testimonial.php">Testimonial</a></li>
            <li class="active"><a href="services.php">Services</a></li>
        </ul>
    </div>
    <div id="mainContent">
        <form method="post" id="editServices"  enctype="multipart/form-data" name="servicesForm" onsubmit="return validateAddServices()" >
            <h3>Add new service</h3>
            <label>Title:</label><span class="error" id="titlespan"><?php echo $errTitle; ?></span><br>
            <input type="text" name="title" placeholder="Enter title"><br>
            <label>Description:</label><span class="error" id="descspan"><?php echo $errDescription; ?></span><br>
            <textarea name="description" id="text" placeholder="Type your description..."></textarea><br>
            <label>Photo:</label><span class="error" id="photospan"><?php echo $errPhoto; ?></span><br>
            <input type="file" name="fileToUpload" accept="image/*"><br>
            <label>Date:</label><span class="error" id="datespan"><?php echo $errCreatedDate; ?></span><br>
            <input type="date" name="created_date"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>    