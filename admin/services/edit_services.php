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
    }else {
        header("location: services.php");
    }

    $query = "SELECT * from services where id=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id,$title,$description,$photo,$created_date);
    $stmt->store_result();
    $user = $stmt->fetch();

    $errTitle = $errDescription = $errPhoto = $errCreatedDate = "";

    if(isset($_POST['submit'])){
        $title2 = $_POST['title'];
        $title2 = mysqli_real_escape_string($conn, $title2);
        $description2 = $_POST['description'];
        $description2 = mysqli_real_escape_string($conn, $description2);
        $created_date2 = $_POST['date'];
        if(empty($title2)) {
            $errTitle = "Title is required!";
        }elseif (empty($description2)) {
            $errDescription = "Description is required!";
        }
        elseif (empty($created_date2)) {
            $errCreatedDate = "Date is required!";
        }
        else{
            if ($_FILES['fileToUpload']['name'] != '') {
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
                        $photo2 = $target_file;
                    } else {
                        $errPhoto = "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                $photo2 = $photo;
            }
            $sql = "UPDATE services SET title = '$title2', description = '$description2', photo = '$photo2', created_date = '$created_date2' WHERE id = '$id'";
            if($conn->query($sql) === TRUE) {
                header('Location: services.php');
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
    <title>MURO - service edit panel</title>
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
        <form id="editServices" method="post" enctype="multipart/form-data" name="servicesForm" onsubmit="return validateEditServices()" >
            <h3>You are now editing "<?php echo $title; ?>" service !</h3>
            <label>Title:</label><span class="error" id="titlespan"><?php echo $errTitle; ?></span><br>
            <input type="text" name="title" value="<?php echo $title ?>" placeholder="Enter title"><br>
            <label>Description:</label><span class="error" id="descspan"><?php echo $errDescription; ?></span><br>
            <textarea name="description" id="text" placeholder="Type your description..."><?php echo $description; ?></textarea><br>
            <label>Photo:</label><span class="error" id="photospan"><?php echo $errPhoto; ?></span><br>
            <input type="file" name="fileToUpload" accept="image/*"><br>
            <label>Date:</label><span class="error" id="datespan"><?php echo $errCreatedDate; ?></span><br>
            <input type="date" name="date" value="<?php echo($created_date); ?>"><br>
            <input type="submit" name="submit" value="Save">
        </form>
    </div>
</body>
</html>