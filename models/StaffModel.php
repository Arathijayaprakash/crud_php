<?php

class StaffModel
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getAllStaff()
    {
        $sql = 'SELECT * FROM staff';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $staffList = [];
        while ($row = $result->fetch_assoc()) {
            $staffList[] = $row;
        }
        return $staffList;
    }

    public function getStaffById($id)
    {
        $sql = "SELECT * FROM staff WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function addStaff($name, $email, $phone, $location)
    {
        $sql = "INSERT INTO staff (name,email,phone,location) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssss', $name, $email, $phone, $location);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStaff($name, $email, $phone, $location, $id)
    {
        $sql = "UPDATE staff SET name = ?, email = ?, phone = ?, location=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssssi', $name, $email, $phone, $location, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteStaff($id)
    {
        $sql = "DELETE FROM staff WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
