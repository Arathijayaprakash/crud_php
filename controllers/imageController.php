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
    public function getStaffById($id)
    {
        return $this->imageModel->getImageById($id);
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
    public function updateImage($imageData, $id)
    {
        if (!empty($id)) {
            $gallery_title = $imageData['gallery_title'];
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $imagePath = __DIR__ . '/../uploads/' . basename($imageName);
                if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                    echo "Failed to upload new image";
                    return;
                }
                $imagePath = 'uploads/' . basename($imageName);
            }
            $result = $this->imageModel->updateImage($gallery_title, $imagePath, $id);
            if ($result) {
                echo 'Image Updated Successfully';
                header('Location: dashboard.php');
            } else {
                echo "Failed to update image.";
            }
        } else {
            echo "Invalid image ID.";
        }
    }
    public function deleteImage($id)
    {
        if (!empty($id)) {
            $result = $this->imageModel->deleteImage($id);
            if ($result) {
                echo 'Image Deleted Successfully';
                header('Location: /crud/views/dashboard.php');
            } else {
                echo "Failed to delete image.";
            }
        }
    }
}
