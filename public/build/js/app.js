function iniciarApp(){mostrarMenu(),ocultarMenu(),switchSection()}function mostrarMenu(){document.querySelector(".open-menu").addEventListener("click",()=>{const e=document.querySelector(".navegacion"),t=document.querySelector(".close-menu"),n=document.querySelector(".open-menu");t.classList.contains("hidden")?(t.classList.remove("hidden"),n.classList.add("hidden"),e.classList.remove("hidden")):(t.classList.add("hidden"),n.classList.remove("hidden"),e.classList.add("hidden"))})}function ocultarMenu(){document.querySelector(".close-menu").addEventListener("click",()=>{const e=document.querySelector(".navegacion"),t=document.querySelector(".close-menu"),n=document.querySelector(".open-menu");t.classList.contains("hidden")?(t.classList.remove("hidden"),n.classList.add("hidden"),e.classList.remove("hidden")):(t.classList.add("hidden"),n.classList.remove("hidden"),e.classList.add("hidden"))})}document.addEventListener("DOMContentLoaded",()=>{iniciarApp()});let paso=1;function switchSection(){const e=document.querySelectorAll(".nav-list li button");document.querySelector("#btnPerfil").addEventListener("click",e=>{e.preventDefault(),location.assign("/account/dashboard")}),e.forEach(e=>{e.addEventListener("click",e=>{switch(paso=parseInt(e.target.dataset.paso),paso){case parseInt(1):location.assign("/account/basic-information");break;case parseInt(2):location.assign("/account/payments");break;case parseInt(3):location.assign("/account/my-certificates");break;case parseInt(4):location.assign("/account/my-courses");break;case parseInt(5):location.assign("/account/security");break;default:location.assign("/")}})})}function calcularEdad(e){const t=new Date,n=parseInt(t.getFullYear()),s=parseInt(t.getMonth()+1),a=parseInt(t.getDate()),c=parseInt(String(e).substring(0,2)),o=parseInt(String(e).substring(3,5)),i=parseInt(String(e).substring(6,10));let r=n-c;return(s<o||s===o&&a<i)&&r--,r}function mostrarAlerta(e,t,n,s=!0){if(document.querySelector(".alerta"))return;const a=document.createElement("DIV");a.textContent=e,a.classList.add("alerta",t);document.querySelector(n).appendChild(a),s&&setTimeout(()=>{a.remove()},3e3)}