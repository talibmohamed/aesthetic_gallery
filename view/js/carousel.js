let currentIndex = 0;

function updateCarousel() {
    const inner = document.querySelector(".carousel-inner");
    inner.style.transform = `translateX(-${currentIndex * 100}%)`;

    const pages = document.querySelectorAll(".carousel-pagination .page");
    pages.forEach((page, index) => {
        if (index === currentIndex) {
            page.classList.add("active");
        } else {
            page.classList.remove("active");
        }
    });
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + 3) % 3; // Loop back to last slide
    updateCarousel();
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % 3; // Loop back to first slide
    updateCarousel();
}

function goToSlide(index) {
    currentIndex = index;
    updateCarousel();
}

// Initialize the carousel with the first active page
document.addEventListener("DOMContentLoaded", updateCarousel);
