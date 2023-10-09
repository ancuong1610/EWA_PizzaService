let zaehler;

function start() {
    "use strict";
    zaehler = 0;
    window.setInterval(inkrement, 1000);
}

function inkrement() {
    "use strict";
    if (zaehler === 30) {
        document.getElementsByTagName('form')[0].submit();
    } else
        zaehler++;
    document.getElementById("myProgress").value = zaehler;
}
