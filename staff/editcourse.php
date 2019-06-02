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
          <li class="tab col s3"><a href="">Edit Course</a></li>
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
                      <select class="icons" name="coursecateid" required>
                        <?php
                        include '../db.php';

                        //get trainer
                        $querycate = "SELECT * FROM coursecate";
                        $resultcate = $connection->query($querycate);
                        if ($resultcate->num_rows > 0) {
                          // output data of each row
                          while ($rowcate = $resultcate->fetch_assoc()) {
                            $id_cate = $rowcate['id'];
                            $catename = $rowcate['name']
                            ?>
                            <tr>
                              <option value="<?= $id_cate ?>"><?= $catename ?></option>
                            <?php }
                        }  ?>
                      </select>
                      <label>Category</label>
                    </div>
                    <?php
                    include '../db.php';

                    //get trainer
                    $querycate = "SELECT * FROM courses WHERE id = '$courseid'";
                    $resultcate = $connection->query($querycate);
                    if ($resultcate->num_rows > 0) {
                      // output data of each row
                      while ($rowcate = $resultcate->fetch_assoc()) {
                        $catename = $rowcate['name']
                        ?>
                        <div class="input-field col s6">
                          <i class="material-icons prefix">school</i>
                          <input id="icon_prefix" type="text" name="name" class="validate" required>
                          <label for="icon_prefix"><?= $catename; ?></label>
                        </div>
                      <?php }
                  } ?>

                    <?php require 'includes/editconfirmation.php'; ?>
                    <div class="center-align">
                      <button type="submit" id="confirmed" name="editcourse" class="btn meh button-rounded waves-effect waves-light ">Update</button>
                    </div>
                  </div>
                </form>
                <div class="center-align">
                  <a href="../staff/allcourse.php"><button class="btn meh button-rounded waves-effect waves-light red">Back</button></a>
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