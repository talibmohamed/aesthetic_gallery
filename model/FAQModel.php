<!-- faq model -->
<?php

class FAQModel {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getFAQ()
    {
        $sql = "SELECT * FROM faq";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
