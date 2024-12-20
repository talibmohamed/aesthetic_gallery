<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/faq.css">
</head>
<body>
<?php require_once 'partial/header.php'; ?>
<main>
    <h1 class="faq-title">Frequently Asked Questions</h1>
    <?php foreach ($faq as $item): ?>
        <section class="accordion" id="faq-<?php echo $item['Id_FAQ']; ?>">
            <h1 class="title">
                <a href="#faq-<?php echo $item['Id_FAQ']; ?>">
                    <?php echo htmlspecialchars($item['questions']); ?>
                </a>
            </h1>
            <div class="content">
                <div class="wrapper">
                    <p><?php echo nl2br(htmlspecialchars($item['reponses'])); ?></p>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
</main>

</body>
</html>

