document.addEventListener('DOMContentLoaded', function () {
   const images = Array.from(document.querySelectorAll('#swpImg > div'));
   const swiperWrapper = document.querySelector('.swiper-wrapper');
   const swiperPopup = document.getElementById('swiperPopup');
   const swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 30,
       navigation: {
           nextEl: '.swiper-button-next',
           prevEl: '.swiper-button-prev',
       },
       loop: false,
   });

   images.forEach((image, index) => {
       image.addEventListener('click', () => {
           // Clear the swiper wrapper
           swiperWrapper.innerHTML = '';

           // Add all images to the swiper
           images.forEach(img => {
               const imgSrc = img.getAttribute('data-image');
               const slide = document.createElement('div');
               slide.classList.add('swiper-slide');
               slide.innerHTML = `<img src="${imgSrc}" alt="" class="w-full h-full">`;
               swiperWrapper.appendChild(slide);
           });

           // Update the swiper
           swiper.update();

           // Open the popup
           swiperPopup.classList.remove('hidden');
           swiper.slideTo(index); // Show the clicked image
       });
   });

   // Close modal
   document.getElementById('closeModal').addEventListener('click', () => {
       swiperPopup.classList.add('hidden');
   });
});