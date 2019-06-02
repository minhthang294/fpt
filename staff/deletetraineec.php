<?php
session_start();

  include_once '../db.php';

if (isset($_GET['idtrainee'])&& isset($_GET['courseid'])) {
   $idtrainee=$_GET['idtrainee'];
   $courseid = $_GET['courseid'];

   $query_delete = "DELETE FROM listtrainee WHERE courseid= '$courseid' AND traineeid = '$idtrainee'";
   $result_delete = $connection->query($query_delete);

header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../index.php');
}
?>