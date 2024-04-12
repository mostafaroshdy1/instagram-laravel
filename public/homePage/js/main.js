/***************Post**************************/
const posts = document.querySelector(".posts");
const post_data = [];

if (posts)
    for (var i = 0; i < post_data.length; i++) {
        const post_div = document.createElement("div");
        post_div.classList.add("post");
        post_div.innerHTML = `
    <div class="info">
      <div class="person">
          <img src="${post_data.user.avatar}">
          <a href="#">${post_data[i][1]}</a>
          <span class="circle">.</span>
          <span>${post_data[i][2]}m</span>
      </div>
      <div class="more">
          <img src="./images/show_more.png" alt="show more">
      </div>
    </div>
    <div class="image">
      <img src="${post_data[i][3]}" >
    </div>
    <div class="desc">
      <div class="icons">
          <div class="icon_left d-flex">
              <div class="like">
                  <img class="not_loved" src="./images/love.png" >
                  <img class="loved" src="./images/heart.png" >
              </div>
              <div class="chat">
                  <button type="button" class="btn p-0" data-bs-toggle="modal"
                      data-bs-target="#message_modal">
                      <img src="./images/bubble-chat.png" >
                  </button>
              </div>
              <div class="send">
                  <button type="button" class="btn p-0" data-bs-toggle="modal"
                      data-bs-target="#send_message_modal">
                      <img src="./images/send.png" >
                  </button>
              </div>
          </div>
          <div class="save not_saved">
              <img class="hide saved" src="./images/save_black.png" >
              <img class="not_saved" src="./images/save-instagram.png" >
          </div>
      </div>
      <div class="liked">
          <a class="bold" href="#">${post_data[i][4]} likes</a>
      </div>
      <div class="post_desc">
          <p>
              <a class="bold" href="#">${post_data[i][1]}</a>
              ${post_data[i][5]}
          </p>
          <p><a class="gray" href="#">View all ${post_data[i][6]} comments</a></p>
          <input type="text" placeholder="Add a comments...">
      </div>
    </div>
      `;
        posts.appendChild(post_div);
    }

/***************explore**********/
const explore_date = [
    ["https://i.ibb.co/Jqh3rHv/img1.jpg", 1500, 400],
    ["https://i.ibb.co/2ZxBFVp/img2.jpg", 400, 200],
    ["https://i.ibb.co/5vQt677/img3.jpg", 700, 20],
    ["https://i.ibb.co/FVVxR6x/img.jpg", 150, 80],
    ["https://i.ibb.co/CWbynB2/account3-1.jpg", 10, 5],
    ["https://i.ibb.co/z41bG1y/img6.jpg", 100, 57],
    ["https://i.ibb.co/vkXPdxN/account7.jpg", 100, 57],
    ["https://i.ibb.co/7R0Vzp3/account8.jpg", 100, 57],
    ["https://i.ibb.co/gvrfhjL/account9.jpg", 100, 57],
    ["https://i.ibb.co/j8L7FPY/account10.jpg", 100, 57],
    ["https://i.ibb.co/JcXRPht/account11.jpg", 100, 57],
    ["https://i.ibb.co/6WvdZS9/account12.jpg", 100, 57],
    ["https://i.ibb.co/pJ8thst/account13.jpg", 100, 57],
    ["https://i.ibb.co/4M3W996/account14.jpg", 100, 57],
    ["https://i.ibb.co/3S1hjKR/account1.jpg", 100, 57],
];
const explores = document.querySelector(".explore_container");

if (explores)
    for (var i = 0; i < explore_date.length; i++) {
        const explore_1_div = document.createElement("div");
        explore_1_div.classList.add("items_4");
        explore_1_div.innerHTML = `
  <div class="item">
      <img class="img-fluid" src="${explore_date[i][0]}" >
      <div class="bg"
        <div class="info">
          <div class="likes">
              <img src="./images/heart_white.png" >
              <span>${explore_date[i][1]}</span>
          </div>
          <div class="comments">
              <img src="./images/message.png" >
              <span>${explore_date[i++][2]}</span>
          </div>
        </div>
      </div>
  </div>
  <div class="item">
      <img class="img-fluid" src="${explore_date[i][0]}" >
      <div class="bg"
        <div class="info">
          <div class="likes">
              <img src="./images/heart_white.png" >
              <span>${explore_date[i][1]}</span>
          </div>
          <div class="comments">
              <img src="./images/message.png" >
              <span>${explore_date[i++][2]}</span>
          </div>
        </div>
      </div>
  </div>
  <div class="item">
      <img class="img-fluid" src="${explore_date[i][0]}" >
      <div class="bg"
        <div class="info">
          <div class="likes">
              <img src="./images/heart_white.png" >
              <span>${explore_date[i][1]}</span>
          </div>
          <div class="comments">
              <img src="./images/message.png" >
              <span>${explore_date[i++][2]}</span>
          </div>
        </div>
      </div>
  </div>
  <div class="item">
      <img class="img-fluid" src="${explore_date[i][0]}" >
      <div class="bg"
        <div class="info">
          <div class="likes">
              <img src="./images/heart_white.png" >
              <span>${explore_date[i][1]}</span>
          </div>
          <div class="comments">
              <img src="./images/message.png" >
              <span>${explore_date[i++][2]}</span>
          </div>
        </div>
      </div>
  </div>
</div>
  `;
        explores.appendChild(explore_1_div);

        const explore_2_div = document.createElement("div");
        explore_2_div.classList.add("item1");
        explore_2_div.innerHTML = `
  <div class="item">
  <img class="img-fluid" src="${explore_date[i][0]}" >
  <div class="bg"
    <div class="info">
      <div class="likes">
          <img src="./images/heart_white.png" >
          <span>${explore_date[i][1]}</span>
      </div>
      <div class="comments">
          <img src="./images/message.png" >
          <span>${explore_date[i][2]}</span>
      </div>
    </div>
  </div>
</div>
  `;
        explores.appendChild(explore_2_div);
    }

/*****************Reels********************/
const reels_data = [
    [
        "./video/video1.mp4",
        "./images/profile_img.jpg",
        "zineb",
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit.Officiis...",
        "nameOfMusic",
        "casablanca",
        "55.9K",
        "555",
    ],
    [
        "./video/video2.mp4",
        "https://i.ibb.co/3S1hjKR/account1.jpg",
        "ikram",
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit.Officiis...",
        "nameOfMusic",
        "oujda",
        "35.9K",
        "75",
    ],
    [
        "./video/video3.mp4",
        "https://i.ibb.co/8x4Hqdw/account2.jpg",
        "oumnia",
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit.Officiis...",
        "nameOfMusic",
        "rabat",
        "10.5K",
        "155",
    ],
    [
        "./video/video4.mp4",
        "https://i.ibb.co/CWbynB2/account3-1.jpg",
        "Safae",
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit.Officiis...",
        "nameOfMusic",
        "Nador",
        "705.9K",
        "750",
    ],
];
const reels_container = document.querySelector(".reels");

if (reels_container)
    for (let i = 0; i < reels_data.length; i++) {
        console.log(i);
        const reel_div = document.createElement("div");
        reel_div.classList.add("reel");
        if (i == 0) {
            reel_div.setAttribute("id", "video_play");
            reel_div.innerHTML = `<div class="video">
    <video src="${reels_data[i][0]}" autoplay loop>
    </video>
    <div class="content">
        <div class="sound">
            <img class="volume-up" src="./images/volume-up.png" >
            <img class="volume-mute" src="./images/volume-mute.png" >
        </div>
        <div class="play">
            <img src="./images/play-button-arrowhead.png" >
        </div>
        <div class="info">
            <div class="profile">
                <h4><a href="#">
                        <img src="${reels_data[i][1]}" >
                        ${reels_data[i][2]}
                    </a></h4>
                <span>.</span>
                <button class="follow_text">Follow</button>
            </div>
            <div class="desc">
                <p>${reels_data[i][3]} <span class="show_text">more</span>
                </p>
                <div class="more">
                    <div class="music">
                        <img src="./images/music.png" >
                        <span>${reels_data[i][4]}</span>
                    </div>
                    <div class="position">
                        <img src="./images/map.png" >
                        <span>${reels_data[i][5]}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="likes">
    <div class="like">
        <img class="not_loved" src="./images/love.png" >
        <img class="loved" src="./images/heart.png" >
        <p> ${reels_data[i][6]}</p>
    </div>
    <div class="messsage">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#message_modal">
            <img src="./images/bubble-chat.png" >
            <p class="m-0">${reels_data[i][7]}</p>
        </button>
    </div>
    <div class="send">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#send_message_modal">
            <img src="./images/send.png" >
        </button>
    </div>
    <div class="save not_saved">
        <img class="hide saved" src="./images/save_black.png" >
        <img class="not_saved" src="./images/save-instagram.png" >
    </div>
    <div class="more">
        <img src="./images/show_more.png" >
    </div>
    <div class="profile">
        <img src="${reels_data[i][1]}" >
    </div>
</div>`;
        } else {
            reel_div.innerHTML = `<div class="video">
      <video src="${reels_data[i][0]}" loop>
      </video>
      <div class="content">
          <div class="sound">
              <img class="volume-up" src="./images/volume-up.png" >
              <img class="volume-mute" src="./images/volume-mute.png" >
          </div>
          <div class="play">
              <img src="./images/play-button-arrowhead.png" >
          </div>
          <div class="info">
              <div class="profile">
                  <h4><a href="#">
                          <img src="${reels_data[i][1]}" >
                          ${reels_data[i][2]}
                      </a></h4>
                  <span>.</span>
                  <button class="follow_text">Follow</button>
              </div>
              <div class="desc">
                  <p>${reels_data[i][3]} <span class="show_text">more</span>
                  </p>
                  <div class="more">
                      <div class="music">
                          <img src="./images/music.png" >
                          <span>${reels_data[i][4]}</span>
                      </div>
                      <div class="position">
                          <img src="./images/map.png" >
                          <span>${reels_data[i][5]}</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="likes">
      <div class="like">
          <img class="not_loved" src="./images/love.png" >
          <img class="loved" src="./images/heart.png" >
          <p> ${reels_data[i][6]}</p>
      </div>
      <div class="messsage">
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#message_modal">
              <img src="./images/bubble-chat.png" >
              <p class="m-0">${reels_data[i][7]}</p>
          </button>
      </div>
      <div class="send">
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#send_message_modal">
              <img src="./images/send.png" >
          </button>
      </div>
      <div class="save not_saved">
          <img class="hide saved" src="./images/save_black.png" >
          <img class="not_saved" src="./images/save-instagram.png" >
      </div>
      <div class="more">
          <img src="./images/show_more.png" >
      </div>
      <div class="profile">
          <img src="${reels_data[i][1]}" >
      </div>
  </div>`;
        }

        reels_container.appendChild(reel_div);
    }

/**************************video**************************/
//play video onscroll
const videos = document.querySelectorAll("video");
const reels = document.querySelector(".reels");
// window.addEventListener("scroll", function () {
//     const scrollPosition = window.scrollY + window.innerHeight;
//     videos.forEach((video, index) => {
//         reels.children[index].removeAttribute("id");
//         const videoPosition =
//             video.getBoundingClientRect().top + video.offsetHeight / 2;
//         if (
//             scrollPosition > videoPosition &&
//             videoPosition > 0 &&
//             videoPosition <= video.offsetHeight
//         ) {
//             video.play();
//             reels.children[index].setAttribute("id", "video_play");
//         } else {
//             video.pause();
//         }
//     });
// });

//play && pause && mute video
// let video_container = document.querySelectorAll(".video");
// video_container.forEach(function (item) {
//   let video = item.children[0];
//   //if the user click on the video pause it
//   let button_play = item.children[1].children[1];
//   item.addEventListener("click", function () {
//     if (button_play.classList.contains("opac_1")) {
//       video.play();
//     } else {
//       video.pause();
//     }
//     button_play.classList.toggle("opac_1");
//   });
//   //if the user click the mute btn make the video mute
//   let mute_btn = item.children[1].children[0];
//   let volum_up = mute_btn.children[0];
//   let volum_mute = mute_btn.children[1];
//   mute_btn.addEventListener("click", function (e) {
//     e.stopPropagation();
//     if (!video.muted) {
//       video.muted = true;
//       volum_up.classList.add("hide_img");
//       volum_mute.classList.add("display");
//     } else {
//       video.muted = false;
//       volum_up.classList.remove("hide_img");
//       volum_mute.classList.remove("display");
//     }
//   });
//   //change the text follow ==> following and the opposite
//   let follow = item.children[1].children[2].children[0].children[2];
//   follow.addEventListener("click", function (e) {
//     e.stopPropagation();
//     follow.classList.toggle("following");
//     if (follow.classList.contains("following")) {
//       follow.innerHTML = "Following";
//     } else {
//       follow.innerHTML = "Follow";
//     }

//   });
// });

/**************************search+notif-section **************************/
//search section notif
let search = document.getElementById("search");
let search_icon = document.getElementById("search_icon");
search_icon.addEventListener("click", function () {
    search.classList.toggle("show");
});

let notification = document.getElementById("notification");
let notification_icon = document.querySelectorAll(".notification_icon");
notification_icon.forEach((notif) => {
    notif.addEventListener("click", function () {
        notification.classList.toggle("show");
    });
});

/**************************icons+text change **************************/
//change the icon when the user click on it

//love btn
// let love_icons = document.querySelectorAll(".like");
// love_icons.forEach(function (icon) {
//   icon.addEventListener("click", function () {
//     let not_loved = icon.children[0];
//     let loved = icon.children[1];
//     icon.classList.toggle("love");
//     loved.classList.toggle("display");
//   })
// });

//save btn
let save_icon = document.querySelectorAll(".save");
save_icon.forEach(function (save) {
    save.addEventListener("click", function () {
        let not_save = save.children[1];
        let saved = save.children[0];
        not_save.classList.toggle("hide");
        saved.classList.toggle("hide");
    });
});

//notification follow
let not_follow = document.querySelectorAll("#notification .notif.follow_notif");
not_follow.forEach((item) => {
    let follow = item.children[0].children[1].children[0];
    follow.addEventListener("click", function (e) {
        e.stopPropagation();
        follow.classList.toggle("following");
        if (follow.classList.contains("following")) {
            follow.innerHTML = "Following";
            follow.style.backgroundColor = "rgb(142, 142, 142)";
            follow.style.color = "black";
        } else {
            follow.innerHTML = "Follow";
            follow.style.backgroundColor = "rgb(0, 149, 246)";
            follow.style.color = "white";
        }
    });
});

/**************************comments **************************/

//comments
let replay_com = document.querySelector(".comments .responses");
let show_replay = document.querySelector(".comments .see_comment");
let hide_com = document.querySelector(".comments .see_comment .hide_com");
let show_com = document.querySelector(".comments .see_comment .show_c");
if (replay_com) {
    replay_com.classList.add("hide");
    hide_com.classList.add("hide");
    show_replay.addEventListener("click", function () {
        replay_com.classList.toggle("hide");
        show_com.classList.toggle("hide");
        hide_com.classList.toggle("hide");
    });
}

/*************emojie*************** */
$(document).ready(function () {
    $("#emoji").emojioneArea({
        pickerPosition: "top",
        tonesStyle: "radio",
    });
});

$(document).ready(function () {
    $("#emoji_create").emojioneArea({
        pickerPosition: "bottom",
        tonesStyle: "radio",
    });
});

$(document).ready(function () {
    $("#emoji_comment").emojioneArea({
        pickerPosition: "bottom",
        tonesStyle: "radio",
    });
});

/**********Upload post*************/
const form = document.getElementById("upload-form");
const img_container = document.querySelector("#image-container");

form.addEventListener("change", handleSubmit);

let img_url;
let filesUpload;
function handleSubmit(event) {
    event.preventDefault();
    if (img_container.classList.contains("hide_img")) {
        img_container.classList.remove("hide_img");
        const files = document.getElementById("image-upload").files;
        const carouselInner = document.querySelector(
            "#image-container .carousel-inner"
        );
        carouselInner.innerHTML = ""; // Clear previous images
        filesUpload = files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const fileURL = URL.createObjectURL(file);

            const carouselItem = document.createElement("div");
            carouselItem.classList.add("carousel-item");
            if (i === 0) {
                carouselItem.classList.add("active");
            }

            let mediaElement;
            if (file.type.includes("image")) {
                mediaElement = document.createElement("img");
            } else if (file.type.includes("video")) {
                mediaElement = document.createElement("video");
                mediaElement.controls = true;
            }

            mediaElement.src = fileURL;
            mediaElement.classList.add("d-block", "w-100");

            carouselItem.appendChild(mediaElement);

            carouselInner.appendChild(carouselItem);
        }

        const next_btn_post = document.querySelector(".next_btn_post");
        const title_create = document.querySelector(".title_create");
        next_btn_post.innerHTML = "Next";
        title_create.innerHTML = "Crop";
    }
    document.querySelector(".btn_upload").style.display = "none";
    document.querySelector(".myTxt").style.display = "none";
    document.querySelector(".myImg").style.display = "none";
    
}


/////button submit
const next_btn_post = document.querySelector(".next_btn_post");
next_btn_post.addEventListener("click", handleNext);
//add a description + click btn to share post
function handleNext() {
    const image_description = document.querySelector("#image_description");
    if (image_description.classList.contains("hide_img")) {
        const next_btn_post = document.querySelector(".next_btn_post");
        const title_create = document.querySelector(".title_create");
        // image_description = document.querySelector("#image_description");
        const modal_dialog = document.querySelector(
            "#create_modal .modal-dialog"
        );
        modal_dialog.classList.add("modal_share");
        image_description.classList.remove("hide_img");
        const image = document.createElement("img");
        image.src = img_url;
        const img_p = document.querySelector(".img_p");
        img_p.appendChild(image);
        next_btn_post.classList.add("share_btn_post");
        next_btn_post.classList.remove("next_btn_post");
        next_btn_post.innerHTML = "Share";
        title_create.innerHTML = "Create new post";
        completed();
    }
}

//post published
function completed() {
    const share_btn_post = document.querySelector(".share_btn_post");
    const post_published = document.querySelector(".post_published");
    const modal_dialog = document.querySelector("#create_modal .modal-dialog");
    share_btn_post.addEventListener("click", function () {
        addPost();
        modal_dialog.classList.add("modal_complete");
        post_published.classList.remove("hide_img");

        share_btn_post.innerHTML = "";
    });
}

// Retrieve CSRF token from meta tag
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

// Function to add a new post
async function addPost() {
    try {
        const postCaption = document.querySelector(".postCaption").value;
        console.log(postCaption);

        // Convert FileList to array
        const imageFileArray = Array.from(filesUpload);

        const formData = new FormData();
        formData.append("body", postCaption);

        // Append each file from the array to the FormData object
        imageFileArray.forEach((file) => {
            formData.append("files[]", file);
        });

        // Logging for debugging
        console.log("FormData:", formData);

        const requestOptions = {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            body: formData,
        };

        const response = await fetch("/posts", requestOptions);

        // if (!response.ok) {
        //   throw new Error('Network response was not ok');
        // }

        const data = await response.json();
        console.log("Post added successfully:", data);
        window.location.reload();
    } catch (error) {
        const creatPostResponse = document.querySelector("#creatPostResponse");
        creatPostResponse.innerHTML = `
    <div class="alert alert-danger" role="alert">
        <strong>Media size is too large!</strong> Please select a smaller file.
    </div>
`;
        console.error("Error adding post:", error);
    }
    //likers modal

    // document.addEventListener("DOMContentLoaded", function () {
    //     const postId = this.closest("form").dataset.postId;
    //     console.log("likersss" + document.getElementById(`likers-${postId}`));
    //     document
    //         .getElementById("likers")
    //         .addEventListener("click", function () {
    //             $("#likersModal").modal("show");
    //         });
    //     console.log(document.getElementById("likersClose"));
    //     document
    //         .getElementById("likersClose")
    //         .addEventListener("click", function () {
    //             $("#likersModal").modal("hide");
    //         });
    // });
}

$(document).ready(function () {
    $(".alert").fadeIn().delay(2000).fadeOut();
});


function postLikes() {
    document.querySelectorAll(".likeButton").forEach((button) => {
        button.removeEventListener("click", likeButtonClick);
        button.addEventListener("click", likeButtonClick);
    });
}

function likeButtonClick(event) {
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
            document.getElementById(`likers-${postId}`).innerText =
                data.likes_count + " likes";
            const svg = document.querySelector(`#svg-${postId}`);
            svg.setAttribute("fill", data.isLiked ? "red" : "white");
            const title = data.isLiked ? "Unlike" : "Like";
            svg.querySelector("title").textContent = title;
            document
                .getElementById(`likers-${postId}`)
                .addEventListener("click", function () {
                    drawLikersModal(data.likers);
                });
        })
        .catch((error) => console.error("Error:", error));
}

function drawLikersModal(likers) {
    const likersModal = document.getElementById("likersModal");
    const likersBody = likersModal.querySelector(".modal-body");
    const imagePath = "{{ asset('homePage/images/profile_img.jpg') }}";
    likersBody.innerHTML = "";

    likers.forEach((liker) => {
        const likerDiv = document.createElement("div");
        likerDiv.classList.add("d-flex", "align-items-center", "mb-2");
        likerDiv.innerHTML = `
              <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                  <div class="d-flex flex-row align-items-center">
                      <img class="rounded-circle" src="${imagePath}"  width="55" />
                      <div class="d-flex flex-column align-items-start ml-2">
                          <span class="font-weight-bold" style="font-size: 1.6em;">${liker.full_name}</span>
                      </div>
                  </div>
              </div>
          `;
        likersBody.appendChild(likerDiv);
    });

    $("#likersModal").modal("show");
}


/* -------------------------------------------------------------------------- */
/*                                  save post                                 */
/* -------------------------------------------------------------------------- */

document.addEventListener("DOMContentLoaded", () => {
    const successAlert = document.getElementById("successAlert");
    const warningAlert = document.getElementById("warningAlert");
    const hiddenInput = document.getElementById("hiddenInput");
    const saveBtn = document.getElementById("saveBtn");

    document.body.addEventListener("click", (event) => {
        const saveButton = event.target.closest(".savePostButton");
        if (saveButton) {
            const form = saveButton.closest("form");
            const postId = saveButton.dataset.postId;

            if (form) {
                const formData = new FormData(form);

                hiddenInput.classList.remove("hide");
                hiddenInput.classList.remove("hide_img");
                saveBtn.classList.remove("hide");
                saveBtn.classList.remove("hide_img");

                const xhr = new XMLHttpRequest();
                xhr.open("POST", form.getAttribute("action"), true);
                xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        handleResponse(response);
                    } else {
                        console.error("Error saving post. Status:", xhr.status);
                    }
                };
                xhr.onerror = () => {
                    console.error("Network error occurred.");
                };
                xhr.send(formData);
            } else {
                console.error("Form not found.");
            }
        }
    });

    function handleResponse(response) {
        successAlert.innerHTML = "";
        warningAlert.innerHTML = "";
        successAlert.classList.add("d-none");
        warningAlert.classList.add("d-none");

        if (response.success) {
            showAlert(successAlert, response.success, "alert-success");
        } else if (response.warning) {
            showAlert(warningAlert, response.warning, "alert-warning");
        }
    }

    function showAlert(alertElement, message, className) {
        alertElement.innerHTML = `<div class="alert ${className}">${message}</div>`;
        alertElement.classList.remove("d-none");
        alertElement.classList.add("d-block");
        $(alertElement).fadeIn(() => {
            setTimeout(() => {
                $(alertElement).fadeOut(() => {
                    alertElement.innerHTML = "";
                });
            }, 1500);
        });
    }
});

function resetCommentEvents() {
    var commentForms = document.querySelectorAll(".comment-form");
    commentForms.forEach(function (form) {
        form.removeEventListener("submit", handleCommentSubmission);
        form.addEventListener("submit", handleCommentSubmission);
    });
}

function handleCommentSubmission(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);
    var postId = form.dataset.postId;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log("Response:", response);
                console.log("Response:", response.likes_count);
                var commentInput = form.querySelector(".comment-input");

                var commentsSection = document.querySelector(
                    '.comments-section[data-post-id="' + postId + '"]'
                );
                if (commentsSection) {
                    var newComment = document.createElement("div");
                    newComment.classList.add(
                        "comment",
                        "d-flex",
                        "justify-content-between",
                        "align-items-center"
                    );
                    newComment.setAttribute("data-comment-id", response.comment_id);
                    newComment.innerHTML = `
                            <p>
                                <strong class="text-white">${response.user.full_name}</strong>
                                <span class="text-white">${response.comment}</span>
                            </p>
                            <div class="like d-flex align-items-center" data-comment-id="${response.comment_id}">
                                <button id="likeBtn-${response.comment_id}" class="btn btn-link like-button" onclick="toggleLike(${response.comment_id})">
                                    <img class="not-loved" src="https://res.cloudinary.com/dlmq1xbtj/image/upload/v1712629982/instagram-clone/love_en9mrj.png" alt="heart image">
                                </button>
                                <span class="text-white like-count">0 Likes</span>
                                <a class="btn text-white fw-bold delete-comment" onclick="deleteComment(${response.comment_id})">X</a>
                            </div>
                `;

                    commentsSection.prepend(newComment);
                    commentInput.value = "";
                } else {
                    console.error(
                        "Comments section not found for post ID:",
                        postId
                    );
                }
            } else {
                console.error(xhr.responseText);
            }
        }
    };
    xhr.send(formData);
}

document.addEventListener("DOMContentLoaded", function () {
    resetCommentEvents();
});

// Whenever you need to reset the comment event listeners, just call resetCommentEvents()

async function toggleLike(commentId) {
    const isLiked = document
        .querySelector(`.like[data-comment-id="${commentId}"] .like-button`)
        .classList.contains("liked");
    const method = isLiked ? "DELETE" : "POST";
    const url = isLiked
        ? `/comments/${commentId}/unlike`
        : `/comments/${commentId}/like`;

    try {
        const response = await fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        });

        if (!response.ok) {
            throw new Error("Failed to toggle like.");
        }

        const responseData = await response.json();

        updateLikeStatus(
            commentId,
            responseData.liked,
            responseData.likes_count
        );

        //modalllllllllll
        const modalLikeButton = document.querySelector(
            `.modal .like[data-comment-id="${commentId}"] .like-button`
        );
        const modalLikeCountElement = document.querySelector(
            `.modal .like[data-comment-id="${commentId}"] .like-count`
        );

        if (modalLikeButton && modalLikeCountElement) {
            modalLikeButton.classList.toggle("liked", responseData.liked);
            modalLikeCountElement.textContent =
                responseData.likes_count + " Likes";

            const modalLikeImage = modalLikeButton.querySelector("img");
            modalLikeImage.src = responseData.liked
                ? "https://res.cloudinary.com/dlmq1xbtj/image/upload/v1712629982/instagram-clone/heart_c9gabu.png"
                : "https://res.cloudinary.com/dlmq1xbtj/image/upload/v1712629982/instagram-clone/love_en9mrj.png";
        }

        //post
        const postLikeButton = document.querySelector(
            `.post_desc .like[data-comment-id="${commentId}"] .like-button`
        );
        const postLikeCountElement = document.querySelector(
            `.post_desc .like[data-comment-id="${commentId}"] .like-count`
        );

        if (postLikeButton && postLikeCountElement) {
            postLikeButton.classList.toggle("liked", responseData.liked);
            postLikeCountElement.textContent =
                responseData.likes_count + " Likes";

            const postLikeImage = postLikeButton.querySelector("img");
            postLikeImage.src = responseData.liked
                ? "https://res.cloudinary.com/dlmq1xbtj/image/upload/v1712629982/instagram-clone/heart_c9gabu.png"
                : "https://res.cloudinary.com/dlmq1xbtj/image/upload/v1712629982/instagram-clone/love_en9mrj.png";
        }

        updateLikeStatus(commentId, responseData.liked, responseData.likes_count);

    } catch (error) {
        console.error("Error:", error);
    }
}

function updateLikeStatus(commentId, isLiked, likeCount) {
    const likeButton = document.querySelector(
        `.like[data-comment-id="${commentId}"] .like-button`
    );
    likeButton.classList.toggle("liked", isLiked);
    likeButton.classList.remove("hide_img");

    const postLikeCountElement = document.querySelector(
        `.post_desc .like[data-comment-id="${commentId}"] .like-count`
    );
    if (postLikeCountElement) {
        postLikeCountElement.textContent = likeCount + " Likes";
    }

    const modalLikeCountElement = document.querySelector(
        `.modal .like[data-comment-id="${commentId}"] .like-count`
    );
    if (modalLikeCountElement) {
        modalLikeCountElement.textContent = likeCount + " Likes";
    }

    const likeImage = document.querySelector(
        `.like[data-comment-id="${commentId}"] .like-button img`
    );
    likeImage.src = isLiked
        ? "https://res.cloudinary.com/dlmq1xbtj/image/upload/v1712629982/instagram-clone/heart_c9gabu.png"
        : "https://res.cloudinary.com/dlmq1xbtj/image/upload/v1712629982/instagram-clone/love_en9mrj.png";
}

//search
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-input");

    searchInput.addEventListener("keyup", async function (event) {
        const query = event.target.value.trim();
        console.log("Query:", query);
        try {
            console.log('try block');
            const response = await fetch(`/search?query=${query}`);
            console.log(response);
            const data = await response.json();

            console.log(data);
            const searchResults = document.getElementById("search-result");
            console.log(searchResults);
            searchResults.innerHTML = "";
            data.forEach((user) => {
                console.log(user);


                searchResults.innerHTML += `
                <div class="account">
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="${user.profile_image}" alt="">
                            </div>
                            <div class="info">
                                <a href="http://127.0.0.1:8000/users/${user.user.id}/profile" class="name text-dark">${user.user.full_name}</a>
                                <p class="second_name">${user.user.username}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
            });
            console.log(data);
        } catch (error) {
            console.log("search error:", error);
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-input2");

    searchInput.addEventListener("keyup", async function (event) {
        const query = event.target.value.trim();
        console.log("Query:", query);
        try {
            console.log('try block');
            const response = await fetch(`/search?query=${query}`);
            console.log(response);
            const data = await response.json();

            console.log(data);
            const searchResults = document.getElementById("search-result2");
            searchResults.style.display = "block";
            console.log(searchResults);
            searchResults.innerHTML = "";
            data.forEach((user) => {
                console.log(user);


                searchResults.innerHTML += `
                <div class="account">
                    <div class="cart">
                        <div>
                        <a href="http://127.0.0.1:8000/users/${user.user.id}/profile">
                            <div class="img">
                                <img src="${user.profile_image}" alt="">
                            </div>
                            
                            <div class="info">
                                <a href="http://127.0.0.1:8000/users/${user.user.id}/profile" class="name text-white">${user.user.full_name}</a>
                                <p class="second_name">${user.user.username}</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
            });
          if(searchInput.value === ""){
            searchResults.style.display = "none";
          }
            console.log(data);
        } catch (error) {
            console.log("search error:", error);
        }
    });
});


// initialize post like and comment feature
window.addEventListener("DOMContentLoaded", function () {
    postLikes();
});


//delete comment
function deleteComment(commentId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/comments/${commentId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to delete comment');
        }
        return response.json();
    })
    .then(data => {
        console.log('Post ID:', data.post_id);
        console.log('Comment ID:', commentId);
    
        const commentElement = document.querySelector(`.comment[data-comment-id="${commentId}"]`);
        if (commentElement) {
            // console.log('Comment found:', commentElement);
            commentElement.remove();
        } else {
            console.error('Comment not found');
        }
    })         
    .catch(error => {
        console.error('Error:', error);
    });
}
