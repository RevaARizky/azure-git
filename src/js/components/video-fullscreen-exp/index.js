import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"

gsap.registerPlugin(ScrollTrigger)

const initVideoFullscreenEXP = (element) => {

    if(window.innerWidth<1024) return

    const containerVideoSelector = element.querySelector('.container.video--container')
    const wrapperSelector = element.querySelector('.video-wrapper')
    const outer = element.querySelector('.outer')
    const inner = element.querySelector('.inner')
    const video = element.querySelector('video')

    // gsap.set(element, {
    //     marginBottom: () => {
    //         const margin = `${(window.innerHeight/4) - 32}px`
    //         console.log(margin)
    //         return margin
    //     }
    // })
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
            onEnter: () => {
                console.log('enter')
            },
            onLeave: () => {
                // console.log('leave')
                // video.pause()
                // if(!window.tlExp) return
                // window.tlExp.scrollTrigger.refresh()
                // ScrollTrigger.refresh()
            },
            onLeaveBack: () => {
                // video.pause()
            },
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
        // marginTop: () => {
        //     const margin = `-${(window.innerHeight/4) - 32}px`
        //     console.log(margin)
        //     return margin
        // }
    }, 0)
    tl.to(containerVideoSelector, {
        maxWidth: '100%',
        width: '100%',
        paddingLeft: 0,
        paddingRight: 0,
        // marginTop: '-18vh',
        onStart: () => {
            video.play()
        }
    }, 0)
    tl.to(wrapperSelector, {
        paddingTop: '100vh'
    }, 0)
    // tl.to(wrapperSelector, {
    //     opacity: 0
    // })
    // tl.to(wrapperSelector, {
    //     paddingTop: '100vh'
    // })
    window.tlVideo = tl
    window.tlVideo.videoEl = video
}

export {initVideoFullscreenEXP}