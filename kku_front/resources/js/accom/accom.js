const previewImages = document.querySelectorAll('.previewImage');
const imageModal = document.getElementById('imageModal');
const closeModal = document.getElementById('closeModal');

previewImages.forEach(previewImage => {
    previewImage.addEventListener('click', () => {
        imageModal.classList.remove('hidden');
        // Set the image in the modal based on the clicked image
        const imgSrc = previewImage.querySelector('img').src;
        document.getElementById('modalImage').src = imgSrc;
    });
});

closeModal.addEventListener('click', () => {
    imageModal.classList.add('hidden');
});

window.addEventListener('click', (e) => {
    if (e.target === imageModal) {
        imageModal.classList.add('hidden');
    }
});



document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1,
        spaceBetween: 130,
        loop: true,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },
    });
});