import gsap from "gsap"

const initAccordionImage = (element) => {
    const accordion = element.querySelector('.accordion-wrapper')
    const image = element.querySelector('.image-wrapper')
    const images = image.querySelectorAll('img')
    const hover = accordion.querySelector('.accordion-hover')
    gsap.set(hover, {
        autoAlpha: 0
    })
    let z = images.length + 1
    let lastActive = "0"
    images.forEach((el, i) => {
        gsap.set(el, {
            zIndex: images.length-i,
            clipPath: "inset(0% 0% 0%)",
            scale: 1
        })
    })
    let clipPath
    const accordions = accordion.querySelectorAll('.accordion-item')
    const boxHeight = accordions[0].getBoundingClientRect().height 

    accordions.forEach((el, i) => {
        el.addEventListener('mouseover', () => {
            if(el.classList.contains('active')) return
            accordions.forEach(e => e.classList.remove('active'))
            el.classList.add('active')
            gsap.to(hover, {
                autoAlpha: 1,
                translateY: `${boxHeight * i}px`
            })
            if(parseInt(el.dataset.id) > parseInt(lastActive)) {
                clipPath = 'inset(0% 0% 100%)'
            } else {
                clipPath = 'inset(100% 0% 0%)'
            }
            gsap.fromTo(images[i], {
                clipPath: clipPath,
                zIndex: z,
                scale: 1
            }, {
                scale: 1.2,
                clipPath: "inset(0% 0% 0%)"
            })
            z += 1
            lastActive = el.dataset.id
        })
    })
    accordion.addEventListener('mouseleave', () => {
        gsap.to(hover, {
            autoAlpha: 0
        })
    })
    
}

const initAccordion = (element) => {
    element.querySelectorAll('.accordion-item').forEach((el, i) => {
        const description = el.querySelector('.accordion-description-wrapper')
        gsap.set(description, {
            height: 0
        })
        el.addEventListener('click', () => {
            if(el.classList.contains('active')) {
                el.classList.remove('remove')
                gsap.to(description, {
                    height: 0,
                })
            } else {
                el.classList.add('active')
                gsap.to(description, {
                    height: 'auto',
                })
            }
        })
        gsap.set(el, {
            '--transform': '-100%'
        })
        el.addEventListener('mouseenter', () => {
            gsap.to(el, {
                '--transform': '0%'
            })
        })
        el.addEventListener('mouseleave', () => {
            gsap.to(el, {
                '--transform': '100%'
            }).then(res => {
                gsap.set(el, {
                    '--transform': '-100%'
                })
            })
        })
    })
}

export {initAccordionImage, initAccordion}