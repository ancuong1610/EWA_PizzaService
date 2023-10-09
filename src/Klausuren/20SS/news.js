let request = new XMLHttpRequest();

function requestData() { // fordert die Daten asynchron an
    "use strict";
    request.open("GET", "news.php?JSON=1"); // URL für HTTP-GET
    request.onreadystatechange = processData; //Callback-Handler zuordnen
    request.send(null); // Request abschicken
}

function processData() {
    "use strict";
    if (request.readyState === 4) { // Uebertragung = DONE
        if (request.status === 200) { // HTTP-Status = OK
            if (request.responseText != null)
                processNews(request.responseText); // Daten verarbeiten
            else console.error("Dokument ist leer");
        } else console.error("Uebertragung fehlgeschlagen");
    } // else; // Uebertragung laeuft noch
}

// Ende des gegebenen Codes


function pollNews() {
    "use strict";
    // Aufgabe 4a) ************************
    requestData();
    window.setInterval(requestData, 8000);
    // Ende Aufgabe 4a) *******************
}

function processNews(data) { // Aufgabe 4d
    "use strict";
    let dataObject = JSON.parse(data);
    let newsSection = document.getElementById("news");

    // delete all existing news
    while (newsSection.firstChild) {
        newsSection.removeChild(newsSection.lastChild);
    }

    // insert news from JSON
    for (let i = 0; i < dataObject.length; i++) {
        let row = dataObject[i];
        if (newsSection && row.title && row.text && row.timestamp) {
            let article = createDOM(row);
            newsSection.appendChild(article);
        }
    }
}

function createDOM(row) {
    "use strict";
    let newsEntry = document.createElement("article"); // Aufgabe 4c.1

    let title = document.createElement("h3"); // Aufgabe 4c.2
    let textNodeTitle = document.createTextNode(row.title);
    title.appendChild(textNodeTitle);

    let time = document.createElement("p"); // Aufgabe 4c.3
    time.className = "timestamp";
    let textNodeTime = document.createTextNode(row.timestamp);
    time.appendChild(textNodeTime);

    let text = document.createElement("p"); // Aufgabe 4c.4
    let textNodeText = document.createTextNode(row.text);

    text.appendChild(textNodeText);
    newsEntry.appendChild(title);
    newsEntry.appendChild(time);
    newsEntry.appendChild(text);
    return newsEntry;
}
