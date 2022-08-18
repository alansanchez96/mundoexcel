let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btnSidebar");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
});

function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");//replacing the iocns class
    }
}

let paso = 1;

const botones = document.querySelectorAll('.nav-list li button');
const btnPerfil = document.querySelector('#btnPerfil');

btnPerfil.addEventListener('click', e => {
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
