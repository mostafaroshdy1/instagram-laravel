document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll(".posts-img");

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
});
