<?php
include '../config/db_config.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    $sql = "UPDATE staff SET name = '$name', email = '$email', phone = '$phone', location='$location' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo 'Updated Staff Successfully';
        header('location:list.php');
    } else {
        $error = "Failed to Update Staff";
    }
}
