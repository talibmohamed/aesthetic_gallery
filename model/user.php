<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Register a new user
    public function register($data) {
        
        // Prepare SQL query to insert user into the database
        $sql = "INSERT INTO users (name, user_type, nom, prenom, pseudo, email, password, date_naissance, consent, tel, login_token)
                VALUES (:name, :user_type, :nom, :prenom, :pseudo, :email, :password, :date_naissance, :consent, :tel, :login_token)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':user_type', $data['user_type']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':pseudo', $data['pseudo']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']); //verifuy Password is hashed before being stored in the database :)
        $stmt->bindParam(':date_naissance', $data['date_naissance']);
        $stmt->bindParam(':consent', $data['consent']);
        $stmt->bindParam(':tel', $data['tel']);
        $stmt->bindParam(':login_token', $data['login_token']);

        return $stmt->execute();
    }

    // Check if the email is already registered
    public function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetchColumn() > 0;
    }
}
?>
