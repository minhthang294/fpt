<?php

if (isset($_POST['login'])) {


$email = $_POST['emaillog'];
$password=md5($_POST['passworddb']);
include 'db.php';
$email=mysqli_real_escape_string($connection, $email);
$query = "SELECT * FROM users WHERE email='{$email}' and password = '{$password}'";
$select_user_query = mysqli_query($connection, $query);


if (!$select_user_query) {
DIE("QUERY FAILED". mysqli_error($connection));
}
$row = mysqli_fetch_array($select_user_query);

$user_id = $row['id'];
$user_email = $row['email'];
$user_password = $row['password'];
$user_firstname= $row['firstname'];
$user_lastname= $row['lastname'];
$user_role = $row['role'];


if ($email !== $user_email && $password !== $user_password) {
echo "<div class='center-align meh'>
  <h5 class='red-text'>Wrong Info</h5>
</div>";
}



else{
  if($user_role == 'admin'){

    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'admin';
    $_SESSION['logged_in']= 'True';
    echo "<meta http-equiv='refresh' content='0;url=admin/index.php' />";
  }
  if($user_role == 'staff'){

    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'staff';
    $_SESSION['logged_in']= 'True';
    echo "<meta http-equiv='refresh' content='0;url=staff/index.php' />";
  }
  if($user_role == 'trainer'){

    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'trainer';
    $_SESSION['logged_in']= 'True';
    echo "<meta http-equiv='refresh' content='0;url=trainer/index.php' />";
  }
 }
}

?>
