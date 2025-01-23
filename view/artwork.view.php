<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #FFF9F6;
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            color: #423E31;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .gallery {
            column-count: 3;
            column-gap: 20px;
        }

        .artwork-card {
            position: relative;
            /* Required for absolute positioning of info */
            margin-bottom: 20px;
            break-inside: avoid;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .artwork-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .artwork-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .artwork-info {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            text-align: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .artwork-card:hover .artwork-info {
            opacity: 1;
            visibility: visible;
        }

        .artwork-info h2 {
            font-size: 1.2em;
            margin-bottom: 5px;
        }

        .artwork-info p {
            font-size: 0.9em;
            margin: 5px 0;
        }

        .artwork-info a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #423E31;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9em;
            transition: background-color 0.3s;
        }

        .artwork-info a:hover {
            background-color: #c3bfbd;
        }

        @media (max-width: 768px) {
            .gallery {
                column-count: 2;
            }
        }

        @media (max-width: 480px) {
            .gallery {
                column-count: 1;
            }
        }
    </style>
</head>

<body>
    <?php require_once 'partial/header.php'; ?>

    <h1>Artworks</h1>
    <div class="gallery-container">
        <div class="gallery">
            <?php foreach ($arts as $artwork): ?>
                <div class="artwork-card">
                    <img src="<?= htmlspecialchars($artwork['image_path']) ?>" alt="<?= htmlspecialchars($artwork['nom']) ?>">
                    <div class="artwork-info">
                        <h2><?= htmlspecialchars($artwork['nom']) ?></h2>
                        <p><strong>Price:</strong> <?= htmlspecialchars($artwork['prix']) ?> €</p>
                        <p><strong>Mode of Sale:</strong> <?= htmlspecialchars($artwork['mode_vente']) ?></p>
                        <a href="article?id=<?= htmlspecialchars($artwork['Id_Art']) ?>">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require_once 'partial/footer.php'; ?>
</body>

</html>