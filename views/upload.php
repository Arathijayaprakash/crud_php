<?php
include __DIR__ . '/layout.php';
include __DIR__ . '/../controllers/imageController.php';
$controller = new ImageController($conn);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = $controller->uploadImage($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body>
    <h1>Upload Image</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="gallery_title">Gallery Title:</label>
        <input type="text" name="gallery_title" id="gallery_title" required />
        <br />
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" required />
        <button type="submit">Upload</button>
    </form>
</body>

</html>