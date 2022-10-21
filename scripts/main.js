function toggleNavMenu(){
    let button = document.getElementById("toggle-menu-button")
    let menu = document.getElementById("header-menu-phone")
    menu.classList.toggle("active")
    button.classList.toggle("active")
}