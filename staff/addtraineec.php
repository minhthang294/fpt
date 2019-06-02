<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
  $nav = 'includes/nav.php';
} elseif ($_SESSION['role'] != 'staff') {
  header('Location: ./index.php');
} else {
  $nav = 'includes/navconnected.php';
  $idsess = $_SESSION['id'];
}
error_reporting(0);
require 'includes/header.php';
require $nav; ?>
<?php $courseid = $_GET['id'] ?>
<div class="container-fluid center-align sign">
  <div class="container">

    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a href="">Add Ttrainee to course</a></li>
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
                      <select class="icons" name="traineeid" required>
                        <?php
                        include '../db.php';

                        //get trainer
                        $querytrainee = "SELECT id, name FROM trainee";
                        $resulttrainee = $connection->query($querytrainee);
                        if ($resulttrainee->num_rows > 0) {
                          // output data of each row
                          while ($rowtrainee = $resulttrainee->fetch_assoc()) {
                            $id_trainee = $rowtrainee['id'];
                            $trainee = $rowtrainee['name'];
                            ?>
                            <tr>
                              <option value="<?= $id_trainee; ?>">ID:<?= $id_trainee;?>. <?= $trainee; ?></option>
                            <?php }
                        }  ?>
                      </select>
                      <label>Trainee</label>
                    </div>

                    <?php require 'includes/addconfirmation.php'; ?>
                    <div class="center-align">
                      <button type="submit" id="confirmed" name="addtraineec" class="btn meh button-rounded waves-effect waves-light ">Add</button>
                    </div>
                  </div>
                </form>
                <div class="center-align">
                  <a href="coursedetail.php?id=<?= $courseid; ?>"><button class="btn meh button-rounded waves-effect waves-light red">Back</button></a>
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