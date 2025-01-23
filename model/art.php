<?php
// filepath: /c:/laragon/www/aesthetic_gallery/model/Art.php

class Art
{
    private $db;
    private $table_name = "artworks";

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all artworks
    public function getAllArtworks()
    {
        $sql = "SELECT * FROM art_piece ORDER BY Id_Art ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update an existing artwork
    public function updateArtwork($id, $nom, $description, $prix, $mode_vente, $offre, $artiste_Id_Artiste, $imagePath)
    {
        $sql = "UPDATE art_piece SET nom = :nom, description = :description, prix = :prix, mode_vente = :mode_vente, 
                offre = :offre, artiste_Id_Artiste = :artiste_Id_Artiste, image_path = :image_path 
                WHERE Id_Art = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':mode_vente', $mode_vente);
        $stmt->bindParam(':offre', $offre);
        $stmt->bindParam(':artiste_Id_Artiste', $artiste_Id_Artiste);
        $stmt->bindParam(':image_path', $imagePath);
        return $stmt->execute();
    }

    // Delete an existing artwork
    public function deleteArtwork($id)
    {
        $sql = "DELETE FROM art_piece WHERE Id_Art = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Create a new artwork
    public function createArtwork($nom, $description, $prix, $mode_vente, $offre, $artiste_Id_Artiste, $imagePath)
    {
        $sql = "INSERT INTO art_piece (nom, description, prix, mode_vente, offre, artiste_Id_Artiste, image_path) 
                VALUES (:nom, :description, :prix, :mode_vente, :offre, :artiste_Id_Artiste, :image_path)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':mode_vente', $mode_vente);
        $stmt->bindParam(':offre', $offre);
        $stmt->bindParam(':artiste_Id_Artiste', $artiste_Id_Artiste);
        $stmt->bindParam(':image_path', $imagePath);
        return $stmt->execute();
    }

    // Get a single artwork by ID
    public function getArtworkById($id)
    {
        $sql = "SELECT * FROM art_piece WHERE Id_Art = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to get all artworks by the same artist
    public function getArtworksByArtist($artistId)
    {
        $query = "SELECT * FROM art_piece WHERE artiste_Id_Artiste = :artistId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':artistId', $artistId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
