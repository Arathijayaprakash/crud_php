<?php
$pageTitle = 'Staff List';
include '../layout.php';

$apiUrl = "http://localhost:8080/crud/api/staffs.php";
$curl = curl_init($apiUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPGET, true);

$response = curl_exec($curl);
if (curl_errno($curl)) {
    echo 'cURL Error: ' . curl_error($curl);
    exit;
}

curl_close($curl);

$data = json_decode($response, true);

if (!$data || !is_array($data)) {
    echo "Failed to fetch data or invalid response.";
    exit;
}
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
        <?php foreach ($data as $staff): ?>
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