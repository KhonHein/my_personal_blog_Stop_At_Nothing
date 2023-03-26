let menu = document.querySelector(`.manueStick`);
let leftPaneMenuDiv = document.querySelector(`.left-pane`);
menu.addEventListener('click', () => {
    if (menu.classList.contains('clicked')) {

        menu.classList.remove('clicked');
        leftPaneMenuDiv.classList.remove('showMenu');
        leftPaneMenuDiv.classList.add('hiddenMenu');

    } else {
        menu.classList.add('clicked');
        leftPaneMenuDiv.classList.add('showMenu');
        leftPaneMenuDiv.classList.remove('hiddenMenu');
    }

})