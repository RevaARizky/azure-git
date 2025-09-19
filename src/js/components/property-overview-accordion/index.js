import gsap from "gsap"
import Swiper from "swiper"
import { Pagination, Navigation } from "swiper/modules"

const initPropertyOverviewAccordion = (element) => {

    const accordionWrapper = element.querySelector('.table-wrapper')
    const accordionItems = accordionWrapper.querySelectorAll('.accordion-wrapper')
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
    const toggleAccordion = (item) => {
        // if()
        const description = item.querySelector('.accordion-item')
        const title = item.querySelector('.tab-wrapper')
        const icon = title.querySelector('.icon')
        let prop = {height: 0, rotate: '0deg'}
        accordionItems.forEach(i => {
            const _description = i.querySelector('.accordion-item')
            const _title = i.querySelector('.tab-wrapper')
            const _icon = _title.querySelector('.icon')
            gsap.to(_description, {
                height: prop.height
            })
            gsap.to(_icon, {
                rotate: prop.rotate
            })
            // i.isOpen = false
        })

        if(!item.isOpen) {
            prop.height = 'auto'
            prop.rotate = '90deg'
        }
        gsap.to(description, {
            height: prop.height
        })
        gsap.to(icon, {
            rotate: prop.rotate
        })
        item.isOpen = !item.isOpen
    }


    accordionItems.forEach((accordion, i) => {
        accordion.style.cursor = 'pointer'
        accordion.isOpen = false
        if(!i) {
            accordion.isOpen = true
        }
        accordion.addEventListener('click', () => {
            toggleAccordion(accordion)
        })
    })
}

export {initPropertyOverviewAccordion}