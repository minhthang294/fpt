<?php

session_start();

if ($_SESSION['role'] !== 'staff') {
    header('Location: ../index.php');
}

require 'includes/header.php';
require 'includes/navconnected.php';
?>
<div class="container-fluid product-page">
    <div class="container current-page">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb">Dashboard</a>
                    <a href="alltrainee.php" class="breadcrumb">Course Management</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container form">
    <div class="row">
        <div class="col s12 left-align">
            <a class="waves-effect waves-light btn-large col s2" href="addcourse.php"><i class="material-icons left">add</i>Add Course</a>
            <div class="col s4">
            </div>

            <nav class="col s6 right-align teal lighten-2">
                <div class="nav-wrapper">
                    <form method="GET" action="allcourse.php">
                        <div class="input-field">
                            <input id="search" name="key" type="search">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
        </div>

    </div>
</div>

<div class="container scroll">
    <div class="row">
        <table class="highlight striped col s12 left-align">
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
                if (isset($_GET['key'])) {
                    $key = $_GET['key'];
                    $queryuser = "SELECT *, YEAR(CURDATE()) - YEAR(DoB) AS age FROM trainee WHERE name LIKE '%{$key}%'";
                } else {
                    $queryuser = "SELECT *, YEAR(CURDATE()) - YEAR(DoB) AS age FROM trainee";
                }
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
                            <td><a href="deletetrainee.php?id=<?= $id_user; ?>" onclick="M.toast({html: 'Deleted'})"><i class="material-icons red-text">close</i></a></td>
                        </tr>
                    <?php }
            }  ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'includes/footer.php'; ?>