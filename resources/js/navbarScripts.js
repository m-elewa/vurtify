document.addEventListener("DOMContentLoaded", function(){
    var navbarCollapse = function () {
        var nav = document.getElementById("mainNav");
        if (window.scrollY > 100) {
            nav.classList.add("navbar-shrink");
        } else {
            nav.classList.remove("navbar-shrink");
        }
    };
    navbarCollapse();
    window.addEventListener("scroll", navbarCollapse);
});
