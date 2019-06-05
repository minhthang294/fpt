<?php

session_start();

if ($_SESSION['role'] !== 'trainer') {
  header('Location: ../index.php');
}

require 'includes/header.php';
require 'includes/navconnected.php';
$id_trainer = $_SESSION['id'];
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

    <div class="col s12 m6">
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

    <div class="col s12 m6">
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
  </div>
</div>
<?php require 'includes/footer.php'; ?>