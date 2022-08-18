document.addEventListener('DOMContentLoaded', () => {
    iniciarApp();
});

function iniciarApp() {
    openMenu();
    closeMenu();
    openUser();
}

function openMenu() {
    const openMenu = document.querySelector('.menu-open');
    const closeMenu = document.querySelector('.menu-close');
    const nav = document.querySelector('.nav');
    const menu = document.querySelector('.menu');
    const body = document.querySelector('#body');
    const windowLog = document.querySelector('.window-log');

    openMenu.addEventListener('click', () => {
        openMenu.classList.toggle('menu-open_active');
        closeMenu.classList.toggle('menu-close_active');
        nav.classList.toggle('nav_active');
        menu.classList.toggle('menu-active');
        body.classList.toggle('overflowHidden');
        windowLog.classList.remove('window-log_active');
        if (menu.classList.contains('left-53')) {
            menu.classList.remove('left-53');
        }
    });
}

function closeMenu() {
    const body = document.querySelector('#body');
    const openMenu = document.querySelector('.menu-open');
    const closeMenu = document.querySelector('.menu-close');
    const nav = document.querySelector('.nav');
    const menu = document.querySelector('.menu');


    closeMenu.addEventListener('click', () => {
        menu.classList.toggle('menu-active');
        openMenu.classList.toggle('menu-open_active');
        closeMenu.classList.toggle('menu-close_active');
        nav.classList.toggle('nav_active');
        body.classList.toggle('overflowHidden');
        if (menu.classList.contains('left-53')) {
            menu.classList.remove('left-53');
        }
    });
}

function openUser() {
    const btnUser = document.querySelector('.btnUser');
    const windowLog = document.querySelector('.window-log');
    const nav = document.querySelector('.nav');
    const openMenu = document.querySelector('.menu-open');
    const closeMenu = document.querySelector('.menu-close');
    const menu = document.querySelector('.menu');

    btnUser.addEventListener('click', () => {
        windowLog.classList.toggle('window-log_active');
        if (!menu.classList.contains('left-53')) {
            menu.classList.add('left-53');
        }else{
            menu.classList.remove('left-53');
        }
        if (nav.classList.contains('nav_active')) {
            menu.classList.remove('menu-active');
            closeMenu.classList.remove('menu-close_active');
            openMenu.classList.remove('menu-open_active');
            nav.classList.remove('nav_active');
        }
    })
}

function closeUser() {

}

/* Dashboard */


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

/* function calcularEdad(fechaNacimiento) {
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

} */

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
        }, 5300);
    }

}
