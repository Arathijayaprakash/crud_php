<?php
include __DIR__ . '/layout.php';
include __DIR__ . '/../controllers/imageController.php';
$controller = new ImageController($conn);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $error = $controller->updateImage($_POST, $id);
}

$id = $_GET['id'];
$image = $controller->getStaffById($id);
if (!$image) {
    echo "Image not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Image</title>
</head>

<body>
    <h1>Update Image</h1>
    <form action="updateImage.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <label for="gallery_title">Gallery Title:</label>
        <br />
        <input type="text" name="gallery_title" id="gallery_title" value="<?php echo htmlspecialchars($image['gallery_title']); ?>" />
        <label for=" image">Select New Image(optional):</label>
        <input type="file" name="image" id="image" />
        <button type="submit">Update</button>
    </form>
    <br />
    <a href="dashboard.php" style="display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">Back</a>

</body>

</html>