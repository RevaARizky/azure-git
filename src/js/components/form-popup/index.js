import gsap from "gsap"

const initFormPopup = (element) => {
    
    const downloadButton = element.querySelector('#pdf-button')
    const formElement = element.querySelector('form')
    const overlayElement = element.querySelector('.overlay')

    element.onOpen = () => {
        gsap.to(element, {
            autoAlpha: 1,
            visibility: 'visible'
        })
    }

    element.onClose = () => {
        gsap.to(element, {
            autoAlpha: 0,
            visibility: 'hidden'
        })
    }

    element.onSubmitForm = () => {
        gsap.to(downloadButton, {
            display: 'block'
        })
    }

    gsap.set(element, {
        autoAlpha: 0,
        visibility: 'hidden'
    })

    overlayElement.addEventListener('click', element.onClose)

    element.querySelector('.close-button').addEventListener('click', element.onClose)

    formElement.addEventListener('wpcf7submit', element.onSubmitForm)
    
}

export {initFormPopup}