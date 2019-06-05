
<ul id="dropdown2" class="dropdown-content">
<li><a class="blue-text" href="editprofile.php">Edit</a></li>
<li><a class="blue-text" href="logout.php">Log out</a></li>
</ul>
<div class="navbar-fixed">
 <nav class="navblack">
   <div class="nav-wrapper nav-wrapper-2 container white">
   <ul class="left hide-on-med-and-down">
     <li><a href="index.php" class="dark-text">FPT</a></li>
<?php
$id = $_SESSION['id'];
include '../db.php';
$query = "SELECT * FROM users WHERE id = '$id'";
$result = $connection->query($query);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
  }
}
?>

   </ul>
   <ul  class="right hide-on-med-and-down">
       <li><a href="index.php" class="dark-text">TRAINER <?=$firstname; ?> <?= $lastname;?></a></li>
     <li><a href="editprofile.php" class="nohover dropdown-button" class="dropdown-button" href="#!" data-activates="dropdown2"><img class="responsive-img" src="users/default.jpg">
       <i class="fa fa-angle-down dark-text right"></i></a></li>
   </ul>
 </div>
 </nav>
</div>
