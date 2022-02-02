/* Post Pop Up */
const what_is_on_your_mind = document.querySelector(".post-area-top p");
const live_video = document.querySelector(".post-area-bottom-left");
const photo_video = document.querySelector(".post-area-bottom-mid");
const feeling_activity = document.querySelector(".post-area-bottom-right");
const post_pop_up_wrapper = document.querySelector(".post-pop-up-wrapper");
const close_post_pop_up_wrapper = document.querySelector(".close-post-pop-up");

what_is_on_your_mind.addEventListener("click", () => {
    post_pop_up_wrapper.style.display = "flex";
})

live_video.addEventListener("click", () => {
    post_pop_up_wrapper.style.display = "flex";
})

photo_video.addEventListener("click", () => {
    post_pop_up_wrapper.style.display = "flex";
})

feeling_activity.addEventListener("click", () => {
    post_pop_up_wrapper.style.display = "flex";
})

close_post_pop_up_wrapper.addEventListener("click", () => {
    post_pop_up_wrapper.style.display = "none";
})
/* End Post Pop Up */

/* Post Details */
let post_detail = document.querySelectorAll(".card-top-right");
let post_details_wrapper = document.querySelector(".post-details-wrapper");
const post_details_cancel = document.querySelector(".post-details-cancel");

post_detail.forEach(button => {
    button.addEventListener("click", () => {
        post_details_wrapper.style.display = "flex";
    })
})

post_details_cancel.addEventListener("click", () => {
    post_details_wrapper.style.display = "none";
})
/* End Post Details */

const post_upload_photo = document.querySelector(".post_upload_photo");
const input_post_upload_photo = document.querySelector(".input_post_upload_photo");

post_upload_photo.addEventListener("click", () => {
    input_post_upload_photo.click();
})

const like_dislike = document.querySelector('.like_dislike');

like_dislike.addEventListener('toggle', () => {
    like_dislike.style.color = "red";
});

let edit_comment_btn = document.querySelectorAll("#edit_comment_button")
let cancel_save_button = document.querySelectorAll("#cancel_save_button")
let cancel_save_wrapper = document.querySelectorAll(".cancel_save_wrapper")
let edit_delete_wrapper = document.querySelectorAll(".edit_delete_wrapper")

edit_comment_btn.forEach(button => {
    button.addEventListener("click", () => {
        edit_delete_wrapper.forEach(change => change.style.display = "none")
        cancel_save_wrapper.forEach(change => change.style.display = "flex")
    })
})

cancel_save_button.forEach(button => {
    button.addEventListener("click", () => {
        cancel_save_wrapper.forEach(change => change.style.display = "none")
        edit_delete_wrapper.forEach(change => { change.style.display = "flex"; change.style.flexDirection = "column"})
    })
})

$('.show_confirm').click(function(e) {
    if(!confirm('Are you sure you want to delete this?')) {
        e.preventDefault();
    }
});