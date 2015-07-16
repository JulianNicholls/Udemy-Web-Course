var box     = document.getElementById('box'),
    time    = document.getElementById('result'),
    average = document.getElementById('average');

var appeared,
    count = 0,
    total = 0;

function removeMe() {
    this.style.display = 'none';

    var reactionTime = Date.now() - appeared;

    ++count;
    total += reactionTime;

    time.innerHTML    = formatSecondFromMs(reactionTime);
    average.innerHTML = formatSecondFromMs(Math.round(total / count));

    showBlock();
}

function showBlock() {
    var top     = Math.floor(Math.random() * 400),
        left    = Math.floor(Math.random() * 500),
        delay   = Math.random() * 3000 + 500;

    setTimeout(function() {
        box.style.top = top + 'px';
        box.style.left = left + 'px';
        box.style.backgroundColor = randomColour();
        box.style.display = 'block';
        box.style.borderRadius = (Math.random() < 0.5) ? '5px' : '50%';

        appeared = Date.now();
    }, delay);
}

function formatSecondFromMs( time ) {
    return (time < 1000) ? (time + 'ms') : (time / 1000) + 's';
}

function randomColour() {
    var range = '56789ABCDE',
        colour = '#';

    for(i = 0; i < 6; ++i) {
        colour += range[Math.floor(Math.random() * 10)];
    }

    return colour;
}

box.onclick = removeMe;

showBlock();
