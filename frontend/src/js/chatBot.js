const CHATBOT_ELEMS = {
    root: '.js-chatbot',
    button: '.js-chatbot-btn',
    popover: '.js-chatbot-popover',
    buttonClose: '.js-chatbot-close',
    polygonContainer: '.js-polygon-container-polygon',
}

const updatePolygonChatbotPopover = (el) => {
    const event = new Event("resize", { bubbles: true, composed: true });
    el.querySelectorAll(CHATBOT_ELEMS.polygonContainer).forEach((polygon) => polygon.dispatchEvent(event));
};

const popoverIsVisible = (el) => el.clientHeight !== 0;

const resizePolygonChatbotPopover = (el) => {
    if (!popoverIsVisible(el)) {
        const resizeObserver = new ResizeObserver(entries => {
            if (popoverIsVisible(el)) {
                updatePolygonChatbotPopover(el);
                resizeObserver.disconnect();
            }
        });
        resizeObserver.observe(el);
    }
}

function initChatBot() {
    const chatBotEl = document.querySelector(CHATBOT_ELEMS.root);

    if (!chatBotEl) return;

    const button = chatBotEl.querySelector(CHATBOT_ELEMS.button);
    const popover = chatBotEl.querySelector(CHATBOT_ELEMS.popover);
    const buttonClose = chatBotEl.querySelector(CHATBOT_ELEMS.buttonClose);

    button.addEventListener('click', () => {
        button.parentElement.hidden = true;
        popover.hidden = false;
    })

    buttonClose.addEventListener('click', () => {
        button.parentElement.hidden = false;
        popover.hidden = true;
    })

    resizePolygonChatbotPopover(popover);
}
