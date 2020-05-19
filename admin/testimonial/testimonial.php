<?php
	require '../functions/db_connect.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../index.php"); // Redirecting To Home Page
    }else if($type_session === 'User') {
        header("location: ../userpanel.php");
    }
    $query = "SELECT * from testimonial";
    $result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>MURO - service panel</title>
    <link href="../../css/adminpanel.css?v=<?php echo $timestamp;?>" rel="stylesheet" type="text/css">
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
            <table id="servicesTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Text</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>   
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['text']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['company']; ?></td>

                            <td><a href="edit_testimonial.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                            <td><a href="delete_testimonial.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
            <a class="btnAdd" href="add_testimonial.php">Add a new testimonial</a>
    </div>
</body>
</html>