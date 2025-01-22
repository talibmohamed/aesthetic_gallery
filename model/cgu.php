<?php

class CGU
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Create a new CGU entry
    public function create($condition)
    {
        $stmt = $this->db->prepare("INSERT INTO cgu (`condition`) VALUES (:condition)");
        return $stmt->execute([
            ':condition' => htmlspecialchars(trim($condition)),
        ]);
    }

    // Read all CGU entries
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM cgu ORDER BY Id_cgu DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update an existing CGU entry
    public function update($id, $condition)
    {
        $stmt = $this->db->prepare("UPDATE cgu SET `condition` = :condition WHERE Id_cgu = :id");
        return $stmt->execute([
            ':id' => intval($id),
            ':condition' => htmlspecialchars(trim($condition)),
        ]);
    }

    // Delete an existing CGU entry
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM cgu WHERE Id_cgu = :id");
        return $stmt->execute([':id' => intval($id)]);
    }
}
?>