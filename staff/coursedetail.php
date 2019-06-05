<?php

session_start();

if ($_SESSION['role'] !== 'staff') {
    header('Location: ../index.php');
}

require 'includes/header.php';
require 'includes/navconnected.php';
$id = $_GET['id'];
?>

<div class="container-fluid product-page">
    <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb">Dashboard</a>
                    <a href="allcourse.php" class="breadcrumb">Course Management</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="container form">
    <div class="row">
        <div class="col s12 ">
        <a class="waves-effect waves-light btn-large col s3" href="assigntopic.php?id=<?= $id; ?>"><i class="material-icons left">add</i>Assign Topic</a>
            <div class="col s4">
                <a class="waves-effect waves-light btn-large" href="addtraineec.php?id=<?= $id; ?>"><i class="material-icons left">add</i>Assign Trainee</a>
            </div>
            <div class="nav-wrapper col s5">
                <form method="GET" action="allcourse.php">
                    <div class="input-field">
                        <input name="key" type="search" id="search">
                        <label class="label-icon" for="search">Search Course</label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../db.php';
$courseid = $_GET['id'];
$querycourse = "SELECT * FROM courses WHERE id = '$courseid'";
$resultcourse = $connection->query($querycourse);
if ($resultcourse->num_rows > 0) {
    // output data of each row
    while ($rowcourse = $resultcourse->fetch_assoc()) {
        $coursename = $rowcourse['name'];
        ?>
    <?php }
}  ?>

<div class="container">
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a href="#topic" class="active">Topics of <?= $coursename; ?></a></li>
                <li class="tab col s3"><a href="#trainee">Trainees of <?= $coursename; ?></a></li>
            </ul>
        </div>
        <table class="highlight striped col s12 left-align" id="topic">
            <thead>
                <tr>
                    <th data-field="ID">ID</th>
                    <th data-field="topic">Topic</th>
                    <th data-field="Trainer">Trainer</th>
                    <th data-field="delete">Edit</th>
                    <th data-field="delete">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db.php';
                $querytopic = "SELECT topic.id, topic.name as topicname, CONCAT(users.firstname,' ',users.lastname) as trainer FROM topic 
                JOIN users ON topic.trainerid = users.id 
                JOIN listtopic ON topic.id = listtopic.topicid WHERE listtopic.courseid = '$courseid'";
                $resulttopic = $connection->query($querytopic);
                if ($resulttopic->num_rows > 0) {
                    // output data of each row
                    while ($rowtopic = $resulttopic->fetch_assoc()) {
                        $id_topic = $rowtopic['id'];
                        $topicname = $rowtopic['topicname'];
                        $trainer = $rowtopic['trainer'];
                        ?>
                        <tr>
                            <td><?php echo $id_topic; ?></td>
                            <td><?= $topicname; ?></td>
                            <td><?= $trainer; ?></td>
                            <td><a href="edittopic.php?id=<?= $id_topic; ?>"><i class="material-icons blue-text">edit</i></a></td>
                            <td><a href="deletetopic.php?id=<?= $id_topic; ?>" onclick="return confirm('Are you sure?')" class="material-icons red-text">close</i></a></td>
                        </tr>
                    <?php }
            }  ?>
            </tbody>
        </table>

        <table class="highlight striped" id="trainee">
            <thead>
                <tr>
                    <th data-field="fullname">Full name</th>
                    <th data-field="age">Age</th>
                    <th data-field="DoB">Date of Birth</th>
                    <th data-field="education">Education</th>
                    <th data-field="programLang">Programming Language</th>
                    <th data-field="TOEIC">TOEIC</th>
                    <th data-field="experience">Experience</th>
                    <th data-field="delete">Edit</th>
                    <th data-field="delete">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db.php';

                //get users
                $queryuser = "SELECT *, YEAR(CURDATE()) - YEAR(DoB) AS age FROM trainee
                JOIN listtrainee ON trainee.id = listtrainee.traineeid
                WHERE listtrainee.courseid = '$courseid'";
                $resultuser = $connection->query($queryuser);
                if ($resultuser->num_rows > 0) {
                    // output data of each row
                    while ($rowuser = $resultuser->fetch_assoc()) {
                        $id_user = $rowuser['id'];
                        $name = $rowuser['name'];
                        $age = $rowuser['age'];
                        $DoB = $rowuser['DoB'];
                        $education = $rowuser['education'];
                        $programLang = $rowuser['programLang'];
                        $TOEIC = $rowuser['TOEIC'];
                        $experience = mysqli_real_escape_string($connection, $rowuser['experience']);
                        ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?= $age; ?></td>
                            <td><?= $DoB; ?></td>
                            <td><?= $education; ?></td>
                            <td><?= $programLang; ?></td>
                            <td><?= $TOEIC; ?></td>
                            <td><?= $experience; ?></td>
                            <td><a href="edittrainee.php?id=<?= $id_user; ?>"><i class="material-icons blue-text">edit</i></a></td>
                            <td><a href="deletetraineec.php?idtrainee=<?= $id_user; ?>&courseid=<?= $courseid;?>" onclick="return confirm('Are you sure?')"><i class="material-icons red-text">close</i></a></td>
                        </tr>
                    <?php }
            }  ?>
            </tbody>
        </table>

    </div>
</div>

<?php require 'includes/footer.php'; ?>