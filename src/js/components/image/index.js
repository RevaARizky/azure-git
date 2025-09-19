import gsap from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"
gsap.registerPlugin(ScrollTrigger)
const initImage = (element) => {
    const mobileRatio = element.dataset.mobileRatio
    const desktopRatio = element.dataset.desktopRatio
    const setStyle = (style) => {
        element.style.setProperty('--ratio', window.innerWidth < 768 ? mobileRatio : desktopRatio)
    }
    setStyle()
    window.addEventListener('resize', setStyle)

    const image = element.querySelector('img')
    if(element.classList.contains('no-anim')) {
        gsap.set(image, {
            height: '100%'
        })
    }
    gsap.set(image, {
        height: '170%'
    })

    gsap.to(image, {
        y: () => image.offsetHeight - element.offsetHeight,
        ease: 'none',
        scrollTrigger: {
            trigger: element,
            scrub: true,   
        }
    })
}

export {initImage}