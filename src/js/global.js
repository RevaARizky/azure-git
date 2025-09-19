import gsap from "gsap"
import { easeInOut } from "./utils/easing"


const zIndexSections = (defaultWrapper = '.page-container') => {
    const wrapper = document.querySelector(defaultWrapper)
    Array.from(wrapper.children).forEach((el, i) => {
        el.style.zIndex = i
    })
}

const generateLoadingScreen = (modifier = 0, count = 40) => {
    var style = ''
    for(let i = 0; i < count; i++) {
        style += `transparent ${(i) * (100 / count)}% ${((i + modifier)) * (100 / count)}%,rgba(22, 67, 113, 1) ${(i) * (100 / count)}% ${(i + 1) * (100 / count)}%${i + 1 != count ? ',' : ''}`
        // style += `rgba(22, 67, 113, 1) ${(i + modifier) * (100 / count)}% ${(i + 1) * (100 / count)}%${i + 1 != count ? ',' : ''}`
    }
    return style
}

const halfLoad = () => {
    const event = new Event('halfLoad')
    window.dispatchEvent(event)
}

const afterLoad = () => {
    const loadingElement = document.querySelector('#loading-screen')
    loadingElement.loaded = true
    // loadingElement.style.display = 'none'
    const event = new Event('afterLoad')
    window.dispatchEvent(event)
}

const animateModifier = (modifier = 0, duration = 450) => {
    const loadingElement = document.querySelector('#loading-screen')
    const start = performance.now()

    const tick = (now) => {
        const elapsed = now - start
        const linearProgress = Math.min(elapsed / duration, 1)
        const easedProgress = modifier ? modifier - easeInOut(linearProgress) : easeInOut(linearProgress)
        loadingElement.style.setProperty('--linear-gradient', generateLoadingScreen(easedProgress))
        loadingElement.querySelector('.loading-bg').style.opacity = 1 - easedProgress
        

        if (linearProgress < 1) {
            if(linearProgress > .5) {
                halfLoad()
            }
            requestAnimationFrame(tick)
        } else {
            window.doneLoading = true
            afterLoad()
        }
    }

    requestAnimationFrame(tick)
}

const initLoadingScreen = () => {
    window.doneLoading = false
    if(document.querySelector('.block-header')) {
        const image = document.querySelector('.block-header img')
        if(image) {
            if(image.complete) {
                animateModifier()
            } else {
                image.addEventListener('load', () => {
                    animateModifier()
                })
            }
        } else {
            animateModifier()
        }
    } else {
        const image = document.querySelector('img')
        if(image) {
            if(image.complete) {
                animateModifier()
            } else {
                image.addEventListener('load', () => {
                    animateModifier()
                })
            }
        } else {
            animateModifier()
        }
    }
    // prevent unlimited load
    // setTimeout(() => {
    //     if(!window.doneLoading) {
    //         animateModifier()
    //     }
    // }, 10000)
}

const checkForSamePage = (e, a) => {
    const aUrl = new URL(a.href, window.location.origin)
    const currentUrl = new URL(window.location.href)
    if (a.href == '#' || a.href == 'javascript:void(0)') return true;
    if (aUrl.pathname === currentUrl.pathname && aUrl.search === currentUrl.search ) return true;
    return false
}

const delayLink = () => {
    document.addEventListener('click', e => {
        const a = e.target.closest('a[href]');
        if (!a) return;
        if (ignoreModifiedClick(e, a)) return;
        e.preventDefault()
        if (!checkForSamePage(e, a)) {
            doSomething(a).then(() => {
                continueNav(a);
            });
        }
    });
}

function ignoreModifiedClick(e, a) {
    if (a.target && a.target !== '_self') return true;
    if (e.defaultPrevented) return true;
    if (e.button !== 0) return true;
    if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return true;
    return false;
}

function doSomething(a) {
    return new Promise(resolve => {
        /* do tracking, animation, confirm, etc */
        // document.querySelector('#loading-screen').strips.reverse()
        animateModifier(1, 450)
        // return false
        setTimeout(resolve, 500)
    });
}

function continueNav(a) {
    const href = a.href;
    if (a.target === '_blank' || a.rel.includes('noopener') || a.rel.includes('noreferrer')) {
        window.open(href, a.target || '_blank', 'noopener');
    } else {
        window.location.assign(href);
    }
}

const initLinksMenu = (element) => {
    element.hover = gsap.timeline({paused: true})
    const color = window.getComputedStyle(element).color
    if(element.classList.contains('active')) {
        gsap.set(element, {
            '--color': color,
            '--transform': '0%'
        })
    } else {
        gsap.set(element, {
            '--color': color,
            '--transform': '-105%'
        })
        element.addEventListener('mouseenter', () => {
            gsap.to(element, {
                '--transform': '0%'
            })
        })
        element.addEventListener('mouseleave', () => {
            gsap.to(element, {
                '--transform': '100%'
            }).then(res => {
                gsap.set(element, {
                    '--transform': '-105%'
                })
            })
        })
    }
}


const initGlobal = () => {
    // Global func here
    initLoadingScreen()
    zIndexSections()
    delayLink()
    document.querySelectorAll('aside a, footer a').forEach(initLinksMenu)
}

export {initGlobal, initLoadingScreen}