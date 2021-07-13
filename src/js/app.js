document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive(){
    const nav = document.querySelector('.navegacion');
    if(nav.classList.contains('mostrar')) nav.classList.remove('mostrar');
    else nav.classList.add('mostrar');
}

function darkMode(){

    const preferencia = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(preferencia.matches);

    if(preferencia.matches) document.body.classList.add('dark-mode');
    else document.body.classList.remove('dark-mode');

    preferencia.addEventListener('change', function(){
        if(preferencia.matches) document.body.classList.add('dark-mode');
        else document.body.classList.remove('dark-mode');
    })

    const botonDM = document.querySelector('.dark-mode-boton');
    botonDM.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}