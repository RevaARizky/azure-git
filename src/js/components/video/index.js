import gsap from "gsap";
import MorphSVGPlugin from "gsap/MorphSVGPlugin";

gsap.registerPlugin(MorphSVGPlugin)

// const cursor = (el) => {
//     const container = el
//     const cursor = el.querySelector('.cursor')

//     gsap.set(cursor, { xPercent: -50, yPercent: -50, autoAlpha: 1, top: 'calc(100%-38px)', left: 'calc(0%+64px)' });

//     let xTo, yTo

//     const windowMoveHandler = e => {
//         const rect = container.getBoundingClientRect();
//         xTo(e.clientX - rect.left);
//         yTo(e.clientY - rect.top);
//     }

//     const mouseenterHandler = () => {
//         gsap.set(cursor, { bottom: 'unset', left: 'unset' })
//         gsap.to(cursor, { autoAlpha: 1, ease: 'power1' })
//         xTo = gsap.quickTo(cursor, "left", { duration: 0.6, ease: "power3" }),
//             yTo = gsap.quickTo(cursor, "top", { duration: 0.6, ease: "power3" });

//         window.addEventListener("mousemove", windowMoveHandler);
//     }

//     container.addEventListener('mouseenter', mouseenterHandler)
//     container.addEventListener('mouseleave', () => {
//         gsap.to(cursor, { xPercent: -50, yPercent: -50, ease: 'power1' })
//         // xTo('calc(0%+64px)')
//         xTo(64)
//         // yTo('calc(100%-38px)')
//         yTo(container.clientHeight - 38)
//         window.removeEventListener('mousemove', windowMoveHandler)
//     })
// }

const initVideo = (el) => {
    el.isPlaying = false
    const video = el.querySelector('video')
    el.addEventListener('click', () => {
        el.isPlaying = !el.isPlaying
        if (el.isPlaying) {
            gsap.to(el.querySelector('.default path'), {
                morphSVG: {
                    shape: el.querySelector('.pause-button path'),
                    type: 'linear'
                }
            })
            video.play()
        } else {
            gsap.to(el.querySelector('.default path'), {
                morphSVG: {
                    shape: el.querySelector('.play-button path'),
                    type: 'linear'
                }
            })
            video.pause()
        }
    })

    // cursor(el.querySelector('.cursor-wrapper'))

}

export { initVideo }