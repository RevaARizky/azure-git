import gsap from "gsap"
import DrawSVGPlugin from "gsap/DrawSVGPlugin";
gsap.registerPlugin(DrawSVGPlugin)

const svgBoxDrawer = (el) => {
    const size = el.getBoundingClientRect()
    const xmlns = "http://www.w3.org/2000/svg";
    const svgRes = document.createElementNS(xmlns, 'svg')
    svgRes.setAttributeNS(null, "viewBox", `0 0 ${size.width} ${size.height}`)
    svgRes.setAttributeNS(null, "width", size.width + 1)
    svgRes.setAttributeNS(null, "height", size.height + 1)
    const margin = 0
    const coordsBase = [
        [margin, margin],
        [size.width - margin, margin],
        [size.width - margin, size.height - margin],
        [margin, size.height - margin]
    ]

    const generateCoords = ([startX, startY], [endX, endY], margin = 4) => {
        return `M${startX} ${startY} L${endX} ${endY} `
    }
    let d = ''
    coordsBase.forEach((coord, i) => {
        d = generateCoords(coord, coordsBase[(i + 1) % coordsBase.length])
        const path = document.createElementNS(xmlns, "path")
        path.setAttributeNS(null, 'd', d)
        svgRes.appendChild(path)
    })

    return svgRes
}

const initDrawBox = (el) => {
    const svg = svgBoxDrawer(el)
    el.append(svg)
    svg.querySelectorAll('path').forEach((e, i) => {
        gsap.set(e, {
            drawSVG: 0
        })
    })
    svg.anim = gsap.timeline({ paused: true })

    const duration = .3
    svg.querySelectorAll('path').forEach((e, i) => {
        svg.anim.to(e, { drawSVG: true, duration: duration }, i * duration)
    })
    el.addEventListener('mouseenter', () => {
        svg.anim.play()
    })
    el.addEventListener('mouseleave', () => {
        svg.anim.reverse()
    })
    
    return svg
}

export {initDrawBox}