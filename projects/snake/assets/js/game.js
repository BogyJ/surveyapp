const startBtn = document.getElementById('start');
const gameBoard = document.getElementById('game-board');

function update() { }

function draw() { }

function init() {
    console.log('The game has started.');
}

startBtn.addEventListener('click', init);

// const element = document.getElementById('snake');
// let start;

/*
function step(timestamp) {
    if (start === undefined)
        start = timestamp;
    const elapsed = timestamp - start;

    // `Math.min()` is used here to make sure that the element stops at exactly 200px.
    element.style.transform = 'translateX(' + Math.min(0.3 * elapsed, Number.POSITIVE_INFINITY) + 'px)';

    if (elapsed < Number.POSITIVE_INFINITY) {
        window.requestAnimationFrame(step);
    }
}

window.requestAnimationFrame(step);
*/
