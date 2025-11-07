<?php
include '../config/db_config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM staff WHERE id='$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $location = $row['location'];
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
    <form action="update.php" method="POST">
        <div class="container w-50">
            <h2>Edit Staff Details</h2>
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <input class="form-control mb-3" type="text" value="<?php echo $name ?>" name="name" placeholder="Name">
            <input class="form-control mb-3" type="text" value="<?php echo $email ?>" name="email" placeholder="Email">
            <input class="form-control mb-3" type="text" value="<?php echo $phone ?>" name="phone" placeholder="Phone">
            <input class="form-control mb-3" type="text" value="<?php echo $location ?>" name="location" placeholder="Location">
            <button type="submit" name="edit" class="btn btn-success">Save Changes</button>
            <?php
            if (isset($error)) {
                echo "<div class='alert alert-danger mt-3'>$error</div>";
            }
            ?>
        </div>

    </form>
</body>

</html>