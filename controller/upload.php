<!-- page to upload art -->
<?php
$title = "Upload Art";

session_start();

require_once '../model/db.php';
require_once '../model/art.php';

$database = new Database();
$db = $database->getConnection();

$art = new art($db);

