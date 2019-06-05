<?php

session_start();

if ($_SESSION['role'] !== 'staff') {
  header('Location: ../index.php');
}

require 'includes/header.php';
require 'includes/navconnected.php';
?>

<div class="container-fluid product-page">
  <div class="container current-page">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="../index.php" class="breadcrumb">FPT</a>
          <a href="index.php" class="breadcrumb">Dashboard</a>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="container dashboard">
  <div class="row">

    <div class="col s12 m4">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Trainee Management</p>
          </div>
          <div class="card-action">
            <a href="alltrainee.php" class="blue-text">Learn more</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Course Management</p>
          </div>
          <div class="card-action">
            <a href="allcourse.php" class="blue-text">Learn more</a>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card horizontal">
        <div class="card-stacked">
          <div class="card-content">
            <p>Manage Trainer</p>
          </div>
          <div class="card-action">
            <a href="alltrainer.php" class="blue-text">Learn more</a>
          </div>
        </div>
      </div>
    </div>
    <?php

    include '../db.php';
    //get total users
    $queryusers = "SELECT count(id) as total FROM users WHERE role ='trainer'";
    $resultusers = $connection->query($queryusers);
    if ($resultusers->num_rows > 0) {
      while ($rowusers = $resultusers->fetch_assoc()) {
        $totaltrainer = $rowusers['total'];
      }
    }

    //get total ordered commands
    $queryusers = "SELECT count(id) as total FROM users WHERE role = 'staff'";
    $resultusers = $connection->query($queryusers);
    if ($resultusers->num_rows > 0) {
      while ($rowusers = $resultusers->fetch_assoc()) {
        $totalstaff = $rowusers['total'];
      }
    }
    ?>


  </div>
</div>
<?php require 'includes/footer.php'; ?>