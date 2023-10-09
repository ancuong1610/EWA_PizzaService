function start() {
    "use strict";
    document.getElementById('allPosters').options[0].selected = true;
    show(0);
}

function nextPoster() {
    "use strict";
    let i;
    let myselect = document.getElementById('allPosters');
    let options = myselect.options;
    i = myselect.selectedIndex;
    i = i + 1;
    if (i >= options.length)
        i = 0;
    options[i].selected = true;
    show(i);
}

function show(nr) {
    "use strict";
    let sel = document.getElementById('allPosters');
    let pict = sel.options[nr].text;
    document.getElementById('poster').src = 'Images/' + pict;
}
