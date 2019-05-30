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



<div class="container-fluid center-align sign">
    <div class="container">

        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#test2">Add Trainee</a></li>
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
                                            <i class="material-icons prefix">assignment_ind</i>
                                            <input id="icon_prefix" type="text" name="name" class="validate" required>
                                            <label for="icon_prefix">Name</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">perm_contact_calendar</i>
                                            <input id="icon_prefix" type="date" name="DoB" class="validate" required>
                                            
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">grade</i>
                                            <input id="icon_prefix" type="number" name="TOEIC" class="validate" required>
                                            <label for="icon_prefix">TOEIC</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">local_activity</i>
                                            <input id="icon_prefix" type="text" name="experience" class="validate" required>
                                            <label for="icon_prefix">Experience</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">laptop</i>
                                            <input id="icon_prefix" type="text" name="programLang" class="validate" required>
                                            <label for="icon_prefix">Programming Language</label>
                                        </div>

                                        <div class="input-field col s6">
                                            <i class="material-icons prefix">school</i>
                                            <input id="icon_prefix" type="text" name="education" class="validate" required>
                                            <label for="icon_prefix">Education</label>
                                        </div>

                                        <?php require 'includes/addconfirmation.php'; ?>
                                        <div class="center-align">
                                            <button type="submit" id="confirmed" name="add" class="btn meh button-rounded waves-effect waves-light ">Add</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="center-align">
                                    <a href="alltrainee.php"><button class="btn meh button-rounded waves-effect waves-light red">Back</button></a>
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