loadingOn("Aguarde um instante...");

window.onload = () => {
    setMode();
    setSidebar();
    loadingOff(800);
}

const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),

    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");


toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");


    if (sidebar.classList.contains("close"))
        handleSidebar("close");
    else
        handleSidebar("open");

})


modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        handleMode("dark");
        modeText.innerText = "Modo Claro";
    } else {
        handleMode("light");
        modeText.innerText = "Modo Escuro";
    }
});

/**
 * Save the theme at LocalSorage
 * @param {string} mode 
 */
function handleMode(mode) {
    localStorage.setItem("theme", mode);
}


/**
 * Search the theme saved at the LocalSorage and applies to the interface
 */
function setMode() {
    let mode = localStorage.getItem("theme") || "light";
    body.setAttribute("class", `${mode}`);
    let text = (mode === "dark") ? "Modo Claro" : "Modo Escuro";
    modeText.innerText = text;
}

/**
 * Save the theme at LocalSorage
 * @param {string} mode 
 */
function handleSidebar(mode) {
    localStorage.setItem("sidebar", mode);
}

/**
 * Search the sidebar saved at the LocalSorage and applies to the interface
 */
function setSidebar() {
    let mode = localStorage.getItem("sidebar") || "close";
    sidebar.setAttribute("class", `sidebar ${mode}`);
}
