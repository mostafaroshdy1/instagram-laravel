document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll(".posts-img");
    const savedImages = document.querySelectorAll(".saved-posts-img");

    images.forEach((img) => {
        img.addEventListener("click", () => {
            const id = img.getAttribute("id");
            fetch(`/posts/${id}`)
                .then((response) => response.text())
                .then((data) => {
                    $(`#postModal-${id}`).modal("show");
                })
                .catch((error) => console.error("Error:", error));
        });
    });

    savedImages.forEach((img) => {
        img.addEventListener("click", () => {
            const id = img.getAttribute("id");
            fetch(`/posts/saved/${id}`)
                .then((response) => response.text())
                .then((data) => {
                    $(`#savedPostModal-${id}`).modal("show");
                })
                .catch((error) => console.error("Error:", error));
        });
    });
});
