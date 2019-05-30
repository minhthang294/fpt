<?php
if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $DoB = $_POST['DoB'];
  $TOEIC = $_POST['TOEIC'];
  $experience = $_POST['experience'];
  $education = $_POST['education'];
  $programLang = $_POST['programLang'];



  include '../db.php';
  //connecting & inserting data

  $query = "INSERT INTO `trainee`(`name`, `DoB`, `education`, `programLang`, `TOEIC`, `experience`) 
  VALUES ('$name','$DoB','$education','$programLang','$TOEIC','$experience')";

  if ($connection->query($query) === TRUE) {
    echo "<div class='center-align'>
  <h5 class='black-text'>Welcome <span class='green-text'>$name</span> to our system</h5><br><br>
  </div>";
  } else {
    echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
  }
  $connection->close();
}
