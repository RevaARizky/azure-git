import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"
import SplitText from "gsap/SplitText"

gsap.registerPlugin(ScrollTrigger, SplitText)

const initSectionStripsHorizontal = (el) => {
    const textSplit = (el) => {
        const afterSplitHandler = (self) => {
            self.lines.forEach((line, i) => {
                gsap.set(line, {
                    yPercent: 100
                })
            })
        }
        el.split = SplitText.create(el, {
            type: "lines",
            linesClass: 'lines',
            autoSplit: true,
            mask: 'lines',
            onSplit: afterSplitHandler,
        })
        return el.split
    }

    function generateStrip(p = 0, c = 24, t = 0.004) {
        const color = 'rgba(22, 67, 113, 1)';
        const stops = [];
        const segmentSize = 1 / c;
        const totalProgressNeeded = segmentSize + (c - 1) * t;
        const effectiveProgress = p * totalProgressNeeded;

        for (let i = 0; i < c; i++) {
            const segmentStart = i * segmentSize;
            const segmentEnd = (i + 1) * segmentSize;
            
            const progressForSegment = Math.max(0, effectiveProgress - (i * t));
            const transparentWidth = Math.min(segmentSize, progressForSegment);

            const transparentEnd = segmentStart + transparentWidth;

            const segmentStartPct = (segmentStart * 100).toFixed(2);
            const segmentEndPct = (segmentEnd * 100).toFixed(2);
            const transparentEndPct = (transparentEnd * 100).toFixed(2);
            
            stops.push(`transparent ${segmentStartPct}% ${transparentEndPct}%`);
            stops.push(`${color} ${segmentStartPct}% ${segmentEndPct}%`);
        }

        return `${stops.join(',')}`;
    }

    const inner = el.querySelector('.inner')

    const bgWrapper = el.querySelector('.image-wrapper.background')
    const bgItems = bgWrapper.querySelectorAll('img')
    
    const titleWrapper = el.querySelector('.title')
    const titleItems = titleWrapper.querySelectorAll('.split-title')

    gsap.set(inner, {
        height: () => {
            return '100vh'
        }
    })
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: inner,
            start: () => {
                if(!window.tlVideo || window.tlVideo.progress()) return 'top top'
                if(window.innerWidth < 768) return 'top top'
                return `top top+=${((window.innerHeight/4) - 32)}`
            },
            end: '+=400%',
            pin: true,
            scrub: true,
            pinSpacer: true,
            onEnter: () => {
                if(window.tlVideo) {
                    tlVideo.videoEl.pause()
                }
            },
            onLeaveBack: () => {
                if(window.tlVideo) {
                    tlVideo.videoEl.play()
                }
            },
            onUpdate: self => {
                const itemProgress = Math.min(Math.floor(self.progress * titleItems.length), (titleItems.length - 1))
                titleItems.forEach((text, i) => {
                    if(i === itemProgress) return
                    gsap.to(text.split.lines, {
                        yPercent: 100
                    })
                })
                gsap.to(titleItems[itemProgress].split.lines, {
                    yPercent: 0
                })
            } 
        }
    })

    bgItems.forEach((image, i) => {
        if(i + 1 === bgItems.length) return
        gsap.set(image, {
            '--mask': generateStrip(0, 24),
            maskImage: 'linear-gradient(var(--mask))',
        })
        gsap.set(image, {
            scale: 1.2
        })
        tl.to(image, {
            onUpdate: self => {
                const progress = Math.max(Math.min(((tl.progress() * 100) * (bgItems.length - 1)) - (100 * i), 100), 0)
                image.style.setProperty('--mask', generateStrip(gsap.utils.clamp(0, 1, progress/ 100), 24))
            }
        }, 0)
    })
    titleItems.forEach((text,i) => {

        const afterSplitHandler = self => {
            if(i > 0) {
                gsap.set(self.lines, {
                    yPercent: 100
                })
            }
        }

        text.split = SplitText.create(text, {
            type: "lines",
            linesClass: 'lines',
            autoSplit: true,
            mask: 'lines',
            onSplit: afterSplitHandler,
        })
    })

    window.tlExp = tl

}

export {initSectionStripsHorizontal}