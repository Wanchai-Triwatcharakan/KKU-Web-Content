document.getElementById('facebookShareButton').addEventListener('click', function() {
    const urlToShare = this.getAttribute('data-url'); // ดึงค่า URL ที่ต้องการแชร์
    const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(urlToShare)}`;

    // เปิดหน้าต่าง popup ขนาด 600x400 สำหรับแชร์
    window.open(facebookShareUrl, 'facebookShare', 'width=600,height=400,scrollbars=no,resizable=no');
});
