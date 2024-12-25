document.addEventListener('DOMContentLoaded', () => {
    const titles = [
        "Where Creativity Meets Opportunity",
        "Good art changes lives",
        "Art Speaks Where Words Are Unable to Explain."
    ];

    const subtitles = [
        "Discover, Bid, and Own Unique Artworks from Emerging and Established Artists.",
        "Explore captivating art that transforms your perspective.",
        "- Mathiole"
    ];

    const titleElement = document.getElementById('hero-title');
    const subtitleElement = document.getElementById('hero-subtitle');

    let index = 0;

    // Display the initial content immediately
    titleElement.textContent = titles[index];
    subtitleElement.textContent = subtitles[index];
    titleElement.classList.add('fade-in');
    subtitleElement.classList.add('fade-in');

    // Function to update hero content with fade-in/out effect
    function updateHeroContent() {
        // Fade out the current content
        titleElement.classList.remove('fade-in');
        subtitleElement.classList.remove('fade-in');
        titleElement.classList.add('fade-out');
        subtitleElement.classList.add('fade-out');

        setTimeout(() => {
            // Update content after fade-out
            index = (index + 1) % titles.length; // Increment and loop index
            titleElement.textContent = titles[index];
            subtitleElement.textContent = subtitles[index];

            // Fade in the new content
            titleElement.classList.remove('fade-out');
            subtitleElement.classList.remove('fade-out');
            titleElement.classList.add('fade-in');
            subtitleElement.classList.add('fade-in');
        }, 2000); // Match fade-out duration
    }

    // Start alternating content after the initial display
    setInterval(updateHeroContent, 7000);
});
