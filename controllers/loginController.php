<?php

include __DIR__ . '/../config/db_config.php';
include __DIR__ . '/../models/UserModel.php';

class LoginController
{
    private $userModel;
    public function __construct($db)
    {
        $this->userModel = new UserModel($db);
    }
    public function login($postData)
    {
        if (isset($postData['username']) && isset($postData['password'])) {
            $username = $postData['username'];
            $password = $postData['password'];
            $user = $this->userModel->verifyUser($username, $password);
            if ($user) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                return true;
            } else {
                return "Invalid username or password.";
            }
        } else {
            return "Please fill in all fields,";
        }
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
}
