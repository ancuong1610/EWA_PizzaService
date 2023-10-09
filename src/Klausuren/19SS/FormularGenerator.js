window.onload = init;

function init() {
    // eventlistener registrieren via JS
    // alternativ in HTML moeglich <input ... onchange="sendData()" .../>;
    // oninput wäre noch besser, aber onchange ist in Ordnung
    "use strict";
    let inputs = document.getElementsByTagName("input");
    console.log("Seite vollständig geladen... " + inputs.length);
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("change", sendData, false);
    }
}

function sendData() {
    "use strict";
    let elem = event.target; // wenn die Funktion durch ein Event (onxxx) aufgerufen wurde, 
                             // liefert event.target den DOM-Knoten, an dem das Event ausgeloest wurde
    let key = elem.name;
    console.log("Sendig AJAX Request... " + key);
    let value = elem.value;
    let param = "key=" + key + "&value=" + encodeURI(value);	 //encodeURI not expected !
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "FormularGenerator.php?" + param);

    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log("AJAX Request finished; Data stored in Session");
        }
    };
    console.log("sending AJAX Request: " + param);
    xhr.send();
}