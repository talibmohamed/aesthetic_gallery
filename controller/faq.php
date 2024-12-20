<?php
$title = "faq"; 

require_once 'model/db.php';
require_once 'model/FAQModel.php';

$database = new Database();

$db = $database->getConnection();

$faqModel = new FAQModel($db);

$faq = $faqModel->getFAQ();

require_once 'view/faq.view.php';


