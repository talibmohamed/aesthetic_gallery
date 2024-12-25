<!-- Include the header -->
<?php require_once 'partial/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Aesthetic Gallery</title>
    <link rel="stylesheet" href="/aesthetic_gallery/view/css/home.css">
    <style>
        /* Carousel Styles */
        .carousel {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            min-width: 100%;
            transition: transform 0.5s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .carousel-slide img {
            width: 80%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .carousel-slide:nth-child(1) {
            background-image: url('/aesthetic_gallery/view/images/art1.webp');
            background-position: center left;
            background-size: cover;
        }

        .carousel-slide:nth-child(2) {
            background-image: url('/aesthetic_gallery/view/images/art2.webp');
            background-position: center center;
            background-size: cover;
        }

        .carousel-slide:nth-child(3) {
            background-image: url('/aesthetic_gallery/view/images/art3.webp');
            background-position: center right;
            background-size: cover;
        }

        /* Carousel Navigation */
        .carousel-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            z-index: 1;
        }

        .carousel-button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            z-index: 1;
        }

        .carousel-indicator {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: #ccc;
            border-radius: 50%;
            cursor: pointer;
        }

        .carousel-indicator.active {
            background-color: #333;
        }
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
                <a href="explore.php" class="btn-primary">Explore Now</a>
            </div>

            <div class="hero-image-container">
                <img src="/aesthetic_gallery/view/images/orig_sri-rao-acrylic-painting-golden-hour_x1650.webp"
                    alt="Hero Image" class="hero-image">
            </div>
        </section>

        <!-- Carousel -->
        <section class="carousel">
            <div class="container">
                <div class="card-carousel">

            </div>
        </section>

        <!-- Featured artworks -->
        <section class="featured-artworks">
            <h2 class="section-title">Featured Artworks</h2>
            <div class="artwork-gallery">
                <!-- Placeholder for artwork cards -->
                <div class="artwork-card">
                    <img src="path/to/image.jpg" alt="Artwork Title" class="artwork-image">
                    <h3 class="artwork-title">Artwork Title</h3>
                    <p class="artwork-artist">by Artist Name</p>
                </div>
                <!-- Add more artwork cards as needed -->
            </div>
        </section>

        <!-- About section -->
        <section class="about">
            <h2 class="section-title">About Us</h2>
            <p class="about-text">
                Aesthetic Gallery is a platform where artists can showcase their work, connect with art enthusiasts, and participate in auctions and exhibitions.
            </p>
        </section>

        <!-- Call-to-action section -->
        <section class="cta">
            <h2 class="cta-title">Join Our Community</h2>
            <p class="cta-text">Sign up to showcase your art or explore amazing creations by others.</p>
            <a href="signup.php" class="btn-secondary">Sign Up Now</a>
        </section>
    </div>

    <!-- Include the footer -->
    <?php require_once 'partial/footer.php'; ?>
</body>


<script src="/aesthetic_gallery/view/js/hero-content.js"></script>

</html>