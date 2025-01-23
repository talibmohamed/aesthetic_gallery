<?php
$title = "admin";
$page = "cgu";

// session_start();
// test if its an admin $_SESSION['admin'] = true;
session_start();
if ($_SESSION['admin'] !== true) {
    header('Location: /aesthetic_gallery');
    exit;
}

// var_dump($_SESSION);

require_once 'model/db.php';
require_once 'model/cgu.php';

$database = new Database();
$db = $database->getConnection();

$cgu = new CGU($db);

$cguList = $cgu->getAll();

require_once 'view/dashboard_cgu.view.php';
