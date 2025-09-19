import Swiper from "swiper"
import { Pagination, Navigation } from "swiper/modules"

const initPropertyOverviewIndividual = (element) => {

    const imageEl = element.querySelector('.swiper.property-image')
    const prevEl = element.querySelector('.button-prev')
    const nextEl = element.querySelector('.button-next')

    const imageSlider = new Swiper(imageEl, {
        slidesPerView: 1,
        pagination: true,
        modules: [Pagination, Navigation],
        navigation: {
            // enabled: true,
            prevEl: prevEl,
            nextEl: nextEl
        },
        pagination: {
            el: element.querySelector('.swiper-pagination'),
            clickable: true
        },
    })

}

export {initPropertyOverviewIndividual}