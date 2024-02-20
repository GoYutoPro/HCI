function changeLanguage(language) {
    var elements = document.querySelectorAll('[data-lang-' + language + ']');
    elements.forEach(function (element) {
        element.innerHTML = element.getAttribute('data-lang-' + language);
    });
}

// Text-to-Speech Script
function speakText(text) {
    var utterance = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(utterance);
}

// Color-blind Modes Script
function toggleColorBlindMode() {
    // Add/remove class to enable/disable color-blind mode
    document.body.classList.toggle('color-blind-mode');
}

// Zoom In and Out Script
function zoomIn() {
    var body = document.body;
    var currentSize = parseFloat(window.getComputedStyle(body, null).getPropertyValue('font-size'));
    body.style.fontSize = (currentSize * 1.1) + 'px';
}

function zoomOut() {
    var body = document.body;
    var currentSize = parseFloat(window.getComputedStyle(body, null).getPropertyValue('font-size'));
    body.style.fontSize = (currentSize / 1.1) + 'px';
}
