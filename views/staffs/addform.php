<?php
include '../../config/db_config.php';
include '../../controllers/staffController.php';

$controller = new staffController($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = $controller->addStaff($_POST);
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
            <a href="index.php" class="btn btn-secondary">Back to Staff List</a>

        </div>

    </form>
</body>

</html>