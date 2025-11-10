<?php
include '../../config/db_config.php';
include '../../controllers/staffController.php';

$controller = new staffController($conn);
$id = $_GET['id'];
$error = $controller->deleteStaff($id);

if ($error) {
    echo "<div class='alert alert-danger'>$error</div>";
}
