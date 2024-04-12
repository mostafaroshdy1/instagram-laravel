document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll(".posts-img");
    const videos = document.querySelectorAll(".posts-video");

    const savedImages = document.querySelectorAll(".saved-posts-img");
    const savedVideos = document.querySelectorAll(".saved-posts-video");

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

    videos.forEach((vid) => {
        vid.addEventListener("click", (event) => {
            event.preventDefault();
            const id = vid.getAttribute("id");
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

    savedVideos.forEach((vid) => {
        vid.addEventListener("click", (event) => {
            event.preventDefault();
            const id = vid.getAttribute("id");
            fetch(`/posts/${id}`)
                .then((response) => response.text())
                .then((data) => {
                    $(`#savedPostModal-${id}`).modal("show");
                })
                .catch((error) => console.error("Error:", error));
        });
    });
});
