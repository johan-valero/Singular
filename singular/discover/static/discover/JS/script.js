AOS.init({
    offset: 250, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 1000, // values from 0 to 3000, with step 50ms
    easing : "ease-in-out",
});

// ---------------------Swiper générale----------------------

const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoplay: true,
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    
    // And if we need scrollbar
    scrollbar: {
    el: '.swiper-scrollbar',
    },

    speed: 2000,
    effect: 'fade',
    fadeEffect: {
    crossFade: true,
    },
});

