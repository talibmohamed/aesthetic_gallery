<?php
class Admin
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    

    // login function
    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                return $admin;
            }
        }
    }
}
