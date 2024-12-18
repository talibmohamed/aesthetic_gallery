<?php

class CGUModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllCGU()
    {
        $sql = "SELECT * FROM cgu ORDER BY Id_cgu ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
