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
            <a href="index.php" class="breadcrumb">Dashboard</a>
            <a href="users.php" class="breadcrumb">Users</a>
          </div>
        </div>
      </nav>
    </div>
   </div>
   <div style="text-align: center;">
   <a class="waves-effect waves-light btn-large" href="adduser.php"><i class="material-icons left">add</i>Add User</a>
   </div>
   
   <div class="container scroll">
     <table class="highlight striped">
        <thead>
          <tr>
              <th data-field="lastname">Full name</th>
              <th data-field="email">email</th>
              <th data-field="role">role</th>
              <th data-field="edit">Edit</th>
              <th data-field="delete">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../db.php';

                  //get users
                  $queryuser = "SELECT id, email, firstname, lastname,role FROM users WHERE role != 'admin'";
                  $resultuser = $connection->query($queryuser);
                  if ($resultuser->num_rows > 0) {
                    // output data of each row
                    while($rowuser = $resultuser->fetch_assoc()) {
                      $id_user = $rowuser['id'];
                      $firstname = $rowuser['firstname'];
                      $lasttname = $rowuser['lastname'];
                      $role = $rowuser['role'];
                      $email = $rowuser['email'];
              ?>
              <tr>
                <td><?php echo" $firstname "." $lasttname"; ?></td>
                <td><?= $email; ?></td>
                <td><?= $role; ?></td>
                <td><a href="edituser.php?id=<?= $id_user; ?>"><i class="material-icons blue-text">edit</i></a></td>
                <td><a href="deleteuser.php?id=<?= $id_user; ?>"><i class="material-icons red-text">close</i></a></td>
              </tr>
              <?php }}  ?>
            </tbody>
          </table>
          </div>

   <?php require 'includes/footer.php'; ?>
