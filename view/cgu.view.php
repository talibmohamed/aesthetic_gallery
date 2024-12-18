<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Use - Aesthetic Gallery</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/cgu.css">
</head>

<body>
    <?php require_once 'partial/header.php'; ?>

    <div class="container">
        <header class="header">
            <h1 class="title">Terms of Use</h1>
        </header>

        <main class="main-content">
            <?php if (!empty($cgu)): ?>
                <div class="terms-list">
                    <?php $counter = 1; 
                    ?>
                    <?php foreach ($cgu as $term): ?>
                        <section class="term">
                            <h2 class="term-title">Term <?php echo $counter++; 
                                                        ?></h2>
                            <p class="term-condition"><?php echo nl2br(htmlspecialchars($term['condition'])); ?></p>
                        </section>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="no-terms-message">No terms of use available at the moment. Please check back later.</p>
            <?php endif; ?>
        </main>

        <footer class="footer">
            <p>© 2024 Aesthetic Gallery. All rights reserved.</p>
        </footer>
    </div>

</body>

</html>