<?php
$pageTitle = 'Dashboard';
include __DIR__ . '/layout.php';
include __DIR__ . '/../controllers/imageController.php';
$controller = new ImageController($conn);
$imageList = $controller->getAllImages();
?>
<h2>Dashboard</h2>
<p>Welcome <?php echo $_SESSION['username'] ?></p>
<h3>Image Gallery</h3>
<a href="upload.php">Upload New Image</a>
<div>
    <?php if (!empty($imageList)): ?>
        <?php foreach ($imageList as $image): ?>
            <div style="margin-bottom: 20px;">
                <h4><?php echo htmlspecialchars($image['gallery_title']); ?></h4>
                <img src="../uploads/<?php echo basename($image['image_path']); ?>"
                    alt="<?php echo htmlspecialchars($image['gallery_title']); ?>"
                    style="max-width: 300px;">
                <a href="deleteImage.php?id=<?php echo $image['id']; ?>" style="color: red;">Delete</a>
                <a href="updateImage.php?id=<?php echo $image['id']; ?>" style="color: blue;">Update</a>
            </div> <?php endforeach; ?>
    <?php endif; ?>
</div>