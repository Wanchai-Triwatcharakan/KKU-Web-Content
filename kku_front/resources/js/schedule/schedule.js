document.querySelectorAll('.room-btn').forEach(button => {
    button.addEventListener('click', function() {
        const roomNumber = this.getAttribute('data-room');

        // ซ่อนข้อมูลของห้องทั้งหมด
        document.querySelectorAll('.room-data').forEach(room => {
            room.classList.add('hidden');
        });

        // แสดงข้อมูลของห้องที่เลือก
        document.querySelector(`.room-data[data-room="${roomNumber}"]`).classList.remove('hidden');

        // เอา active class ออกจากปุ่มที่ไม่ได้เลือก
        document.querySelectorAll('.room-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // เพิ่ม active class ให้ปุ่มที่เลือก
        this.classList.add('active');
    });
});

// แสดงข้อมูลห้องแรกตอนเริ่มต้น
document.querySelector('.room-btn[data-room="1"]').classList.add('active');
document.querySelector('.room-data[data-room="1"]').classList.remove('hidden');





//backToTop
// เมื่อมีการเลื่อนหน้าต่าง ตรวจสอบว่าควรแสดงปุ่มหรือไม่
window.onscroll = function() {
    toggleBackToTopButton();
};

function toggleBackToTopButton() {
    const backToTopButton = document.getElementById("BackToTop");

    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopButton.style.display = "block";  // แสดงปุ่มเมื่อเลื่อนเกิน 10px
    } else {
        backToTopButton.style.display = "none";  // ซ่อนปุ่มเมื่ออยู่ด้านบน
    }
}

// เมื่อคลิกปุ่ม Back to Top
document.getElementById("BackToTop").addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"  // เลื่อนขึ้นอย่างนุ่มนวล
    });
});
