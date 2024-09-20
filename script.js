function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    const content = document.querySelector('.content');
    const menuIcon = document.querySelector('.menu-icon');
  
    sidebar.classList.toggle('active');
    content.classList.toggle('menu-opened');
    menuIcon.classList.toggle('menu-opened');
  }