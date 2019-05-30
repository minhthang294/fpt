<?php
if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $DoB = $_POST['DoB'];
    $TOEIC = $_POST['TOEIC'];
    $experience = $_POST['experience'];
    $education = $_POST['education'];
    $programLang = $_POST['programLang'];



    include '../db.php';
    //connecting & inserting data

    $query = "UPDATE `trainee` SET 
    `name`='$name',`DoB`='$DoB',`education`='$education',`programLang`='$programLang',`TOEIC`='$TOEIC',`experience`='$experience' 
    WHERE id= '$id'";

    if ($connection->query($query) === TRUE) {
        echo "<script>alert('Updated');</script>";
    } else {
        echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
    }
    $connection->close();
}
