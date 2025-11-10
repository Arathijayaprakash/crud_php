<?php
include '../../config/db_config.php';
include '../../controllers/staffController.php';

$controller = new staffController($conn);
$staffList = $controller->getStaffList();
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
                <?php foreach ($staffList as $staff):
                ?>
                <tr>
                    <td><?php echo $staff['id'] ?></td>
                    <td><?php echo $staff['name'] ?></td>
                    <td><?php echo $staff['email'] ?></td>
                    <td><?php echo $staff['phone'] ?></td>
                    <td><?php echo $staff['location'] ?></td>
                    <td>
                        <a href="edi    t.php?id=<?php echo $staff['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?php echo $staff['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    </div>
</body>

</html>