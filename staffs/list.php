<?php
include '../config/db_config.php';
$sql = 'SELECT * FROM staff';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
if (isset($result)) {
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="addform.php" class="btn btn-success m-3">Create Staff</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['location'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>