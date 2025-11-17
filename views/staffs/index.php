<?php
$pageTitle = 'Staff List';
include '../layout.php';
include '../../controllers/staffController.php';

$controller = new staffController($conn);
$staffList = $controller->getStaffList();
?>

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
        <?php foreach ($staffList as $staff): ?>
            <tr>
                <td><?php echo $staff['id'] ?></td>
                <td><?php echo $staff['name'] ?></td>
                <td><?php echo $staff['email'] ?></td>
                <td><?php echo $staff['phone'] ?></td>
                <td><?php echo $staff['location'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $staff['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php?id=<?php echo $staff['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../footer.php';
?>