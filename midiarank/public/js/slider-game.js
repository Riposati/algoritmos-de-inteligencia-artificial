$(function(){
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        parallax: true,
        loop: true,
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        autoplay: {
            delay: 3000,
        },
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 300,
            modifier: 1,
            slideShadows : true,
        },
    });
});

