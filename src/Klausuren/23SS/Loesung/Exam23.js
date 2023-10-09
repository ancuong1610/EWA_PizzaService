"use strict";
let request = new XMLHttpRequest();

function processData() {
  "use strict";
  if (request.readyState === 4) {
    // Uebertragung = DONE
    if (request.status === 200) {
      // HTTP-Status = OK
      if (request.responseText != null) {
        processResponse(request.responseText); // Daten verarbeiten
      } else console.error("Dokument ist leer");
    } else console.error("Uebertragung fehlgeschlagen");
  } // else; // Uebertragung laeuft noch
}

function sendRequest(RequestMethod, RequestUri, RequestPostData) {
    "use strict";
    if ((RequestMethod!=="") && (RequestUri!=="")) {

        console.log("Sending a " + RequestMethod + "-Request opening the URI: " + RequestUri + " with Post-data: " + RequestPostData);

        request.open(RequestMethod, RequestUri);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // otherwise POST is not working as expected!
        request.onreadystatechange = processData;
        request.send(RequestPostData);
    }
}

// ********************** Ende der Zulieferung ********************************/

function sendData() {
  "use strict";
  let nameField = document.getElementById("input_name");
  let emailField = document.getElementById("input_email");
  
  if (nameField.checkValidity() && emailField.checkValidity()) {
    let email = emailField.value;  
    let name = nameField.value;
    
    // Not expected: Encode name to avoid problems with names like Müller&Söhne
    name = encodeURIComponent(name);  

    let PostData = "name="+name+"&email="+email;

    sendRequest("POST", "Exam23Api.php", PostData);
  } else {
    console.log("invalid form data");
    nameField.reportValidity();
    emailField.reportValidity();
    return false;
  }
  return true;
}


function processResponse(jsonData) {
  "use strict";
  let dataObject = JSON.parse(jsonData);
  if (dataObject.name && dataObject.email) {
    let form = document.getElementById("newsletter_form");
    form.textContent = "";
    
    let response = document.getElementById("newsletter_response");
    response.textContent = `Vielen Dank, ${dataObject.name}, dass Sie unseren Newsletter abonniert haben. Dieser wird an folgende Mailadresse geschickt werden: ${dataObject.email}`;
  }
}
