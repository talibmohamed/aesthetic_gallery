<?php
$title = "admin";
$page = "faq";

session_start();

// if (!isset($_SESSION['admin'])) {
//     header('Location: admin_login.html');
//     exit();
// }


require_once 'model/db.php';
require_once 'model/faq.php';

$database = new Database();
$db = $database->getConnection();

$faq = new Faq($db);

$faqList = $faq->getAll();



require_once 'view/dashboard_faq.view.php';
