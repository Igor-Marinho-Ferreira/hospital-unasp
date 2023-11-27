const BASE_URL = `${window.location.protocol}//${window.location.host}/${window.location.pathname.split('/')[1]}/${window.location.pathname.split('/')[2]}`;

//Global for query params
const urlParams = new URLSearchParams(window.location.search);




/**
 * Method responsible for displaying notiflix and console.log
 * @param {string} message 
 * @param {string} messageForDevs 
 */
function showingErrorHTTP(message, messageForDevs) {
    notiflixNotify(message, "error");
    console.log(messageForDevs);
}


/**
 * Method responsible for configuring the confirm of notiflix with the company's style
 */
function notiflixConfirm() {
    let amstedOrGreenbrier = Array.from(document.querySelector("body").classList).includes("theme-am") ? "#0C134F" : "#32c682";
    Notiflix.Confirm.init({
        titleColor: amstedOrGreenbrier,
        okButtonColor: '#f8f8f8',
        okButtonBackground: amstedOrGreenbrier,
    });
}

function notiflixNotifyConfigs() {
    Notiflix.Notify.init({
        width: '400px',
        plainText: false,
        messageMaxLength: 900,

        success: {
            background: '#14C38E',
            textColor: '#fff',
            childClassName: 'notiflix-notify-success',
            notiflixIconColor: '#FFF6F4',
            fontAwesomeClassName: 'fas fa-check-circle',
            fontAwesomeIconColor: '#FFF6F4',
            backOverlayColor: 'rgba(50,198,130,0.2)',
        },
        failure: {
            background: '#FF4747',
            textColor: '#fff',
            childClassName: 'notiflix-notify-failure',
            notiflixIconColor: '#FFF6F4',
            fontAwesomeClassName: 'fas fa-times-circle',
            fontAwesomeIconColor: '#FFF6F4',
            backOverlayColor: 'rgba(255,85,73,0.2)',
        },
        warning: {
            background: '#eebf31',
            textColor: '#fff',
            childClassName: 'notiflix-notify-warning',
            notiflixIconColor: 'rgba(0,0,0,0.2)',
            fontAwesomeClassName: 'fas fa-exclamation-circle',
            fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
            backOverlayColor: 'rgba(238,191,49,0.2)',
        },
        info: {
            background: '#26c0d3',
            textColor: '#fff',
            childClassName: 'notiflix-notify-info',
            notiflixIconColor: 'rgba(0,0,0,0.2)',
            fontAwesomeClassName: 'fas fa-info-circle',
            fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
            backOverlayColor: 'rgba(38,192,211,0.2)',
        },
    });
}

/**
 * Method responsible for displaying a simple message using notiflix notify
 * 
 * @param {string} message 
 * @param {string} type 
 */
function notiflixNotify(message, type) {

    notiflixNotifyConfigs();
    if (type === "success") Notiflix.Notify.success(message);
    if (type === "error") Notiflix.Notify.failure(message);
    if (type === "warning") Notiflix.Notify.warning(message);
    if (type === "info") Notiflix.Notify.info(message);
}

/**
 * Method responsible for displaying messages using the notiflix library
 * @param {string} title
 * @param {string} message 
 * @param {string} button 
 * @param {string} type 
 * 
 * @return {void}
 */
function notiflix(title, message, button, type) {
    if (type === 'error') {
        Notiflix.Report.failure(
            title,
            message,
            button,
            {
                svgSize: '60px',
                plainText: false,
            }
        );
    } else if (type === "success") {
        Notiflix.Report.success(
            title,
            message,
            button,
            {
                svgSize: '60px',
                plainText: false,
            }
        );
    } else if (type === "info") {
        Notiflix.Report.info(
            title,
            message,
            button,
            {
                svgSize: '60px',
                plainText: false,
            }
        );
    }
}


/**
 * This method creates a loading effect on the entire screen and does not allow the user to hold any other event for a certain time.
 * 
 * @param {string} message 
 * @param {int} time 
 * @param {object} callback 
 * 
 * @return {void}
 */
function fakeLoading(type = "hourglass", message = "Processando os dados...", time = 1400, callbackNotify = {}) {
    if (type === "hourglass")
        Notiflix.Loading.hourglass(message, {
            backgroundColor: 'rgba(0, 0, 0, 0.87)',
        });
    if (type === "pulse")
        Notiflix.Loading.pulse(message, {
            backgroundColor: "rgba(0, 0, 0, 0.87)"
        });

    Notiflix.Loading.remove(time);

    if (callbackNotify) {
        setTimeout(() => {
            notiflixNotify(callbackNotify.message, callbackNotify.type);
        }, time);
    }
}



/**
 * This method aims to set the value of a field through the ID
 * @param {String} id 
 * @param {*} value 
 * @return {true|false}
 */
function setValueById(id, value) {
    if (document.getElementById(id)) {
        document.getElementById(id).value = value;
        return true;
    }
    return false;
}


/**
 * Responsible for configuring loading to appear
 * @param {string} message 
 */
function loadingOn(message) {
    Notiflix.Loading.hourglass(message, {
        backgroundColor: 'rgba(0, 0, 0, 0.87)',
    });
}

/**
 * Responsible for confifuraing loading to hidden
 */
function loadingOff(timeout = 0) {
    setTimeout(() => {
        Notiflix.Loading.remove();
    }, timeout);
}

/**
 * Active tooltips from bootstrap using js vanilla
 */
function enableTooltips() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
}
enableTooltips();