let request = new XMLHttpRequest();

function requestData() { // fordert die Daten asynchron an
    "use strict";
    let gameId = document.getElementById("gameId").value;
    request.open("GET", "Exam21API.php?gameId="+gameId);
    request.onreadystatechange = processData;
    request.send(null);
}

function processData() {
    "use strict";
    if (request.readyState === 4) { // Uebertragung = DONE
        if (request.status === 200) { // HTTP-Status = OK
            if (request.responseText != null)
                updateView(request.responseText); // Daten verarbeiten
            else console.error("Dokument ist leer");
        } else console.error("Uebertragung fehlgeschlagen");
    } // else; // Uebertragung laeuft noch
}

// Ende des gegebenen Codes


function pollData() {
    "use strict";
    requestData();
    window.setInterval(requestData, 5000);
}

function updateView(data) {
    "use strict";
    console.log(data);
    let dataObject = JSON.parse(data)[0];
    let players = document.getElementById("players");
    players.firstChild.nodeValue = dataObject.playing;
}

