<?php
if (isset($_POST['add'])) {

  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $encryptedpass = md5($password);


  include '../db.php';
  //get user
  $queryuser_db = "SELECT email FROM users WHERE email LIKE '$email'";
  $resultuser_db = $connection->query($queryuser_db);
  if ($resultuser_db->num_rows > 0) {
    echo "<div class='center-align'>
<button class='btn red waves-effects waves-light'>$email already exists</button><br><br>
</div>";
    die();
  }
  //connecting & inserting data

  $query = "INSERT INTO users(email,
firstname,
lastname,
password,
role) VALUES ('$email',
'$firstname',
'$lastname',
'$encryptedpass',
'$role')";

  if ($connection->query($query) === TRUE) {
    echo "<div class='center-align'>
  <h5 class='black-text'>Welcome <span class='green-text'>$firstname $lastname</span> to our system</h5><br><br>
  </div>";
  } else {
    echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
  }
  $connection->close();
}
