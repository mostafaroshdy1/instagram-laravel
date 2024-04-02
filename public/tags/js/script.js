let postBodies = document.querySelectorAll("#post-body");

postBodies.forEach((body) => {
    let text = body.textContent;
    let hashtags = text.match(/#\w+/g);

    if (hashtags) {
        hashtags.forEach((hashtag) => {
            let newHashtag = `<a href="/hashtags/${hashtag.slice(
                1
            )}">${hashtag}</a>`;

            text = text.replace(hashtag, newHashtag);
        });
        body.innerHTML = text;
    }
});
