document.addEventListener("DOMContentLoaded", function () {
    let page = 1;
    const container = document.querySelector(".products-grid");
    const loading = false;

    function loadMoreProducts() {
        if (loading) return;

        loading = true;
        page++;

        fetch(`/products?page=${page}`)
            .then((response) => response.json())
            .then((data) => {
                if (data.html) {
                    container.insertAdjacentHTML("beforeend", data.html);
                }
                loading = false;
            });
    }

    // Intersection Observer for infinite scroll
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            loadMoreProducts();
        }
    });

    observer.observe(document.querySelector(".load-more-trigger"));
});
