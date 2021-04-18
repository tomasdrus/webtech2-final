const navbar = document.getElementById("navbar");
const page = document.getElementById("page-content");
const header = document.getElementById("page-header");

window.addEventListener('resize', () => {
    if(window.innerWidth < 767){
        navbar.classList.remove('navbar--open')
    }
    else if (!header.classList.contains('header--open')) {
        navbar.classList.add('navbar--open')
    }
})

if(window.innerWidth < 767){
    navbar.classList.remove('navbar--open')
}

// Navbar             
function openNav() {
    if(navbar.classList.contains('navbar--open')){
        navbar.classList.remove('navbar--open')
        page.classList.add('page--open')
        header.classList.add('header--open')
    }
    else {
        navbar.classList.add('navbar--open')
        header.classList.remove('header--open')
        page.classList.remove('page--open')
    }
}