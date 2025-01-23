<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($artData['nom']); ?> - Artwork Details</title>
    <style>
        @font-face {
            font-family: 'KoPub Batang';
            src: url('/aesthetic_gallery/view/fonts/kopub-batang/KoPubBatang-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @import url('https://fonts.googleapis.com/css2?family=Playwrite+RO:wght@100..400&display=swap');

        body {
            font-family: Arial, sans-serif;
            background-color: #FFF9F6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .artwork-header {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            width: 100%;
            margin-bottom: 40px;
        }

        .artwork-header img {
            max-width: 600px;
            /* Adjust the size for larger image */
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-right: 30px;
            /* More space between image and text */
        }

        .artwork-header .info {
            flex: 1;
            max-width: 600px;
        }

        .artwork-header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5em;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .artwork-description {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: left;
        }

        .artwork-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            width: 100%;
        }

        .artwork-details div {
            flex: 1;
            padding: 10px;
            text-align: left;
        }

        .artwork-details div h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.3em;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .artwork-details div p {
            font-size: 1.1em;
            color: #7f8c8d;
        }

        .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #27ae60;
            margin-top: 20px;
            text-align: left;
        }

        .buy-now-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .buy-now-btn a {
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            padding: 15px 30px;
            font-size: 1.2em;
            font-family: 'Poppins', sans-serif;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .buy-now-btn a:hover {
            background-color: #2980b9;
        }

        .back-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .back-btn a {
            text-decoration: none;
            background-color: #f39c12;
            color: #fff;
            padding: 12px 25px;
            font-size: 1.1em;
            font-family: 'Poppins', sans-serif;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .back-btn a:hover {
            background-color: #e67e22;
        }

        .other-artworks {
            margin-top: 40px;
            width: 100%;
            text-align: center;
        }

        .other-artworks h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8em;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .artworks-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .artwork-item {
            max-width: 250px;
            text-align: center;
        }

        .artwork-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .artwork-item h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            color: #2c3e50;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .artwork-header {
                flex-direction: column;
                align-items: center;
            }

            .artwork-header img {
                max-width: 500px;
                height: auto;
                margin-right: 0;
                margin-bottom: 20px;
            }

            .artwork-details {
                flex-direction: column;
                align-items: center;
            }

            .artwork-details div {
                margin-bottom: 20px;
                text-align: center;
            }

            .buy-now-btn a,
            .back-btn a {
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    <?php require_once 'partial/header.php'; ?>
    <div class="main-container">
        <!-- Main Artwork Section -->
        <div class="artwork-header">
            <?php if (!empty($artData['image_path'])): ?>
                <img src="<?= htmlspecialchars($artData['image_path']); ?>" alt="<?= htmlspecialchars($artData['nom']); ?>">
            <?php else: ?>
                <p class="no-image">No image available for this artwork.</p>
            <?php endif; ?>
            <div class="info">
                <h1><?= htmlspecialchars($artData['nom']); ?></h1>
                <p class="artwork-description"><?= htmlspecialchars($artData['description']); ?></p>
                <div class="artwork-details">
                    <div>
                        <h3>Price</h3>
                        <p>$<?= htmlspecialchars($artData['prix']); ?></p>
                    </div>
                    <div>
                        <h3>Sale Mode</h3>
                        <p><?= htmlspecialchars($artData['mode_vente']); ?></p>
                    </div>
                    <div>
                        <h3>Artist</h3>
                        <p><?= htmlspecialchars($artistInfo['nom'] . ' ' . $artistInfo['Prenom']); ?></p>
                        <p><?= htmlspecialchars($artistInfo['Email']); ?></p>
                    </div>
                </div>

                <div class="buy-now-btn">
                    <a href="#">Buy Now</a>
                </div>
                <div class="back-btn">
                    <a href="index.php">Back to Listings</a>
                </div>
            </div>
        </div>

        <!-- Display other artworks by the same artist if available -->
        <div class="other-artworks">
            <h2>Other Artworks by <?= htmlspecialchars($artistInfo['nom']); ?></h2>
            <div class="artworks-list">
                <?php foreach ($otherArtworks as $artwork): ?>
                    <div class="artwork-item">
                        <a href="article?id=<?= htmlspecialchars($artwork['Id_Art']); ?>">
                            <img src="<?= htmlspecialchars($artwork['image_path']); ?>" alt="<?= htmlspecialchars($artwork['nom']); ?>" style="max-width: 200px; height: auto;">
                            <h3><?= htmlspecialchars($artwork['nom']); ?></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>