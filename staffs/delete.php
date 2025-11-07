<?php
include '../config/db_config.php';
$id = $_GET['id'];
$sql = "DELETE FROM staff WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
    echo 'Deleted Staff Successfully';
    header('location:list.php');
} else {
    echo "Failed to Delete Staff";
}
