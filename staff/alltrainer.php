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
                    <a href="alltrainer.php" class="breadcrumb">Trainer Management</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container form">
    <div class="row">
            </div>
            <div class="nav-wrapper col s6">
                <form method="GET" action="alltrainer.php">
                    <div class="input-field">
                        <input id="search" name="key" type="search">
                        <label class="label-icon" for="search">Search trainer</label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container scroll">
    <table class="highlight striped">
        <thead>
            <tr>
                <th data-field="fullname">First Name</th>
                <th data-field="age">Last Name</th>
                <th data-field="DoB">Email</th>
                <th data-field="education">Address</th>
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
                $querytrainer = "SELECT * FROM users WHERE firstname  LIKE '%{$key}%' AND role = 'trainer'";
            } else {
                $querytrainer = "SELECT * FROM users WHERE role = 'trainer' ";
            }
            $resulttrainer = $connection->query($querytrainer);
            if ($resulttrainer->num_rows > 0) {
                // output data of each row
                while ($rowtrainer = $resulttrainer->fetch_assoc()) {
                    $id_user = $rowtrainer['id'];
                    $firstname = $rowtrainer['firstname'];
                    $lastname = $rowtrainer['lastname'];
                    $email = $rowtrainer['email'];
                    $address = $rowtrainer['address'];
                    ?>
                    <tr>
                        <td><?= $firstname ?></td>
                        <td><?= $lastname ?></td>
                        <td><?= $email ?></td>
                        <td><?= $address ?></td>
                        <td><a href="edittrainer.php?id=<?= $id_user; ?>"><i class="material-icons blue-text">edit</i></a></td>
                        <td><a href="deletetrainer.php?id=<?= $id_user; ?>" onclick="return confirm('Are you sure?')"><i class="material-icons red-text">close</i></a></td>
                    </tr>
                <?php }
        }  ?>
        </tbody>
    </table>
</div>

<?php require 'includes/footer.php'; ?>