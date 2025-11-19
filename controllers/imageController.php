<?php
include __DIR__ . '/../config/db_config.php';
include __DIR__ . '/../models/ImageModel.php';
class ImageController
{
    private $imageModel;
    public function __construct($db)
    {
        $this->imageModel = new ImageModel($db);
    }
    public function getAllImages()
    {
        return $this->imageModel->getAllImages();
    }
    public function uploadImage($imageData)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $gallery_title = $imageData['gallery_title'];
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imagePath = __DIR__ . '/../uploads/' . basename($imageName);
            if (move_uploaded_file($imageTmpPath, $imagePath)) {
                $this->imageModel->uploadImage($gallery_title, $imagePath);
                header('Location: dashboard.php');
            } else {
                echo "Failed to upload image.";
            }
        } else {
            echo "Error uploading image.";
        }
    }
}
