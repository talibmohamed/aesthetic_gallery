<!-- Include the header -->
<?php require_once 'partial/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Aesthetic Gallery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/home.css">
    <style>


    </style>
</head>

<body>
    <!-- Main container for the page content -->
    <div class="main-container">
        <!-- Hero section -->
        <section class="hero">
            <div class="hero-content">
                <h1 class="hero-title" id="hero-title">Welcome to Aesthetic Gallery</h1>
                <p class="hero-subtitle" id="hero-subtitle">Discover and showcase stunning art from talented creators worldwide.</p>
            </div>

            <div class="hero-image-container">
                <img src="/aesthetic_gallery/view/images/orig_sri-rao-acrylic-painting-golden-hour_x1650.webp"
                    alt="Hero Image" class="hero-image">
            </div>
        </section>



        <!-- Featured artworks -->
        <section class="featured-artworks">
            <h2 class="section-title">Featured Artworks</h2>
            <div class="artwork-gallery">
                <div class="artwork-card">
                    <img src="/aesthetic_gallery/view/images/art1.webp" alt="Artwork 1" class="artwork-image">
                    <h3 class="artwork-title">Artwork 1</h3>
                    <p class="artwork-artist">Artist Name</p>
                    <p class="artwork-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nunc nec nisl ultricies
                        fermentum. Nullam nec nunc nec nisl ultricies fermentum. Nullam nec nunc nec nisl ultricies
                        fermentum.
                    </p>
                </div>
                <div class="artwork-card">
                    <img src="/aesthetic_gallery/view/images/art2.webp" alt="Artwork 2" class="artwork-image">
                    <h3 class="artwork-title">Artwork 2</h3>
                    <p class="artwork-artist">Artist Name</p>
                    <p class="artwork-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nunc nec nisl ultricies
                        fermentum. Nullam nec nunc nec nisl ultricies fermentum. Nullam nec nunc nec nisl ultricies
                        fermentum.
                    </p>
                </div>
                <div class="artwork-card">
                    <img src="/aesthetic_gallery/view/images/art3.webp" alt="Artwork 3" class="artwork-image">
                    <h3 class="artwork-title">Artwork 3</h3>
                    <p class="artwork-artist">Artist Name</p>
                    <p class="artwork-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nunc nec nisl ultricies
                        fermentum. Nullam nec nunc nec nisl ultricies fermentum. Nullam nec nunc nec nisl ultricies
                        fermentum.
                </div>
            </div>
        </section>

        <section class="collection-links">
            <div class="collection-link-container">
                <a href="">Landscapes</a>
                <a href="">Abstract</a>
                <a href="">Animals</a>
                <a href="">Flora</a>
                <a href="">Oil Paintings</a>
                <a href="">Large Art</a>
            </div>
            <div class="collection-link-desc">
                Seeking something special? Start searching with specific characteristics and narrow your options.
            </div>
        </section>

    </div>

    <!-- Include the footer -->
    <?php require_once 'partial/footer.php'; ?>
</body>


<script src="/aesthetic_gallery/view/js/hero-content.js"></script>

</html>