<?php
header("Content-Type: application/json");
include __DIR__ . '/../config/db_config.php';
include __DIR__ . '/../controllers/staffController.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new staffController($conn);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $staff = $controller->getStaffById($id);
            echo json_encode($staff);
        } else {
            $staffList = $controller->getStaffList();
            echo json_encode($staffList);
        }
        break;
    case 'POST':
        $postData = json_decode(file_get_contents("php://input"), true);
        if ($postData) {
            $result = $controller->addStaff($postData);
            echo json_encode(["message" => $result]);
        } else {
            echo json_encode(["error" => "Invalid input data" . file_get_contents("php://input")]);
        }
        break;
    case 'PUT':
        $editData = json_decode(file_get_contents("php://input"), true);
        if ($editData && isset($editData['id'])) {
            $result = $controller->updateStaff($editData);
            echo json_encode(["message" => $result]);
        } else {
            echo json_encode(["error" => "Invalid input data or missing ID"]);
        }
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $deleteData);
        if (isset($deleteData['id'])) {
            $id = $deleteData['id'];
            $result = $controller->deleteStaff($id);
            echo json_encode(['message' => $result]);
        } else {
            echo json_encode(["error" => 'Invalid Staff ID']);
        }
        break;
    default:
        echo json_encode(["error" => "Unsupported request method"]);
        break;
}
