import Swiper from "swiper"
import { EffectFade, Pagination, Navigation } from "swiper/modules"

const initPropertyOverview = (element) => {

    const imageEl = element.querySelector('.swiper.property-image')
    const textEl = element.querySelector('.swiper.property-text')

    const imageSlider = new Swiper(imageEl, {
        slidesPerView: 1,
        pagination: true,
        modules: [Pagination, Navigation],
        navigation: {
            // enabled: true,
            prevEl: '.button-prev',
            nextEl: '.button-next'
        },
        pagination: {
            el: element.querySelector('.swiper-pagination'),
            clickable: true
        },
    })
    const textSlider = new Swiper(textEl, {
        slidesPerView: 1,
        allowTouchMove: false,
        modules: [EffectFade],
        effect: 'fade',
        fadeEffect: {crossFade: true},
    })
    const sliders = [
        imageSlider,
        textSlider
    ]

    imageSlider.on('realIndexChange', (swiper) => {
        textSlider.slideTo(swiper.activeIndex)
        setActive(swiper.activeIndex)
    })

    const setActive = (i) => {
        element.querySelectorAll('.tab-trigger').forEach(el => {
            el.classList.remove('active')
        })
        element.querySelector(`.tab-trigger[data-index="${i}"]`).classList.add('active')
    }

    element.querySelectorAll('.tab-trigger').forEach(el => {
        el.addEventListener('click', () => {
            sliders.forEach(e => {
                e.slideTo(el.dataset.index)
            })
            setActive(el.dataset.index)
        })
    })

}

export {initPropertyOverview}