function iniciarApp(){sideBar()}function sideBar(){let e=document.querySelector(".sidebar");document.querySelector("#btnSidebar").addEventListener("click",()=>{e.classList.toggle("open")})}document.addEventListener("DOMContentLoaded",()=>{iniciarApp()});