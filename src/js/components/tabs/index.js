import gsap from "gsap"

const initTabs = (element) => {
    const elements = element.querySelectorAll('.accordion-item')

    elements.forEach(item => {
        const hoverElement = item.querySelector('.accordion-hover')
        gsap.set(hoverElement, {
            backgroundColor: '#214b77',
            yPercent: 100
        })
        item.addEventListener('mouseenter', (event) => {
            const rect = item.getBoundingClientRect();
            const mouseY = event.clientY;
            const afterSet = () => {
                gsap.to(hoverElement, {
                    yPercent: 0,
                    duration: .5,
                    ease: 'expo'
                })
                gsap.to(item.querySelector('p'), {
                    color: "#fff",
                    ease: 'none',
                    duration: .1
                })
            }
            if (mouseY < rect.top + rect.height / 2) {
                gsap.set(hoverElement, {
                    yPercent: -100
                }).then(afterSet)
            } else {
                gsap.set(hoverElement, {
                    yPercent: 100
                }).then(afterSet)
            }
        })
        item.addEventListener('mouseleave', (event) => {
            const rect = item.getBoundingClientRect();
            const mouseY = event.clientY;
            
            if (mouseY < rect.top + rect.height / 2) {
                gsap.to(hoverElement, {
                    yPercent: -100,
                    duration: .5,
                    ease: 'expo'
                })
            } else {
                gsap.to(hoverElement, {
                    yPercent: 100,
                    duration: .5,
                    ease: 'expo'
                })
            }
            gsap.to(item.querySelector('p'), {
                color: "#164371",
                ease: 'none',
                duration: .1
            })
        })
    })

}

export { initTabs }