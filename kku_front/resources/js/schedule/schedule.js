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