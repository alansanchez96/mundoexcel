document.addEventListener('DOMContentLoaded', () => {
    iniciarApp();
});

function iniciarApp() {
    openMenu();
    closeMenu();

    /* Dashboard */
    switchSection();

}

function openMenu(){
    const openMenu = document.querySelector('.menu-open');
    const closeMenu = document.querySelector('.menu-close');
    const nav = document.querySelector('.nav');
    const menu = document.querySelector('.menu');
    
    openMenu.addEventListener('click', () => {
        openMenu.classList.toggle('menu-open_active');
        closeMenu.classList.toggle('menu-close_active');
        nav.classList.toggle('nav_active');
        menu.classList.toggle('menu-active');
    });
}

function closeMenu(){
    const openMenu = document.querySelector('.menu-open');
    const closeMenu = document.querySelector('.menu-close');
    const nav = document.querySelector('.nav');
    const menu = document.querySelector('.menu');
    
    closeMenu.addEventListener('click', () => {
        menu.classList.toggle('menu-active');
        openMenu.classList.toggle('menu-open_active');
        closeMenu.classList.toggle('menu-close_active');
        nav.classList.toggle('nav_active');
    });
}

/* Dashboard */

let paso = 1;

function switchSection() {

    const botones = document.querySelectorAll('.nav-list li button');
    const btnPerfil = document.querySelector('#btnPerfil');

    btnPerfil.addEventListener('click', e =>{
        e.preventDefault();
        location.assign('/account/dashboard');
    })

    botones.forEach(boton => {
        boton.addEventListener('click', e => {
            paso = parseInt(e.target.dataset.paso);

            switch (paso) {
                case parseInt(1):
                    location.assign('/account/basic-information');
                    break;
                case parseInt(2):
                    location.assign('/account/payments');
                    break;
                case parseInt(3):
                    location.assign('/account/my-certificates');
                    break;
                case parseInt(4):
                    location.assign('/account/my-courses');
                    break;
                case parseInt(5):
                    location.assign('/account/security');
                    break;

                default:
                    location.assign('/');
                    break;
            }

        })
    });
}

/* function switchSectio2n() {
    const botones = document.querySelectorAll('.nav-list li button');

    botones.forEach(boton => {
        boton.addEventListener('click', e => {
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
        })
    });
}

let paso = 1;

function mostrarSeccion() {

    const seccionAnterior = document.querySelector('.mostrar-seccion');

    if (seccionAnterior) {
        seccionAnterior.classList.remove('mostrar-seccion');
    }
    
    const seccion = document.querySelector(`#paso-${paso}`);
    seccion.classList.add('mostrar-seccion');
    
    const tabActual = document.querySelector('.actual');
    if (tabActual) {
        tabActual.classList.remove('actual');
    }

    const seccionActual = document.querySelector(`[data-paso="${paso}"]`);
    seccionActual.classList.add('actual');
    

} */

/* Validaciones */

function calcularEdad(fechaNacimiento) {
    const fechaActual = new Date();
    const añoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth() + 1);
    const diaActual = parseInt(fechaActual.getDate());

    const añoNacimiento = parseInt(String(fechaNacimiento).substring(0, 2));
    const mesNacimiento = parseInt(String(fechaNacimiento).substring(3, 5));
    const diaNacimiento = parseInt(String(fechaNacimiento).substring(6, 10));

    let edad = añoActual - añoNacimiento;
    if (mesActual < mesNacimiento) {
        edad--;
    }
    else if (mesActual === mesNacimiento) {
        if (diaActual < diaNacimiento) {
            edad--;
        }
    }
    return edad;

}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {

    const alertaPrevia = document.querySelector('.alerta');
    if (alertaPrevia) {
        return;
    }

    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta', tipo);

    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if (desaparece) {
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }

}
