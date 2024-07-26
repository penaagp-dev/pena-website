  // Navbar fixed
  window.onscroll = function() {
    const header = document.querySelector('header');
    const fixedNav = header ? header.offsetTop : 0;
    const toTop = document.querySelector('#to-top');

    if (header && toTop) {
        if (window.pageYOffset > fixedNav) {
            header.classList.add('navbar-fixed');
            toTop.classList.remove('hidden');
            toTop.classList.add('flex');
        } else {
            header.classList.remove('navbar-fixed');
            toTop.classList.remove('flex');
            toTop.classList.add('hidden');
        }
    }
};

// Hamburger aktif
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');

if (hamburger && navMenu) {
    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('hamburger-active');
        navMenu.classList.toggle('hidden');
    });
}

// Klik di luar hamburger
window.addEventListener('click', function (e) {
    if (hamburger && navMenu && e.target !== hamburger && e.target !== navMenu && !navMenu.contains(e.target)) {
        hamburger.classList.remove('hamburger-active');
        navMenu.classList.add('hidden');
    }
});

// Dark mode toggle
const darkToggle = document.querySelector('#dark-toggle');
const html = document.querySelector('html');

if (darkToggle && html) {
    darkToggle.addEventListener('click', function () {
        if (darkToggle.checked) {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    });

    // Pindahkan posisi toggle sesuai mode
    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        darkToggle.checked = true;
        html.classList.add('dark');
    } else {
        darkToggle.checked = false;
        html.classList.remove('dark');
    }
}
