function toggleOverlay() {
    var overlay = document.getElementById("overlay");
    overlay.classList.toggle("hidden");
}

function handleFormSubmit(event) {

}

document.getElementById("adduser").addEventListener("click", toggleOverlay);




document.getElementById("remove").addEventListener("click", function(event) {
    event.preventDefault();
    toggleOverlay();
});

document.getElementById("overlay").addEventListener("click", function(event) {
    if (event.target.id === "overlay") {
        toggleOverlay();
    }
});

document.getElementById("overlay-form").addEventListener("submit", handleFormSubmit);












document.addEventListener("DOMContentLoaded", function() {

    function toggleArticleOverlay() {
        var overlay = document.getElementById("Articleoverlay");
        overlay.classList.toggle("hidden");
    }

    // document.querySelectorAll(".addarticle").forEach(function(button) {
    //     button.addEventListener("click", toggleArticleOverlay);
    // });

    document.getElementById("delete").addEventListener("click", function(event) {
        event.preventDefault();
        toggleArticleOverlay();
    });

    document.getElementById("Articleoverlay").addEventListener("click", function(event) {
        if (event.target.id === "Articleoverlay") {
            toggleArticleOverlay();
        }
    });

    document.getElementById("overlays-form").addEventListener("submit", handleFormSubmits);
});
