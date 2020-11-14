window.addEventListener("DOMContentLoaded", function(){
    var toastScroll = function () {
        var headerHeight = 75;
        var toast = document.querySelector('.toast-absolute');
        var scrollValue = window.scrollY;

        if (scrollValue > headerHeight){
            toast.classList.add('toast-fixed');

        } else if (scrollValue < headerHeight){
            toast.classList.remove('toast-fixed');
        }
    };

    toastScroll();
    window.addEventListener("scroll", toastScroll);
});

window.addEventListener("load", function(){
    // Init Bootstrap tosts
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    toastElList.map(function (toastEl) {
        Toast = new bootstrap.Toast(toastEl, {
            // autohide: true,
            // delay: 5000,
            // animation: true
        });
        Toast.show();
    })
});
