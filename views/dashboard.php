<?php
$pageTitle = 'Dashboard';
include __DIR__ . '/layout.php';
include __DIR__ . '/../controllers/imageController.php';
$controller = new ImageController($conn);
$imageList = $controller->getAllImages();
print_r($imageList);
?>
<h2>Dashboard</h2>
<p>Welcome <?php echo $_SESSION['username'] ?></p>
<h3>Image Gallery</h3>
<a href="upload.php">Upload New Image</a>
<div>
    <?php if (!empty($imageList)): ?>
        <?php foreach ($imageList as $image): ?>
            <h4><?php echo htmlspecialchars($image['gallery_title']); ?></h4>
            <img src="<?php echo htmlspecialchars($image['image_path']); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</div>