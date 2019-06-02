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
                    <a href="allcourse.php" class="breadcrumb">Course Management</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="container form">
    <div class="row">
        <div class="col s12 ">

            <a class="waves-effect waves-light btn-large col s3" href="addcourse.php"><i class="material-icons left">add</i>Add Course</a>
            <div class="col s3"></div>
            <div class="nav-wrapper col s6">
                <form method="GET" action="allcourse.php">
                    <div class="input-field">
                        <input id="search" name="key" type="search">
                        <label class="label-icon" for="search">Search Course</label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a href="#allcourse" class="active">All Courses</a></li>
                <?php
                include '../db.php';

                //get trainer
                $querycate = "SELECT * FROM coursecate";
                $resultcate = $connection->query($querycate);
                if ($resultcate->num_rows > 0) {
                    // output data of each row
                    while ($rowcate = $resultcate->fetch_assoc()) {
                        $id_cate = $rowcate['id'];
                        $catename = $rowcate['name'];
                        ?>
                        <li class="tab col s3"><a href="#<?= $catename ?>"><?= $catename ?></a></li>
                    <?php }
            }  ?>
            </ul>
        </div>
        <table class="highlight striped col s12 left-align" id="allcourse">
            <thead>
                <tr>
                    <th data-field="ID">ID</th>
                    <th data-field="coursename">Course name</th>
                    <th data-field="category">Category</th>
                    <th data-field="delete">Edit</th>
                    <th data-field="delete">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db.php';
                if (isset($_GET['key'])) {
                    $key = $_GET['key'];
                    $queryall = "SELECT courses.id, courses.name as coursename, coursecate.name as category 
                FROM courses 
                JOIN coursecate ON courses.coursecateid = coursecate.id 
                WHERE courses.name LIKE '%{$key}%'";
                } else {
                    $queryall = "SELECT courses.id, courses.name as coursename, coursecate.name as category
                FROM courses 
                JOIN coursecate ON courses.coursecateid = coursecate.id";
                }
                $resultall = $connection->query($queryall);
                if ($resultall->num_rows > 0) {
                    // output data of each row
                    while ($rowuser = $resultall->fetch_assoc()) {
                        $id_course = $rowuser['id'];
                        $coursename = $rowuser['coursename'];
                        $category = $rowuser['category'];
                        ?>
                        <tr>
                            <td><?php echo $id_course; ?></td>
                            <td><a href="coursedetail.php?id=<?=$id_course; ?>"><?= $coursename; ?></a></td>
                            <td><?= $category; ?></td>
                            <td><a href="editcourse.php?id=<?= $id_course; ?>"><i class="material-icons blue-text">edit</i></a></td>
                            <td><a href="deletecourse.php?id=<?= $id_course; ?>" onclick="return confirm('Are your sure?')"><i class="material-icons red-text">close</i></a></td>
                        </tr>
                    <?php }
            }  ?>
            </tbody>
        </table>
        <?php
        include '../db.php';

        //get trainer
        $querycate = "SELECT * FROM coursecate";
        $resultcate = $connection->query($querycate);
        if ($resultcate->num_rows > 0) {
            // output data of each row
            while ($rowcate = $resultcate->fetch_assoc()) {

                $catename = $rowcate['name'];
                ?>
                <table class="highlight striped col s12 left-align" id="<?= $catename ?>">
                    <thead>
                        <tr>
                            <th data-field="ID">ID</th>
                            <th data-field="coursename">Course name</th>
                            <th data-field="category">Category</th>
                            <th data-field="delete">Edit</th>
                            <th data-field="delete">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../db.php';

                        //get users
                        $queryall = "SELECT courses.id, courses.name as coursename, coursecate.name as category
                FROM courses 
                JOIN coursecate ON courses.coursecateid = coursecate.id
                WHERE coursecate.name = '$catename'";
                        $resultall = $connection->query($queryall);
                        if ($resultall->num_rows > 0) {
                            // output data of each row
                            while ($rowuser = $resultall->fetch_assoc()) {
                                $id_course = $rowuser['id'];
                                $coursename = $rowuser['coursename'];
                                $category = $rowuser['category'];
                                ?>
                                <tr>
                                    <td><?php echo $id_course; ?></td>
                                    <td><a href="coursedetail.php?id=<?=$id_course; ?>"><?= $coursename; ?></a></td>
                                    <td><?= $category; ?></td>
                                    <td><a href="editcourse.php?id=<?= $id_course; ?>"><i class="material-icons blue-text">edit</i></a></td>
                                    <td><a href="deletecourse.php?id=<?= $id_course; ?>" onclick="M.toast({html: 'Deleted'})"><i class="material-icons red-text">close</i></a></td>
                                </tr>
                            <?php }
                    }  ?>
                    </tbody>
                </table>
            <?php }
    }  ?>
    </div>
</div>

<?php require 'includes/footer.php'; ?>