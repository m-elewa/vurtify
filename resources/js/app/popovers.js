import { Popover } from 'bootstrap';

// TODO: convert to Vue
window.addEventListener("load", function () {
    let deletePhotoButton = document.getElementById('delete-profile-photo')
    let popover =  new Popover(deletePhotoButton, {
        html: true,
        placement: 'auto',
        sanitize: false,
        title: '<small>Are you sure you want to delete the profile photo?</small>',
        content:
            `<div class="text-center">
                <button onclick="document.getElementById('delete-profile-photo-form').submit()" class="btn btn-danger text-white px-4 fw-bold me-1">Delete</button>
                <button id="cancel-delete-profile-photo" class="btn btn-primary text-white px-4 fw-bold">Cancel</button>
            </div>`
    })

    deletePhotoButton.addEventListener("shown.bs.popover", function () {
        document.getElementById("cancel-delete-profile-photo").addEventListener("click", function () {
            popover.hide()
        })
    });
});

