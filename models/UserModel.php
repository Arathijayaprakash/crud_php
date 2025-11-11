<?php
class UserModel
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function verifyUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    
}
