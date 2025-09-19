import gsap from "gsap"

const initButton = (el) => {
    let xSet, ySet, flair
    const init = () => {
        const button = gsap.utils.selector(el)
        flair = gsap.utils.selector(el)('.button__flair')

        xSet = gsap.quickSetter(flair, "xPercent")
        ySet = gsap.quickSetter(flair, "yPercent")
    }
    console.log(el.classList)
    if(el.classList.contains('trigger-popup-form')) {
        console.log('trigger')
        const formElement = document.querySelector('#popup-form')
        el.addEventListener('click', e => {
            e.preventDefault()
            formElement.onOpen()
        })
    }

    const getXY = e => {
        const {left, top, width, height} = el.getBoundingClientRect()

        const xTransformer = gsap.utils.pipe(
            gsap.utils.mapRange(0, width, 0, 100),
            gsap.utils.clamp(0, 100)
        )

        const yTransformer = gsap.utils.pipe(
            gsap.utils.mapRange(0, height, 0, 100),
            gsap.utils.clamp(0, 100)
        )

        return {
            x: xTransformer(e.clientX - left),
            y: yTransformer(e.clientY - top)
        };
    }

    const initEvents = () => {
        el.addEventListener("mouseenter", e => {
            const {x, y} = getXY(e)

            xSet(x)
            ySet(y)

            gsap.to(flair, {
                scale: 1,
                duration: .4,
                ease: "power2.out"
            })
        })

        el.addEventListener("mouseleave", e => {
            const {x, y} = getXY(e)

            gsap.killTweensOf(flair)
            gsap.to(flair, {
                xPercent: x>90 ? x+20 : x<10 ? x-20 : x,
                yPercent: y>90 ? y+20 : y<10 ? y-20 : y,
                scale: 0,
                duration: .3,
                ease: 'power2.out'
            })
        })

        el.addEventListener("mousemove", (e) => {
            const { x, y } = getXY(e);
      
            gsap.to(flair, {
                xPercent: x,
                yPercent: y,
                duration: 0.4,
                ease: "power2"
            });
        });
    }

    init()
    initEvents()
}

export {initButton}


// class Button {

//   }
  
//   const buttonElements = document.querySelectorAll('[data-block="button"]');
  
//   buttonElements.forEach((buttonElement) => {
//     new Button(buttonElement);
//   });
  