// controle do menu hamburger
const menuIcon = document.querySelector('#mobile-menu');
const navList = document.querySelector('.navlist');

menuIcon.addEventListener('click', () =>{
    menuIcon.classList.toggle('bx-x');
    navList.classList.toggle('open');

    // Bloqueia o scroll
    document.body.style.overflow = navList.classList.contains('open') ? 'hidden' : 'auto';
})
// fechar o amburger
document.querySelectorAll('.navlist a').forEach(link => {
    link.addEventListener('click', ()=> {
        menuIcon.classList.remove('bx-x');
        navList.classList.remove('open');
        document.body.style.overflow = 'auto';
    })
})
// fechar ao rolar a página
window.addEventListener('scroll', ()=>{
    if(navList.classList.contains('open')){
        menuIcon.classList.remove('bx-x')
        navList.classList.remove('open')
        document.body.style.overflow = 'auto'
    }
})