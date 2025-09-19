import gsap from "gsap"
import SplitText from "gsap/SplitText"

const initHeader = (element) => {
    const media = element.querySelector('.media')
    const childElements = element.querySelectorAll('.box > .acf-block')
    gsap.set(media, { scale: 1.3 })

    let tl = gsap.timeline({ paused: true })
    let splitInstances = []

    const buildAnimation = () => {
        // cleanup old
        splitInstances.forEach(s => s.revert())
        splitInstances = []
        tl.kill()
        tl = gsap.timeline({ paused: true })

        childElements.forEach(el => {
            gsap.set(el, {
                overflowY: 'hidden',
                position: 'relative',
                paddingTop: '2px'
            })

            if (/^(P|H[1-6])$/.test(el.children[0].tagName)) {
                const split = new SplitText(el.children, {
                    type: "lines",
                    linesClass: 'lines',
                    mask: 'lines'
                })
                console.log(split)
                splitInstances.push(split)

                gsap.set(split.lines, { overflowY: 'hidden' })
                tl.fromTo(split.lines, { yPercent: 100 }, { yPercent: 0 }, 0)
            } else {
                tl.fromTo(el.children, { yPercent: 100 }, { yPercent: 0 }, 0)
            }
        })
    }

    buildAnimation()

    const halfLoad = () => {
        gsap.to(media, {
            scale: 1,
            ease: 'power2'
        })
    }
    window.addEventListener('halfLoad', halfLoad)

    const afterLoad = () => {
        tl.play(0)
    }
    window.addEventListener('afterLoad', afterLoad)

    window.addEventListener('resize', () => {
        buildAnimation()
        afterLoad()
    })
}

export { initHeader }
