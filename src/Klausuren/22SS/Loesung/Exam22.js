class Lexicon {
    constructor() {
        "use strict";
        this.request = new XMLHttpRequest();
    }

    deleteAllChildren(node) {
        "use strict";
        while (node.firstChild) {
            node.firstChild.remove()
        }
    }

    addExplanationNode(word, explanation) {
        "use strict";
        let ulExplanationsNode = document.getElementById("simpleExplanations");
        if (ulExplanationsNode) {
            this.deleteAllChildren(ulExplanationsNode);
            let node = document.createElement("li");
            let textNode = document.createTextNode(word + ": " + explanation);
            node.appendChild(textNode);
            ulExplanationsNode.appendChild(node);
        }
    }

    processExplanation(jsonData) {
        "use strict";
        let dataObject = JSON.parse(jsonData);
        this.addExplanationNode(dataObject.word, dataObject.explanation);

    }

    processData() {
        "use strict";
        if (this.request.status === 404) { // Be aware! readyState is 2 for 404 !
            console.log("word not found");
        }
        if (this.request.readyState === 4) { // Uebertragung = DONE
            if (this.request.status === 200) { // HTTP-Status = OK
                if (this.request.responseText != null) {
                    this.processExplanation(this.request.responseText); // Daten verarbeiten
                } else console.error("Dokument ist leer");
            } else console.error("Uebertragung fehlgeschlagen");
        } // else; // Uebertragung laeuft noch
    }

    searchWord(word) {
        "use strict";
        let me = this;
        word = encodeURI(word); // not required in examination
        this.request.open("GET", "Exam22Api.php?search=" + word);
        this.request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        this.request.onreadystatechange = function () {
            "use strict";
            me.processData();
        }
        this.request.send(null);
    }
}

function RegisterWordClickHandler() {
    "use strict";
    let body = document.getElementsByTagName("body")[0];
    if (body) {
        body.addEventListener('dblclick', WordClickHandler);
    }
}

function WordClickHandler() {
    "use strict";
    let lex = new Lexicon();
    if (window.getSelection().toString().length > 1) {
        lex.searchWord(document.getSelection().toString());
    }
}

window.onload = RegisterWordClickHandler;
