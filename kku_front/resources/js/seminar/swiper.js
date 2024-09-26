var swiper = new Swiper(".swiper1", {
    slidesPerView:1,
    spaceBetween: 20,
    loop: true,
    // direction: getDirection(),
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    grabCursor: "true",
    breakpoints: {
        340: {
            slidesPerView: 1,
            spaceBetween: 5,
            centerSlide: true,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 5,
            centerSlide: true,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 10,
            centerSlide: true,
        },
        1280: {
            slidesPerView: 5,
            spaceBetween: 20,
            centerSlide: true,
        },
        1539: {
            slidesPerView: 6,
            spaceBetween: 15,
            centerSlide: true,
        },
        1600: {
            slidesPerView: 8,
            centerSlide: true,
        },
    },
});