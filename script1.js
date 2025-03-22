document.addEventListener("DOMContentLoaded", function () {
    var userIcon = document.getElementById("user-icon");
    var closeForm = document.getElementById("closeForm");
    var loginForm = document.getElementById("loginForm");
    var overlay = document.getElementById("overlay");

    // Afficher le formulaire et l'overlay
    userIcon.addEventListener("click", function (event) {
        event.preventDefault();
        loginForm.classList.add("active");
        overlay.style.display = "block";
    });

    // Fermer le formulaire et l'overlay
    closeForm.addEventListener("click", function () {
        loginForm.classList.remove("active");
        overlay.style.display = "none";
    });

    // Fermer en cliquant sur l'overlay
    overlay.addEventListener("click", function () {
        loginForm.classList.remove("active");
        overlay.style.display = "none";
    });
});
