import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"
gsap.registerPlugin(ScrollTrigger)
import { reverseForEach } from "@/utils"
import { easeInOut } from "@/utils/easing"

const initStrip = (el, { count = 48 } = {}) => {
    // if(el.dataset?.experimental) return initExperimentalStrip(el)
    const wrapper = document.createElement('div')
    el.style.position = 'relative'
    wrapper.classList.add('strip-wrapper')
    wrapper.style.position = 'absolute'
    wrapper.style.inset = '0'
    wrapper.style.pointerEvents = 'none'
    wrapper.style.zIndex = '9'
    // wrapper.style.position = 'relative'
    const height = Math.ceil(el.clientHeight / count)
    for (let i = 0; i < count; i++) {
        const strip = document.createElement('div')
        strip.classList.add('strip-item')
        strip.style.height = `${height}px`
        strip.style.overflow = 'hidden'
        const inner = document.createElement('div')
        inner.style.height = `${Math.ceil(height + (height * 0.1))}px`
        inner.classList.add('strip')
        inner.style.backgroundColor = 'var(--bg-color)'
        strip.append(inner)
        gsap.set(inner, {
            yPercent: 100
        })
        inner.style.willChange = 'transform'
        inner.style.backfaceVisibility = 'hidden'
        wrapper.append(strip)
    }
    el.append(wrapper)

    el.strips = gsap.timeline({
        paused: true,
        scrollTrigger: {
            trigger: el,
            scrub: true,
            start: "bottom bottom",
            end: "bottom top-=200px",
            // markers: true
        }
    })
    reverseForEach(wrapper.querySelectorAll('.strip-item .strip'), (e, i) => {
        el.strips.fromTo(e,
            {
                yPercent: 100,
                force3D: true
            },
            {
                yPercent: 0,
                duration: 1.2,
                force3D: true
            }, (i / 12))
    })

    window.addEventListener('resize', () => {
        // wrapper.remove()
        el.querySelectorAll('.strip-wrapper').forEach(e => { e.remove() })
        initStrip(el)
    })

    return el;
}

const initReverseStrip = (el, { count = 48 } = {}) => {
    // if(el.dataset?.experimental) return initExperimentalStrip(el)
    const wrapper = document.createElement('div')
    el.style.position = 'relative'
    wrapper.classList.add('reverse-strip-wrapper')
    wrapper.style.position = 'absolute'
    wrapper.style.inset = '0'
    wrapper.style.pointerEvents = 'none'
    wrapper.style.zIndex = '9'
    const height = el.clientHeight / count
    for (let i = 0; i < count; i++) {
        const strip = document.createElement('div')
        strip.classList.add('reverse-strip-item')
        strip.style.height = `${height}px`
        strip.style.overflow = 'hidden'
        const inner = document.createElement('div')
        inner.style.height = `${height + (height * 0.1)}px`
        inner.classList.add('strip')
        inner.style.backgroundColor = 'var(--bg-color)'
        strip.append(inner)
        // gsap.set(inner, {
        //     transform: 'translateY(101%)'
        // })
        wrapper.append(strip)
    }
    el.append(wrapper)

    el.strips = gsap.timeline({
        paused: true,
        scrollTrigger: {
            trigger: el,
            scrub: true,
            start: "top bottom",
            end: "center center-=25%",
            // markers: true
            // end: "bottom top-=200px",
            // markers: true
        }
    })
    wrapper.querySelectorAll('.reverse-strip-item .strip').forEach((e, i) => {
        el.strips.fromTo(e,
            {
                transform: 'translateY(0)',
            },
            {
                transform: 'translateY(101%)',
                duration: 1.2
            }, (i / 12))
    })

    window.addEventListener('resize', () => {
        el.querySelectorAll('.reverse-strip-wrapper').forEach(e => { e.remove() })
        initReverseStrip(el)
    })

    return el;
}

const initExperimentalStrip = (element) => {
    const count = 30
    gsap.set(element.querySelector('.inner'), {
        backgroundImage: "linear-gradient(var(--linear-gradient, rgba(22, 67, 113, 1), rgba(22, 67, 113, 1)))"
    })
    const generateStrip = (modifier = 0) => {
        var style = ''
        for (let i = 0; i < count; i++) {
            style += `transparent ${(i) * (100 / count)}% ${((i + modifier)) * (100 / count)}%,rgba(22, 67, 113, 1) ${(i) * (100 / count)}% ${(i + 1) * (100 / count)}%${i + 1 != count ? ',' : ''}`
        }
        return style
    }

    const animateModifier = (vars) => {
        const duration = 450
        const start = performance.now()

        const tick = (now) => {
            const elapsed = now - start
            const linearProgress = Math.min(elapsed / duration, 1)
            // const easedProgress = modifier ? modifier - easeInOut(linearProgress) : easeInOut(linearProgress)
            const easedProgress = easeInOut(linearProgress)
            element.style.setProperty('--linear-gradient', generateStrip(easedProgress))
            // element.querySelector('.loading-bg').style.opacity = 1 - easedProgress


            if (linearProgress < 1) {
                requestAnimationFrame(tick)
            }
        }

        requestAnimationFrame(tick)
    }

    ScrollTrigger.create({
        trigger: element,
        start: "bottom center",
        end: "bottom top-=200px",
        onUpdate: animateModifier,
    })
}


export { initStrip, initReverseStrip }