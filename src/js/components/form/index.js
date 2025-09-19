const initForm = (el) => {
    const formElement = el.querySelector('form')
    const realButtonElement = el.querySelector('input[type="submit"]')
    const fakeButtonElement = el.querySelector('.button.button-form-cf7')

    fakeButtonElement.addEventListener('click', (e) => {
        e.preventDefault()
        realButtonElement.click()
    })
}

export {initForm}