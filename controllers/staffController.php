<?php
include __DIR__ . '/../config/db_config.php';
include __DIR__ . '/../models/StaffModel.php';

class staffController
{
    private $staffModel;
    public function __construct($db)
    {
        $this->staffModel = new StaffModel($db);
    }

    public function getStaffList()
    {
        return $this->staffModel->getAllStaff();
    }

    public function getStaffById($id)
    {
        return $this->staffModel->getStaffById($id);
    }
    public function addStaff($postData)
    {
        if (isset($postData)) {
            $name = $postData['name'];
            $email = $postData['email'];
            $phone = $postData['phone'];
            $location = $postData['location'];

            if (!empty($name) && !empty($email) && !empty($phone) && !empty($location)) {
                $result = $this->staffModel->addStaff($name, $email, $phone, $location);
                if ($result) {
                    echo 'Added Staff Successfully';
                    header('location:index.php');
                } else {
                    return "Failed to Add Staff";
                }
            } else {
                return 'Please fill all fields';
            }
        }
    }

    public function updateStaff($editdata)
    {
        if (isset($editdata)) {
            $id = $editdata['id'];
            $name = $editdata['name'];
            $email = $editdata['email'];
            $phone = $editdata['phone'];
            $location = $editdata['location'];

            $result = $this->staffModel->updateStaff($name, $email, $phone, $location, $id);
            if ($result) {
                echo 'Updated Staff Successfully';
                header('location:index.php');
            } else {
                return "Failed to Update Staff";
            }
        }
    }

    public function deleteStaff($id)
    {
        if (!empty($id)) {
            $result = $this->staffModel->deleteStaff($id);
            if ($result) {
                echo 'Deleted Staff Successfully';
                header('location:index.php');
            }else{
                return "Failed to Delete Staff";
            }
        }else{
            return 'Invalid staff ID.';
        }
    }
}
