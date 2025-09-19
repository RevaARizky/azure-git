import gsap from "gsap";

const initCursor = (el) => {
    const container = el 
    const cursor = el.querySelector('.cursor')

    gsap.set(cursor, {xPercent: -50, yPercent: -50, autoAlpha: 0});

    let xTo, yTo

    const windowMoveHandler = e => {
        const rect = container.getBoundingClientRect();
        xTo(e.clientX - rect.left);
        yTo(e.clientY - rect.top);
      }

    const mouseenterHandler = () => {
        gsap.to(cursor, {autoAlpha: 1, ease: 'power1'})
        xTo = gsap.quickTo(cursor, "x", {duration: 0.6, ease: "power3"}),
        yTo = gsap.quickTo(cursor, "y", {duration: 0.6, ease: "power3"});
        
        window.addEventListener("mousemove", windowMoveHandler);
    }

    container.addEventListener('mouseenter', mouseenterHandler)
    container.addEventListener('mouseleave', () => {
        gsap.to(cursor, {autoAlpha: 0, ease: 'power1'})
        window.removeEventListener('mousemove', windowMoveHandler)
    })
}

export { initCursor }