const backdrop = document.querySelector('.backdrop');
backdrop.addEventListener('click', function () {
    backdrop.style.display = 'none'
})

const toggle = document.querySelector("#nav-toggle");
toggle.addEventListener('click', function () {
    backdrop.style.display = "block"
})