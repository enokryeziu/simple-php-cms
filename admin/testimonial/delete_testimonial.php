<?php
    require '../functions/db_connect.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "DELETE FROM testimonial WHERE id= " . $id;
    $query = $conn->prepare($query);

    $query->execute();


    header("Location: testimonial.php");