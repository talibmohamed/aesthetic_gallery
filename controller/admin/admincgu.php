<?php
$title = "admin";
$page = "cgu";

session_start();

// if (!isset($_SESSION['admin'])) {
//     header('Location: admin_login.html');
//     exit();
// }


require_once 'model/db.php';
require_once 'model/cgu.php';

$database = new Database();
$db = $database->getConnection();

$cgu = new CGU($db);

$cguList = $cgu->getAll();

require_once 'view/dashboard_cgu.view.php';
