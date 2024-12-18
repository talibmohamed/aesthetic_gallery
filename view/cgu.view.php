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
            <section class="terms-of-use">
                <h1 class="title">Terms of Use Agreement</h1>
                <p class="term-condition">This Terms of Use Agreement sets forth the standards of use of the website at www.aesthetic_gallery.com (the “Site”) operated by aesthetic_gallery, LLC (“aesthetic_gallery” or “we” or “us”). By using the Site, you (“you” or the “Member”) agree to these terms and conditions. If you do not agree to the terms and conditions of this Agreement, you should immediately cease all usage of the Site. We reserve the right, at any time, to modify, alter, or update the terms and conditions of this agreement without prior notice. Modifications shall become effective immediately upon being posted at the Site. Your continued use of the Site after amendments are posted constitutes an acknowledgement and acceptance of the Agreement and its modifications. Except as provided in this paragraph, this Agreement may not be amended.</p>
            </section>
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