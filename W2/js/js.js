function reveal_sub() {
    button = document.getElementById("reveal_sub");
    content = document.getElementsByClassName("head_pic__content")[0];
    button.classList.add("hidden");
    content.classList.remove("hidden");
}