<?php
include '../config/db_config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($location)) {
        $sql = "INSERT INTO staff (name,email,phone,location) VALUES ('$name','$email','$phone','$location')";
        if ($conn->query($sql) === TRUE) {
            echo 'Added Staff Successfully';
            header('location:list.php');
        } else {
            $error = "Failed to Add Staff";
        }
    } else {
        $error = 'Please fill all fields';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <form method="POST">
        <div class="container w-50">
            <h2>Add Staff</h2>
            <input class="form-control mb-3" type="text" name="name" placeholder="Name">
            <input class="form-control mb-3" type="text" name="email" placeholder="Email">
            <input class="form-control mb-3" type="text" name="phone" placeholder="Phone">
            <input class="form-control mb-3" type="text" name="location" placeholder="Location">
            <button type="submit" name="register" class="btn btn-success">Add</button>
            <?php
            if (isset($error)) {
                echo "<div class='alert alert-danger mt-3'>$error</div>";
            }
            ?>
        </div>

    </form>
</body>

</html>