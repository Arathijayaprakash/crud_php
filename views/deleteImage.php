<?php
include __DIR__ . '/../controllers/imageController.php';
include __DIR__ . '/../config/db_config.php';

$controller = new ImageController($conn);
$id = $_GET['id'];
$error = $controller->deleteImage($id);
if ($error) {
    echo "<div class='alert alert-danger'>$error</div>";
}
