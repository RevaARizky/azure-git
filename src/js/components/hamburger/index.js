import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"
import Observer from "gsap/Observer"
gsap.registerPlugin(ScrollTrigger, Observer)

const initHamburger = (el) => {
    const wrapper = document.querySelectorAll('.hamburger-wrapper')
    const item = el.querySelectorAll('.hamburger')
    if (document.querySelector('.trigger-on-window-scroll')) {
        el.onWindowScroll = gsap.timeline({
            paused: true,
            scrollTrigger: {
                trigger: document.querySelector('.trigger-on-window-scroll'),
                start: 'bottom top',
                once: false,
                scrub: true
            },
            onComplete: () => {
                wrapper.forEach(e => {
                    e.style.setProperty('--hamburger-bg-color', '#164371')
                })
            },
            onReverseComplete: () => {
                wrapper.forEach(e => {
                    e.style.setProperty('--hamburger-bg-color', '#fff')
                })
            }
        })
    } else {
        el.onWindowScroll = gsap.timeline({ paused: true })
        const checkWindowScroll = () => {
            if (window.scrollY > 150) {
                el.onWindowScroll.play()
                el.style.setProperty('--hamburger-bg-color', '#164371')
            } else {
                el.onWindowScroll.reverse()
                el.style.setProperty('--hamburger-bg-color', '#fff')
            }
        }
        window.addEventListener('scroll', checkWindowScroll)
        checkWindowScroll()
    }
    wrapper.forEach(e => {
        e.querySelectorAll('.hamburger').forEach((burger, i) => {
            el.onWindowScroll.fromTo(burger, {
                backgroundColor: '#fff'
            }, {
                backgroundColor: '#164371'
            }, 0)
            gsap.set(burger, {
                width: "32px",
                height: "2px",
                borderRadius: '2rem',
                // backgroundColor: "#164371",
                marginBottom: i == (e.querySelectorAll('.hamburger').length - 1) ? "0px" : "6px"
            })
        })
        e.addEventListener('mouseenter', () => {
            e.querySelectorAll('.hamburger').forEach((burger, i) => {
                gsap.to(burger, {
                    translateX: "200%",
                    delay: i / 10,
                    duration: .5
                })
            })
        })
        e.addEventListener('mouseleave', () => {
            e.querySelectorAll('.hamburger').forEach((burger, i) => {
                gsap.to(burger, {
                    translateX: '0%',
                    delay: i / 10,
                    duration: .5
                })
            })
        })
    })
    item.forEach((e, i) => {
    })
    el.onWindowScroll.fromTo('#fixed-menu', {
        // position: 'absolute',
        // translateY: '0',
        display: 'none'
    }, {
        display: 'block'
        // position: 'fixed',
        // translateY: '-100%',
    }, 0)
    // el.onWindowScroll.fromTo('#menu-trigger', {
    //     backgroundColor: 'transparent'
    // }, {
    //     backgroundColor: '#F5F3EE'
    // }, 0)
    // el.onWindowScroll.fromTo('header .logo-wrapper', {
    //     paddingTop: '24px',
    //     autoAlpha: 1
    // }, {
    //     paddingTop: '0',
    //     autoAlpha: 0
    // }, 0)
    // el.onWindowScroll.fromTo('header .logo-wrapper img', {
    //     display: 'block',
    // }, {
    //     display: 'none'
    // }, 0)

    el.scroll = gsap.timeline({ paused: true })
    el.scroll.fromTo('#fixed-menu', {
        yPercent: -100,
        duration: .4
    }, {
        yPercent: 0,
        duration: .4
    })
    if (!el.onWindowScroll.progress()) {
        el.scroll.play()
    }

    // el.addEventListener('mouseenter', () => {
    //     item.forEach((e, i) => {
    //         gsap.to(e, {
    //             translateX: "200%",
    //             delay: i / 10,
    //             duration: .5
    //         })
    //     })
    // })
    // el.addEventListener('mouseleave', () => {
    //     item.forEach((e, i) => {
    //         gsap.to(e, {
    //             translateX: '0%',
    //             delay: i / 10,
    //             duration: .5
    //         })
    //     })
    // })

    Observer.create({
        target: window,
        type: 'wheel,touch',
        onUp: () => {
            // if (!el.onWindowScroll.progress()) {
            //     // el.scroll.play()
            //     return
            // }
            el.scroll.play()
        },
        onDown: () => {
            el.scroll.reverse()
        }
    })
}

export { initHamburger }