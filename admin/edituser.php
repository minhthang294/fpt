<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    $nav = 'includes/nav.php';
} elseif ($_SESSION['role'] != 'admin') {
    header('Location: ./index.php');
} else {
    $nav = 'includes/navconnected.php';
    $idsess = $_SESSION['id'];
}
error_reporting(0);
require 'includes/header.php';
require $nav; ?>
<?php require 'includes/editconfirmation.php'; ?>
<?php
include '../db.php';

//get users
$queryuser = "SELECT id, email, firstname, lastname,role,address FROM users WHERE id =" . $_GET['id'];
$resultuser = $connection->query($queryuser);
if ($resultuser->num_rows > 0) {
    // output data of each row
    while ($rowuser = $resultuser->fetch_assoc()) {
        $id_user = $rowuser['id'];
        $firstname = $rowuser['firstname'];
        $lasttname = $rowuser['lastname'];
        $role = $rowuser['role'];
        $email = $rowuser['email'];
        $address = $rowuser['address'];
        ?>


        <div class="container-fluid center-align sign">
            <div class="container">

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#test2">Edit User</a></li>
                        </ul>
                    </div>

                    <div class="container forms">
                        <div class="row">

                            <div id="test2" class="col s12 left-align">
                                <div class="card">
                                    <div class="row">

                                        <form class="col s12" method="POST" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="input-field col s12">
                                                    <select class="icons" name="role" required>
                                                        <option value="trainer">Trainer</option>
                                                        <option value="staff">Training Staff</option>
                                                    </select>
                                                    <label>Role</label>
                                                </div>

                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">email</i>
                                                    <input id="icon_prefix" type="text" name="email" class="validate" value="<?php echo $email; ?>" required>
                                                    <label for="icon_prefix">Email</label>
                                                </div>

                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">home</i>
                                                    <input id="icon_prefix" type="text" name="address" class="validate" value="<?php echo $address; ?>" required>
                                                    <label for="icon_prefix">Address</label>
                                                </div>


                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">face</i>
                                                    <input id="icon_prefix" type="text" name="id" class="validate" value="<?= $_GET['id'] ?>" disabled>
                                                    <label for="icon_prefix">id</label>
                                                </div>

                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">account_circle</i>
                                                    <input id="icon_prefix" type="text" name="firstname" class="validate" value="<?php echo $firstname; ?>" required>
                                                    <label for="icon_prefix">First Name</label>
                                                </div>

                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">perm_identity</i>
                                                    <input id="icon_prefix" type="text" name="lastname" class="validate" value="<?php echo $lasttname; ?>" required>
                                                    <label for="icon_prefix">Last Name</label>
                                                </div>

                                                <div class="input-field col s6">
                                                    <i class="material-icons prefix">lock</i>
                                                    <input id="icon_prefix" type="password" name="password" class="validate value1" required>
                                                    <label for="icon_prefix">New Password</label>
                                                </div>

                                                <div class="center-align">
                                                    <button type="submit" id="confirmed" name="edit" class="btn meh button-rounded waves-effect waves-light ">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="center-align">
                                            <a href="allusers.php"><button class="btn meh button-rounded waves-effect waves-light red">Back</button></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>

<?php require 'includes/footer.php'; ?>