<?php
require_once 'model/db.php';
require_once 'model/CGUModel.php';

$database = new Database();

$db = $database->getConnection();

$cguModel = new CGUModel($db);

$cgu = $cguModel->getAllCGU();

require_once 'view/cgu.view.php';
?>
