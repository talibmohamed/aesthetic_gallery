<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie d'Art</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        h1 {
            margin: 0;
        }

        main {
            padding: 2rem;
        }

        .art-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .artist-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .artist-photo img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .artwork {
            text-align: center;
            padding: 1rem;
        }

        .art-image {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .art-details {
            margin-top: 1rem;
        }

        .artist-name {
            font-weight: bold;
            font-size: 1.2rem;
            margin: 0;
        }

        .art-price {
            color: #007BFF;
            font-weight: bold;
        }

        .art-description {
            padding: 1rem;
            font-size: 0.9rem;
            color: #555;
            line-height: 1.4;
        }

        .add-to-cart {
            text-align: center;
            margin-top: 1rem;
        }

        .add-to-cart button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .add-to-cart button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Galerie d'Art</h1>
    </header>

    <main>
        <section class="art-gallery">
            <!-- Exemple d'un bloc d'artiste -->
            <div class="artist-card">
                <div class="artist-photo">
                    <img src="artist-photo.jpg" alt="Photo de l'artiste">
                </div>
                <div class="artwork">
                    <img src="artwork-image.jpg" alt="Image de l'œuvre" class="art-image">
                    <div class="art-details">
                        <p class="artist-name">Nom de l'Artiste</p>
                        <p class="art-price">Prix: 150€</p>
                    </div>
                </div>
                <div class="art-description">
                    <p>Description</p>
                </div>
                <div class="add-to-cart">
                    <button>Ajouter au panier</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
