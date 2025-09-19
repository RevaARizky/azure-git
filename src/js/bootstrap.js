import { initDrawBox } from "./components/drawbox"
import { initHamburger } from "./components/hamburger"
import { initCursor } from "./components/cursor"
import { initMarquee } from "./components/marquee"
import { initAccordionImage, initAccordion } from "./components/accordion"
import { initStrip } from "./components/strip"
import { initSplitText } from "./utils/split-text"
import { initMenu } from "./components/menu"
import { initButton } from "./components/button"
import { initVideo } from "./components/video"
import { initImageGrid } from "./components/image-grid"
import { initCarousel, initCarouselActivity } from "./components/carousel"
import { initReverseStrip } from "./components/strip"
import { initTwoColsContainer, initContainerColor } from "./components/container"
import { initForm } from "./components/form"
import { initPropertyOverview } from "./components/property-overview"
import { initTabs } from "./components/tabs"
import { initImage } from "./components/image"
import { initHeader } from "./components/header"
import { initSectionStripsHorizontal } from "./components/section-strips-horizontal"
import { initVideoFullscreen } from "./components/video-fullscreen"
import { initVideoFullscreenEXP } from "./components/video-fullscreen-exp"
import { initPropertyOverviewEXP } from "./components/property-overview-exp"
import { initPropertyOverviewIndividual } from "./components/property-overview-individual"
import { initFormPopup } from "./components/form-popup"
import { initPropertyOverviewAccordion } from "./components/property-overview-accordion"

const componentsMap = {
    '.drawbox': initDrawBox,
    '.hamburger-init': initHamburger,
    '.anim-cursor': initCursor,
    '.marquee-wrapper': initMarquee,
    '.block-accordion-image': initAccordionImage,
    '.section-strips': initStrip,
    '.split-text': initSplitText,
    '.button-liquid': initButton,
    '#menu': initMenu,
    '.block-video': initVideo,
    '.block-image-grid': initImageGrid,
    '.block-carousel': initCarousel,
    '.section-reverse-strips': initReverseStrip,
    '.block-two-column-container': initTwoColsContainer,
    '[data-section-color]': initContainerColor,
    '.block-accordion': initAccordion,
    '.block-carousel-activity': initCarouselActivity,
    '.block-form': initForm,
    '.block-property-overview': initPropertyOverview,
    '.block-tabs': initTabs,
    '.block-image': initImage,
    '.block-header': initHeader,
    '.block-section-strips-horizontal': initSectionStripsHorizontal,
    '.block-video-fullscreen': initVideoFullscreen,
    '.block-video-fullscreen-experimental': initVideoFullscreenEXP,
    '.block-property-overview-experimental': initPropertyOverviewEXP,
    '.block-property-overview-individual': initPropertyOverviewIndividual,
    '#popup-form': initFormPopup,
    '.block-property-overview-accordion': initPropertyOverviewAccordion
}

const initComponents = () => {
    for(const selector in componentsMap) {
        const elements = document.querySelectorAll(selector)
        if(elements.length > 0) {
            elements.forEach(element => {
                componentsMap[selector](element)
            })
        }
    }
}

export {initComponents}