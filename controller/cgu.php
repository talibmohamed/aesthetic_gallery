<?php
require_once 'model/db.php';
require_once 'model/cgu.php';

$database = new Database();

$db = $database->getConnection();

$cguModel = new CGU($db);

$cgu = $cguModel->getAll();

require_once 'view/cgu.view.php';
?>
