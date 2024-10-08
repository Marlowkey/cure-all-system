const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close = document.getElementById('close');

const MainImg = document.getElementById("MainImg");
const smallimg = document.getElementsByClassName("small-img");



if (bar) {
    bar.addEventListener('click', () =>{
        nav.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () =>{
        nav.classList.remove('active');

    })
}


function showLogin() {
    document.getElementById("tab-1").checked = true; // Set login tab as active
}
