<?php
$title = "admin";
$page = "faq";

session_start();

// test if its an admin $_SESSION['admin'] = true;
// session_start();
if ($_SESSION['admin'] !== true) {
    header('Location: /aesthetic_gallery');
    exit;
}

require_once 'model/db.php';
require_once 'model/faq.php';

$database = new Database();
$db = $database->getConnection();

$faq = new Faq($db);

$faqList = $faq->getAll();



require_once 'view/dashboard_faq.view.php';
