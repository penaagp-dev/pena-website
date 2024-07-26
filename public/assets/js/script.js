const togglemenu = () => {
    const burgermenu = document.querySelector(".menu-btn");
    const src = burgermenu.getAttribute('src');
    const iconname = src === 'assets/img/close.svg' ?
    'assets/img/burger-menu.svg'
    :
    'assets/img/close.svg';
    
    burgermenu.setAttribute(
        'src',
        iconname
    );
    const navigation = document.querySelector('.menu-nav');

    navigation.classList.toggle(
        'menu-nav--mobile'
    );
}