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
        echo "<div class='center-align'>
        <h5 class='black-text'><span class='green-text'>Updated</span></h5><br><br>
        </div>";
    } else {
        echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
    }
    $connection->close();
}

if (isset($_POST['editcourse'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $coursecateid = $_POST['coursecateid'];



    include '../db.php';
    //connecting & inserting data

    $query = "UPDATE `trainee` SET 
    `name`='$name',`coursecateid`='$coursecateid'
    WHERE id= '$id'";

    if ($connection->query($query) === TRUE) {
        echo "<div class='center-align'>
        <h5 class='black-text'><span class='green-text'>Updated</span></h5><br><br>
        </div>";
    } else {
        echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
    }
    $connection->close();
}
if (isset($_POST['edittopic'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $trainerid = $_POST['trainerid'];



    include '../db.php';
    //connecting & inserting data

    $query = "UPDATE `topic` SET 
    `name`='$name',`trainerid`='$trainerid'
    WHERE id= '$id'";

    if ($connection->query($query) === TRUE) {
        echo "<div class='center-align'>
        <h5 class='black-text'><span class='green-text'>Updated</span></h5><br><br>
        </div>";
    } else {
        echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
    }
    $connection->close();
}

if (isset($_POST['edittrainer'])) {

    $email = $_POST['email'];
    $id = $_GET['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];



    include '../db.php';
    //update user data

    $query = "UPDATE users SET email = '$email', firstname = '$firstname', lastname = '$lastname', address = '$address' WHERE id = ".$id;

    if ($connection->query($query) === TRUE) {
        echo "<div class='center-align'>
  <h5 class='black-text'><span class='green-text'>$firstname $lastname </span> Updated</h5><br><br>
  </div>";
    } else {
        echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
    }
    $connection->close();
}
