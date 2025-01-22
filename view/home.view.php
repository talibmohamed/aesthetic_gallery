<!-- Include the header -->
<!-- session -->
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

        <!-- Carousel -->
        <section class="carousel-section">
            <div class="carousel">
                <div class="carousel-inner">
                    <!-- Page 1 -->
                    <div class="carousel-item active">
                        <div class="carousel-content">
                            <div class="text-content">
                                <h1>The perfect husband</h1>
                                <p>Looking for a 40th anniversary gift for the New Yorker who has everything, John won the award for best husband with a gift of art.</p>
                                <button>Browse Gift Collection</button>
                            </div>
                            <div class="image-content">
                                <img src="/aesthetic_gallery/view/images/page1-image.webp" alt="Client home">
                            </div>
                        </div>
                    </div>

                    <!-- Page 2 -->
                    <div class="carousel-item">
                        <div class="carousel-content">
                            <div class="text-content">
                                <h1>A Fresh Start</h1>
                                <p>After a challenging time, Sarah moved to Arizona to start anew. She filled her home with pieces of art that inspired hope and joy.</p>
                                <button>Discover Inspirational Art</button>
                            </div>
                            <div class="image-content">
                                <img src="/aesthetic_gallery/view/images/page2-image.webp" alt="Client home">
                            </div>
                        </div>
                    </div>

                    <!-- Page 3 -->
                    <div class="carousel-item">
                        <div class="carousel-content">
                            <div class="text-content">
                                <h1>The art lover</h1>
                                <p>Art transformed Jane's home into a sanctuary. She handpicked pieces from emerging artists that captured her unique story.</p>
                                <button>Explore Art Pieces</button>
                            </div>
                            <div class="image-content">
                                <img src="/aesthetic_gallery/view/images/page3-image.webp" alt="Client home">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="carousel-pagination" id="pagination">
                    <span class="prev" onclick="prevSlide()">←</span>
                    <span class="page" onclick="goToSlide(0)">1</span>
                    <span class="page" onclick="goToSlide(1)">2</span>
                    <span class="page" onclick="goToSlide(2)">3</span>
                    <span class="next" onclick="nextSlide()">→</span>
                </div>

            </div>
        </section>


    </div>

    <!-- Include the footer -->
    <?php require_once 'partial/footer.php'; ?>
</body>


<script src="/aesthetic_gallery/view/js/hero-content.js"></script>
<script src="/aesthetic_gallery/view/js/carousel.js"></script>

</html>