import gsap from "gsap";
import { disableScroll, enableScroll } from "@/utils/scrolls";

const initMenu = (el) => {
    const menuTrigger = document.querySelectorAll(el.dataset.triggerOpen)
    const closeTrigger = document.querySelectorAll(el.dataset.triggerClose)
    const wrapper = document.querySelector('#menu-wrapper')
    const overlay = document.querySelector('#menu-overlay')

    const classMenuWrapper = wrapper.querySelector('.menu-wrapper')

    const init = () => {
        el.anim = gsap.timeline({paused: true})

        el.anim.fromTo(wrapper, {
            translateX: '100vw',
            pointerEvents: 'none'
        }, {
            translateX: 0,
            pointerEvents: 'auto'
        })
        // el.anim.fromTo(overlay, {
        //     autoAlpha: 0,
        //     pointerEvents: 'none',
        // }, {
        //     autoAlpha: 1,
        //     pointerEvents: 'auto'
        // })
    }

    const closeHandler = () => {
        el.anim.reverse()
        classMenuWrapper.style.height = 'min-content'
        // document.body.classList.remove('no-scroll')
        enableScroll()
    }
    const openHandler = () => {
        if(window.innerHeight < classMenuWrapper.clientHeight) {
            classMenuWrapper.style.display = 'block'
            classMenuWrapper.style.textAlign = 'center'
            classMenuWrapper.style.overflow = 'scroll'
            classMenuWrapper.style.paddingTop = '2rem'
            classMenuWrapper.style.paddingBottom = '2rem'
        } else {
            classMenuWrapper.style.display = 'flex'
            classMenuWrapper.style.textAlign = 'center'
            classMenuWrapper.style.overflow = 'scroll'
            classMenuWrapper.style.paddingTop = '0'
            classMenuWrapper.style.paddingBottom = '0'
        }
        classMenuWrapper.style.height = '100%'
        el.anim.play()
        // document.body.classList.add('no-scroll')
        disableScroll()
    }
    menuTrigger.forEach(e => {
        e.addEventListener('click', openHandler)
    })
    closeTrigger.forEach(e => {
        e.addEventListener('click', closeHandler)
    })
    overlay.addEventListener('click', closeHandler)
    
    init()
}

export {initMenu}