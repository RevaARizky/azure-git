// import LocomotiveScroll from "locomotive-scroll";


gsap.registerPlugin(ScrollSmoother, ScrollTrigger)

const initLocomotiveScroll = () => {
    
}

// const initLocomotiveScroll = () => {
//     let scroll
//     const initSmoothScroll = () => {
//         scroll = new LocomotiveScroll({
//             // lenisOptions: {
//             //     duration: 2.4,
//             //     lerp: .4
//             // }
//             // lerp: .4,
//             // el: document.querySelector('[data-scroll-container]'),
//             smooth: true

//         })
//         window.LocomotiveScroll = scroll
//     }

//     const destroySmoothScroll = () => {
//         if (scroll) {
//             scroll.destroy()
//             scroll = null
//         }
//     }

//     const handleScrollInit = () => {
//         const isMobile = window.innerWidth < 768

//         if (isMobile) {
//             destroySmoothScroll()
//         } else {
//             if (!scroll) {
//                 initSmoothScroll()
//             }
//         }
//     }

//     // Call on load
//     handleScrollInit()

//     // Call on resize
//     window.addEventListener('resize', () => {
//         handleScrollInit()
//     })
//     return scroll
// }


export { initLocomotiveScroll }