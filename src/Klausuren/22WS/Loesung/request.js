// request als globale Variable anlegen (haesslich, aber bequem)
var request = new XMLHttpRequest(); 

function requestData() { // fordert die Daten asynchron an
    let $question = document.getElementById('question');

    if($question.value) {
        request.open("GET", "response.php?Question=" + $question.value); // URL für HTTP-GET
	    request.onreadystatechange = processData; //Callback-Handler zuordnen
	    request.send(null); // Request abschicken
        $question.value = '';
    }
}

function processData() {
	if(request.readyState == 4) { // Uebertragung = DONE
		if (request.status == 200) {   // HTTP-Status = OK
			if(request.responseText != null) 
			process(request.responseText);// Daten verarbeiten
			else console.error ("Dokument ist leer");        
		} 
		else console.error ("Uebertragung fehlgeschlagen");
	} else ;          // Uebertragung laeuft noch
}

function process(data) {
    let dataDecoded = JSON.parse(data);

    let today = new Date();
    let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    let text = 'Tut mir leid, auf diese Frage habe ich keine Antwort.';

    if(dataDecoded.length) {
        text = dataDecoded[0].answer;
    }
    
    let chatbox = document.getElementById('chatbox');
    let answer = document.createElement('p');

    answer.innerText = time + ': ' + text;
    chatbox.appendChild(answer);
}