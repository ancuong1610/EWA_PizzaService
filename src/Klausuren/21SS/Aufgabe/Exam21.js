let request = new XMLHttpRequest();

function requestData() { // fordert die Daten asynchron an
    "use strict";
    //ToDo - vervollständigen **************
    request.onreadystatechange = processData;
    request.send(null);
}

function processData() {
    "use strict";
    if (request.readyState === 4) { // Uebertragung = DONE
        if (request.status === 200) { // HTTP-Status = OK
            if (request.responseText != null)
               ;//ToDo - vervollständigen ************
            else console.error("Dokument ist leer");
        } else console.error("Uebertragung fehlgeschlagen");
    } // else; // Uebertragung laeuft noch
}

