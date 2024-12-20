<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Register a new user
    public function register($data)
    {
        // Prepare SQL query to insert user into the database
        $sql = "INSERT INTO user (user_type, nom, prenom, pseudo, email, password, date_naissance, consent, tel, login_token)
                VALUES (:user_type, :nom, :prenom, :pseudo, :email, :password, :date_naissance, :consent, :tel, :login_token)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_type', $data['user_type']);
        $stmt->bindParam(':nom', $data['nom']);
        $stmt->bindParam(':prenom', $data['prenom']);
        $stmt->bindParam(':pseudo', $data['pseudo']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']); //verify Password is hashed before being stored in the database :)
        $stmt->bindParam(':date_naissance', $data['date_naissance']);
        $stmt->bindParam(':consent', $data['consent']);
        $stmt->bindParam(':tel', $data['tel']);
        $stmt->bindParam(':login_token', $data['login_token']);

        return $stmt->execute();
    }

    // Check if the email is already registered
    public function emailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    // Check if the pseudo is already taken
    public function pseudoExists($pseudo)
    {
        if (empty($pseudo)) {
            return false;
        }

        $sql = "SELECT COUNT(*) FROM user WHERE pseudo = :pseudo";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();

        $count = $stmt->fetchColumn();
        return $count > 0;
    }


    // Check availability of the pseudo
    public function checkpseudoAvailability($pseudo)
    {
        // Return true if pseudo is available (not exists)
        $availability = !$this->pseudoExists($pseudo);
        return $availability;
    }

        // Check if a user exists by email or pseudo (used for login)
        public function getUserByEmailOrPseudo($usernameOrEmail)
        {
            if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
                // It's an email, check in the database
                $sql = "SELECT * FROM user WHERE email = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':email', $usernameOrEmail);
            } else {
                // It's a username (pseudo), check in the database
                $sql = "SELECT * FROM user WHERE pseudo = :pseudo";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':pseudo', $usernameOrEmail);
            }
    
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
}
