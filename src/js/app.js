import { initScroll } from "./utils/scrolls"
import { initComponents } from "./bootstrap"
import { initGlobal, initLoadingScreen } from "./global"

initScroll()
initGlobal()
document.addEventListener("DOMContentLoaded", () => {
    initComponents()
})

window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        initLoadingScreen()
    }
});