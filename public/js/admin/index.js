//manue bar
const manueStick = document.querySelector(`.manueStick`);
const navbarCollect = document.querySelector(`#navbarCollapse`);

manueStick.addEventListener('click', () => {
    if (manueStick.classList.contains('clicked')) {

        manueStick.classList.remove('clicked');
        navbarCollect.classList.remove('showManues');
        navbarCollect.classList.add('hideManues');

    } else {
        manueStick.classList.add('clicked');
        navbarCollect.classList.add('showManues');
        navbarCollect.classList.remove('hideManues');
    }
});



//image preview
function previewImage() {
    const preview = document.querySelector('.selectPreviewImage');
    const file = document.querySelector('.inputPreviewImage').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function() {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }

}