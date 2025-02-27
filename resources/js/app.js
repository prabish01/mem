document.addEventListener("DOMContentLoaded", function () {
    // Pre-calculate space for dynamic elements
    const dynamicContainers = document.querySelectorAll(".dynamic-content");
    dynamicContainers.forEach((container) => {
        const placeholder = container.querySelector(".placeholder");
        if (placeholder) {
            container.style.minHeight = placeholder.offsetHeight + "px";
        }
    });

    // Lazy load components when needed
    if (document.querySelector(".products-grid")) {
        import("./infinite-scroll").then((module) => {
            // Initialize infinite scroll
        });
    }
});
