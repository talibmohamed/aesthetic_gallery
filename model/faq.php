<?php

class FAQ
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Create a new FAQ entry
    public function create($question, $response)
    {
        $stmt = $this->db->prepare("INSERT INTO faq (questions, reponses) VALUES (:question, :response)");
        return $stmt->execute([
            ':question' => htmlspecialchars(trim($question)),
            ':response' => htmlspecialchars(trim($response)),
        ]);
    }

    // Read all FAQ entries
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM faq ORDER BY Id_FAQ DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read a single FAQ entry by ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM faq WHERE Id_FAQ = :id");
        $stmt->execute([':id' => intval($id)]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an FAQ entry
    public function update($id, $question, $response)
    {
        try {
            $stmt = $this->db->prepare("UPDATE faq SET questions = :question, reponses = :response WHERE Id_FAQ = :id");
            $result = $stmt->execute([
                ':id' => intval($id),
                ':question' => htmlspecialchars(trim($question)),
                ':response' => htmlspecialchars(trim($response)),
            ]);

            if (!$result) {
                throw new Exception("Database update failed.");
            }

            return $result;
        } catch (Exception $e) {
            // Log the error for debugging purposes
            error_log('Error updating FAQ: ' . $e->getMessage());
            return false;
        }
    }


    // Delete an FAQ entry
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM faq WHERE Id_FAQ = :id");
        return $stmt->execute([':id' => intval($id)]);
    }
}
