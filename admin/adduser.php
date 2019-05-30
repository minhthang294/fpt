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



<div class="container-fluid center-align sign">
  <div class="container">

    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a href="#test2">Add User</a></li>
        </ul>
      </div>

      <div class="container forms">
        <div class="row">

          <div id="test2" class="col s12 left-align">
            <div class="card">
              <div class="row">

                <form class="col s12" method="POST" enctype="multipart/form-data">
                  <div class="row">

                    <div class="input-field col s6">
                      <i class="material-icons prefix">email</i>
                      <input id="icon_prefix" type="text" name="email" class="validate" required>
                      <label for="icon_prefix">Email</label>
                    </div>

                    <div class="input-field col s6">
                      <select class="icons" name="role" required>
                        <option value="trainer">Trainer</option>
                        <option value="staff">Training Staff</option>
                      </select>
                      <label>Role</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="icon_prefix" type="text" name="firstname" class="validate" required>
                      <label for="icon_prefix">First Name</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">perm_identity</i>
                      <input id="icon_prefix" type="text" name="lastname" class="validate" required>
                      <label for="icon_prefix">Last Name</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">lock</i>
                      <input id="icon_prefix" type="password" name="password" class="validate value1" required>
                      <label for="icon_prefix">Password</label>
                    </div>

                    <div class="input-field col s6">
                      <i class="material-icons prefix">lock</i>
                      <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
                      <label for="icon_prefix">Confirm Password</label>
                    </div>


                    <?php require 'includes/addconfirmation.php'; ?>
                    <div class="center-align">
                      <button type="submit" id="confirmed" name="add" class="btn meh button-rounded waves-effect waves-light ">Add</button>
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


<?php require 'includes/footer.php'; ?>