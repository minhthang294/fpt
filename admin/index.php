<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

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
             <div class="card-image">
               <img src="src/img/user.png" alt="" />
             </div>
             <div class="card-stacked">
              <div class="card-content">
                <p>Users Account Managerment</p>
              </div>
               <div class="card-action">
                 <a href="allusers.php" class="blue-text">Learn more</a>
               </div>
             </div>
           </div>
         </div>

         <?php

            include '../db.php';
            //get total users
            $queryusers = "SELECT count(id) as total FROM users WHERE role ='trainer'";
            $resultusers = $connection->query($queryusers);
            if($resultusers->num_rows > 0) {
              while ($rowusers = $resultusers->fetch_assoc()) {
                $totaltrainer = $rowusers['total'];
              }
            }

            //get total ordered commands
            $queryusers = "SELECT count(id) as total FROM users WHERE role = 'staff'";
            $resultusers = $connection->query($queryusers);
            if($resultusers->num_rows > 0) {
              while ($rowusers = $resultusers->fetch_assoc()) {
                $totalstaff = $rowusers['total'];
              }
            }
          ?>
         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i> Total Trainers</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totaltrainer; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card blue lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Total Staffs</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalstaff; ?></h5>
               </div>
             </div>
           </div>
         </div>

         
       </div>
</div>
 <?php require 'includes/footer.php'; ?>
