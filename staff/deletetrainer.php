<?php
session_start();

  include_once '../db.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];

   $query_delete = "DELETE FROM users WHERE id = '$id' AND role ='trainer'";
   $result_delete = $connection->query($query_delete);

header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../index.php');
}
?>