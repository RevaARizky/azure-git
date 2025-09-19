import Swiper from "swiper";
import {Navigation, Pagination} from "swiper/modules"
const initCarousel = (el) => {

    const swiperSelector = el.querySelector('.swiper')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1,
        spaceBetween: 20,
        modules: [Navigation],
        navigation: {
            enabled: true,
            prevEl: '.button-prev',
            nextEl: '.button-next'
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3
            }
        },
        loop: true
    })

}

const initCarouselActivity = (el) => {
    const swiperSelector = el.querySelector('.swiper')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1.5, 
        spaceBetween: 15,
        modules: [Navigation, Pagination],
        navigation: {
            enabled: true,
            prevEl: '.button-prev',
            nextEl: '.button-next'
        },
        pagination: {
            el: el.querySelector('.swiper-pagination'),
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 35
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 76
            }
        }
    })
}

export { initCarousel, initCarouselActivity }