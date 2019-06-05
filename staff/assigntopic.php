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
          <li class="tab col s3"><a href="">Add Topic to course</a></li>
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
                      <select class="icons" name="topicid" required>
                        <?php
                        include '../db.php';

                        //get trainer
                        $querytopic = "SELECT * FROM topic";
                        $resulttopic = $connection->query($querytopic);
                        if ($resulttopic->num_rows > 0) {
                          // output data of each row
                          while ($rowtopic = $resulttopic->fetch_assoc()) {
                            $id_topic = $rowtopic['id'];
                            $topic = $rowtopic['name'];
                            ?>
                            <tr>
                              <option value="<?= $id_topic; ?>">ID:<?= $id_topic;?>. <?= $topic; ?></option>
                            <?php }
                        }  ?>
                      </select>
                      <label>Topic</label>
                    </div>

                    <?php require 'includes/addconfirmation.php'; ?>
                    <div class="center-align">
                      <button type="submit" id="confirmed" name="assigntopic" class="btn meh button-rounded waves-effect waves-light ">Add</button>
                    </div>
                  </div>
                </form>
                <div class="center-align">
                  <a onclick="window.history.go(-2);"><button class="btn meh button-rounded waves-effect waves-light red">Back</button></a>
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