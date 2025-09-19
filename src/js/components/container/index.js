import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"

gsap.registerPlugin(ScrollTrigger)

const pageContainer = document.querySelector('.page-container')
const defaultColor = pageContainer.style.backgroundColor

const initContainerColor = (element) => {
    if(!element.dataset.sectionColor) return false
    if(element.dataset.sectionColor == defaultColor) return false
    const toColor = element.dataset.sectionColor
    const onLeaveHandler = () => {
        gsap.to(pageContainer, {
            backgroundColor: defaultColor
        })
    }
    const onEnterHandler = () => {
        gsap.to(pageContainer, {
            backgroundColor: toColor
        })
    }
    const tl = gsap.timeline({
        paused: true,
        scrollTrigger: {
            trigger: element,
            // markers: true,
            // pin: true,
            // scrub: true,
            start: 'top center',
            end: 'bottom center',
            onLeave: onLeaveHandler,
            onLeaveBack: onLeaveHandler,
            onEnter: onEnterHandler,
            onEnterBack: onEnterHandler
        }
    })
}

const initTwoColsContainer = (element) => {
    if(!element.dataset.layout) return false
    const targets = element.querySelectorAll('.block-two-column-item')
    if(element.dataset.layout == 'half') {
        targets.forEach(el => {
            el.classList.add('md:col-span-6')
        })
    }
    if(element.dataset.layout == 'quarter') {
        targets.forEach((el, i) => {
            if(i % 2) {
                el.classList.add('md:col-span-8')
            } else {
                el.classList.add('md:col-span-4')
            }
        })
    }
}

export {initTwoColsContainer, initContainerColor}