<!-- page to diplsay all arts -->
<?php

session_start();
$title = "artwork";

require_once 'model/db.php';
require_once 'model/Art.php';
require_once 'model/User.php';
$database = new Database();
$db = $database->getConnection();

$art = new Art($db);
$arts = $art->getAllArtworks();


require_once 'view/artwork.view.php';

?>
