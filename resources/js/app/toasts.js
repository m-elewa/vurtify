import { Toast } from 'bootstrap';

// TODO: convert to Vue
window.addEventListener("DOMContentLoaded", function(){
    let toastScroll = function () {
        let headerHeight = 75;
        let toast = document.querySelector('.toast-absolute');
        let scrollValue = window.scrollY;

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
    let toastElList = [].slice.call(document.querySelectorAll('.toast'))
    toastElList.map(function (toastEl) {
        let ToastObject = new Toast(toastEl, {
            // autohide: true,
            // delay: 5000,
            // animation: true
        });
        ToastObject.show();
    })
});
