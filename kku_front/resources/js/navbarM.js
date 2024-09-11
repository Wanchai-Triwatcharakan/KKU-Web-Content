const btns = document.querySelectorAll('.mobile-menu-button');
const menu = document.querySelector('.m-nav');

btns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.currentTarget.classList.toggle('change');
        menu.classList.toggle('active');  // เพิ่มคลาส active แทนการใช้ hidden
    });
});
