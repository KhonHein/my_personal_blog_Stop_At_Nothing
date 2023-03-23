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

// // profile page
// let mainDiv = document.querySelector(`.mainDiv`);
// let myProfile = document.querySelector(`#myProfile`);
// let myProfilePage = ` My Pro `;
// myProfile.addEventListener('click', () => {
//     mainDiv.innerHTML(myProfilePage);
// });