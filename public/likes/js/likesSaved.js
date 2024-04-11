
function postLikesSaved() {
    document.querySelectorAll(".likeButtonSaved").forEach((button) => {
        button.removeEventListener("click", likeButtonClick2);
        button.addEventListener("click", likeButtonClick2);
    });
}

function likeButtonClick2(event) {
    event.preventDefault();
    const postId = this.closest("form").dataset.postId;
    fetch(`/posts/toggleLike/${postId}`, {
        method: "PATCH",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById(`likers-${postId}-2`).innerText =
                data.likes_count + " likes";
            const svg = document.querySelector(`#svg-${postId}-2`);
            svg.setAttribute("fill", data.isLiked ? "red" : "white");
            const title = data.isLiked ? "Unlike" : "Like";
            svg.querySelector("title").textContent = title;
            console.log(document.getElementById(`likers-${postId}`))

            document
                .getElementById(`likers-${postId}-2`)
                .addEventListener("click", function () {
                    $("#postModal-" + postId).modal("hide");
                    drawLikersModal2(data.likers, postId);
                });
        })
        .catch((error) => console.error("Error:", error));
}

function drawLikersModal2(likers, postId) {
    $("#postModal-" + postId).modal("hide");
    console.log($("#postModal-" + postId));
    console.log("likers2222");
    const likersModal = document.getElementById("likersModal2");
    console.log(likersModal);
    console.log(document.getElementById(`postModal-${postId}`))
    const likersBody = likersModal.querySelector(".modal-body");
    console.log(likersBody);
    const imagePath = "{{ asset('homePage/images/profile_img.jpg') }}";
    likersBody.innerHTML = "";

    likers.forEach((liker) => {
        const likerDiv = document.createElement("div");
        likerDiv.classList.add("d-flex", "align-items-center", "mb-4");
        likerDiv.innerHTML = `
              <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                  <div class="d-flex flex-row align-items-center">
                      <img class="rounded-circle me-3" src="${liker.avatar}" width="30%" />
                      <div class="d-flex flex-column align-items-start ml-2">
                          <span class="font-weight-bold" style="font-size: 1.6em;">${liker.full_name}</span>
                      </div>
                  </div>
              </div>
          `;
          const avatarImg = likerDiv.querySelector('img');
            avatarImg.style.width = '60px';
        likersBody.appendChild(likerDiv);
    });

    $("#likersModal2").modal("show");
    

}
window.addEventListener("DOMContentLoaded", function () {
    postLikesSaved();
});