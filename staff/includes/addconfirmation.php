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

if (isset($_POST['addtopic'])) {
  $topicid = $_POST['topicid'];
  $name = $_POST['name'];
  $trainerid = $_POST['trainerid'];
  include '../db.php';
  //connecting & inserting data

  $query1 = "INSERT INTO `topic`(`id`, `name`, `trainerid`) VALUES ('$topicid','$name','$trainerid');";
  $query2 = "INSERT INTO `listtopic`(`topicid`, `courseid`) VALUES ('$topicid','$courseid');";

  if ($connection->query($query1) === TRUE && $connection->query($query2) === TRUE) {
    echo "<div class='center-align'>
  <h5 class='black-text'>Added <span class='green-text'>$name</span> to our system</h5><br><br>
  </div>";
  } else {
    echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
  }
  $connection->close();
}

if (isset($_POST['addtraineec'])) {
  $traineeid = $_POST['traineeid'];
  include '../db.php';
  //connecting & inserting data

  $query = "INSERT INTO `listtrainee`(`courseid`, `traineeid`) VALUES ('$courseid','$traineeid')";

  if ($connection->query($query) === TRUE) {
    echo "<div class='center-align'>
  <h5 class='black-text'>Added <span class='green-text'></span> to our this course</h5><br><br>
  </div>";
  } else {
    echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
  }
  $connection->close();
}
