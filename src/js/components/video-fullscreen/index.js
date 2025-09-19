import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"

gsap.registerPlugin(ScrollTrigger)

const initVideoFullscreen = (element) => {
    if(window.innerWidth < 768) return
    const containerVideoSelector = element.querySelector('.container.video--container')
    const wrapperSelector = element.querySelector('.video-wrapper')
    const outer = element.querySelector('.outer')
    const inner = element.querySelector('.inner')
    const video = element.querySelector('video')
    gsap.set(wrapperSelector, {
        paddingTop: '50vh'
    })
    gsap.set(outer, {
        height: '100vh',
        // paddingTop: '4rem'
    })
    gsap.set(inner, {
        paddingTop: '32px'
    })
    const tl = gsap.timeline({
        paused: true, 
        scrollTrigger: {
            trigger: containerVideoSelector,
            pin: outer,
            scrub: true,
            start: "center center",
            end: "+=200%",
            onEnterBack: () => {
                video.play()
            },
        }
    })
    tl.to(outer, {
        paddingTop: 0,
    }, 0)
    tl.to(inner, {
        paddingTop: 0,
        marginTop: () => {
            const margin = `-${(window.innerHeight/4) - 32}px`
            return margin
        }
    }, 0)
    tl.to(containerVideoSelector, {
        maxWidth: '100%',
        width: '100%',
        paddingLeft: 0,
        paddingRight: 0,
        onStart: () => {
            video.play()
        }
    }, 0)
    tl.to(wrapperSelector, {
        paddingTop: '100vh'
    }, 0)
    window.tlVideo = tl
    window.tlVideo.videoEl = video
}

export {initVideoFullscreen}