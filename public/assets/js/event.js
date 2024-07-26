const slider = document.querySelector(".slider");
const cards = document.querySelectorAll(".card-event");
const cardCount = cards.length;
let cardWidth = cards[0].offsetWidth;
let isDragging = false;
let startPos = 0;
let currentTranslate = 0;
let prevTranslate = 0;

slider.style.transform = `translateX(${currentTranslate}px)`;

function touchmove(e) {
    if (!isDragging) return;

    const currentPosition = e.touches[0].clientX;
    const distance = currentPosition - startPos;
    currentTranslate = prevTranslate + distance;

    slider.style.transform = `translateX(${currentTranslate}px)`;
}

if (cardCount > 1) {
    slider.addEventListener("mousedown", (e) => {
        isDragging = true;
        startPos = e.clientX;
        slider.style.cursor = "grabbing";

        document.addEventListener("mousemove", mousemove);
        document.addEventListener("mouseup", mouseup);
    });

    function mousemove(e) {
        if (!isDragging) return;

        const currentPosition = e.clientX;
        const distance = currentPosition - startPos;
        currentTranslate = prevTranslate + distance;

        slider.style.transform = `translateX(${currentTranslate}px)`;
    }

    function mouseup() {
        document.removeEventListener("mousemove", mousemove);
        document.removeEventListener("mouseup", mouseup);

        isDragging = false;
        prevTranslate = currentTranslate;

        slider.style.cursor = "grab";
    }
}

