import Swiper from "swiper";

const initImageGrid = (el) => {
    const swiperSelector = el.querySelector('.image-grid .swiper')
    const swiper =  new Swiper(swiperSelector, {
        slidesPerView: 1.4,
        centeredSlides: true,
        spaceBetween: 16,
    })
}


export {initImageGrid}