function iniciarApp(){openMenu(),closeMenu(),switchSection()}function openMenu(){const e=document.querySelector(".menu-open"),t=document.querySelector(".menu-close"),n=document.querySelector(".nav"),c=document.querySelector(".menu");e.addEventListener("click",()=>{e.classList.toggle("menu-open_active"),t.classList.toggle("menu-close_active"),n.classList.toggle("nav_active"),c.classList.toggle("menu-active")})}function closeMenu(){const e=document.querySelector(".menu-open"),t=document.querySelector(".menu-close"),n=document.querySelector(".nav"),c=document.querySelector(".menu");t.addEventListener("click",()=>{c.classList.toggle("menu-active"),e.classList.toggle("menu-open_active"),t.classList.toggle("menu-close_active"),n.classList.toggle("nav_active")})}document.addEventListener("DOMContentLoaded",()=>{iniciarApp()});let paso=1;function switchSection(){const e=document.querySelectorAll(".nav-list li button");document.querySelector("#btnPerfil").addEventListener("click",e=>{e.preventDefault(),location.assign("/account/dashboard")}),e.forEach(e=>{e.addEventListener("click",e=>{switch(paso=parseInt(e.target.dataset.paso),paso){case parseInt(1):location.assign("/account/basic-information");break;case parseInt(2):location.assign("/account/payments");break;case parseInt(3):location.assign("/account/my-certificates");break;case parseInt(4):location.assign("/account/my-courses");break;case parseInt(5):location.assign("/account/security");break;default:location.assign("/")}})})}function calcularEdad(e){const t=new Date,n=parseInt(t.getFullYear()),c=parseInt(t.getMonth()+1),a=parseInt(t.getDate()),s=parseInt(String(e).substring(0,2)),o=parseInt(String(e).substring(3,5)),r=parseInt(String(e).substring(6,10));let i=n-s;return(c<o||c===o&&a<r)&&i--,i}function mostrarAlerta(e,t,n,c=!0){if(document.querySelector(".alerta"))return;const a=document.createElement("DIV");a.textContent=e,a.classList.add("alerta",t);document.querySelector(n).appendChild(a),c&&setTimeout(()=>{a.remove()},3e3)}