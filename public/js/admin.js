const navbar = document.getElementById('navbar');
const page = document.getElementById('page-content');
const header = document.getElementById('page-header');
const dropdownLinks = document.querySelectorAll(".link--dropdown");
const dropdowns = document.querySelectorAll(".nav__dropdown");

window.addEventListener('resize', () => {
    if(window.innerWidth < 767){
        navbar.classList.remove('navbar--open')
    }
    if(!header.classList.contains('header--open')){
        navbar.classList.add('navbar--open')
    }
})

if(window.innerWidth < 767){
    navbar.classList.remove('navbar--open')
}
         
const openNavbar = () => {
    if(navbar.classList.contains('navbar--open')){
        navbar.classList.remove('navbar--open')
        page.classList.add('page--open')
        header.classList.add('header--open')
        return;
    }
    navbar.classList.add('navbar--open')
    header.classList.remove('header--open')
    page.classList.remove('page--open')  
}

dropdownLinks.forEach(link => (
    link.addEventListener('click', () => {
        link.nextElementSibling.classList.toggle("dropdown--active");
        link.classList.toggle("link--active");
    })
));

dropdowns.forEach(dropdown => {
    const links = dropdown.childNodes;
    links.forEach(link => {
        if(link.classList === undefined){
            return;
        }
        if(link.classList.contains('link--active')){
            dropdown.classList.add('dropdown--active');
            dropdown.previousElementSibling.classList.add('link--active');
            return;
        } 
    });
});