<?php
if (isset($_POST['edit'])) {

    $email = $_POST['email'];
    $id = $_GET['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $address = $_POST['address'];

    $encryptedpass = md5($password);


    include '../db.php';
    //update user data

    $query = "UPDATE users SET email = '$email', firstname = '$firstname', lastname = '$lastname', password ='$encryptedpass', role = '$role', address = '$address' WHERE id = ".$id;

    if ($connection->query($query) === TRUE) {
        echo "<div class='center-align'>
  <h5 class='black-text'><span class='green-text'>$firstname $lastname </span> Updated</h5><br><br>
  </div>";
    } else {
        echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
    }
    $connection->close();
}
