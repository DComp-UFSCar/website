window.onload = function () {
  var menu = document.querySelector('.toggleMenu');
  menu.addEventListener('click', openMenu);
  var backdrop = document.querySelector('.backdrop');
  backdrop.addEventListener('click', closeMenu);
}

function openMenu() {
  document.body.classList.add('menu-visible');
}

function closeMenu() {
  document.body.classList.remove('menu-visible');
}