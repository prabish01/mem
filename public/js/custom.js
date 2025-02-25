// Add this new JavaScript file
document.addEventListener("DOMContentLoaded", function () {
    // Intersection Observer for fade-in effects
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("fade-in");
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: "50px",
        }
    );

    // Observe all sections
    document.querySelectorAll(".section-padd").forEach((section) => {
        observer.observe(section);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
            });
        });
    });

    // Add loading animation for images
    const images = document.querySelectorAll("img");
    images.forEach((img) => {
        img.addEventListener("load", function () {
            this.classList.add("loaded");
        });
    });
});
