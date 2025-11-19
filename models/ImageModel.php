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
    public function uploadImage($gallery_title, $image_path)
    {
        $sql = "INSERT INTO image_gallery (gallery_title, image_path) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $gallery_title, $image_path);
        $stmt->execute();
    }
}
