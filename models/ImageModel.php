<?php
class ImageModel
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getAllImages()
    {
        $sql = 'SELECT * FROM image_gallery';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $imageList = [];
        while ($row = $result->fetch_assoc()) {
            $imageList[] = $row;
        }
        return $imageList;
    }
    public function getImageById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM image_gallery WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function uploadImage($gallery_title, $image_path)
    {
        $sql = "INSERT INTO image_gallery (gallery_title, image_path) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $gallery_title, $image_path);
        $stmt->execute();
    }
    public function updateImage($gallery_title, $image_path, $id)
    {
        if ($image_path) {
            $stmt = $this->conn->prepare("UPDATE image_gallery SET gallery_title = ?, image_path = ? WHERE id = ?");
            $stmt->bind_param('ssi', $gallery_title, $image_path, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE image_gallery SET gallery_title = ? WHERE id = ?");
            $stmt->bind_param('si', $gallery_title, $id);
        }
        return $stmt->execute();
    }
    public function deleteImage($id)
    {
        $sql = "SELECT image_path FROM image_gallery WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $image = $result->fetch_assoc();
        if ($image) {
            if (file_exists($image['image_path'])) {
                unlink($image['image_path']);
            }
            $sql = "DELETE FROM image_gallery WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('i', $id);
            return $stmt->execute();
        }
        return false;
    }
}
