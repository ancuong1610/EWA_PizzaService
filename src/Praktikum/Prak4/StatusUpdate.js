function convertStatusIDToStatusName(status) {
    "use strict";
    switch (status) {
        case "0":
            return "bestellt";
            break;
        case "1":
            return "im Ofen";
            break;
        case "2":
            return "fertig";
            break;
        case "3":
            return "unterwegs";
            break;
        case "4":
            return "geliefert";
            break;
    }
}

function createNewOrder(article){
    "use strict";
    var customOrder = document.createElement('section');
    customOrder.classList.add('custom-order');

    var customOrderPizzaName = document.createElement('h3');
    customOrderPizzaName.textContent = article["name"];
    customOrderPizzaName.className = "pizza_name";

    var pizza_id = document.createElement("h4");
    pizza_id.classname= "pizza_id";
    pizza_id.setAttribute('value', article["orderedArticleID"]);
    pizza_id.textContent = "Ordered Article ID: " + article["orderedArticleID"];

    var statusLine = document.createElement('p');
    statusLine.textContent = convertStatusIDToStatusName(article["orderedArticleID"]);

    customOrder.appendChild(statusLine);
    customOrder.appendChild(customOrderPizzaName);
    customOrder.appendChild(pizza_id);


    return customOrder;
}

function updateStatus(pizzaOrder, status){
    "use strict";
    var newStatus = convertStatusIDToStatusName(status);
    var statusLine = pizzaOrder.querySelector('p');
    statusLine.textContent = newStatus;
}

function checkExistingOrder(orderID){
    "use strict";
    var allPizzas = document.getElementById("pizza-container").querySelectorAll("section");
    for(var i = 0; i < allPizzas.length; i++){
        var order = allPizzas[i];
        if (order.querySelector("input[name=pizza_id]") === null){
            return;
        }
        if(order.querySelector("input[name=pizza_id]").getAttribute("value") === orderID){
            return allPizzas[i];
        }
    }
    return null;
}
function process(intext) {
    "use strict";
    var orderedArticles = JSON.parse(intext);
    var pizzaContainer = document.getElementById('pizza-container');

    if(orderedArticles.length == 0){
        console.error("No pizza data found.");
        return;
    }

    orderedArticles.forEach(article =>{
        var pizzaOrder;
        if((pizzaOrder = checkExistingOrder(article["orderedArticleID"])) != null){
            updateStatus(pizzaOrder, article["status"]);
        }
        else{
            pizzaOrder = createNewOrder(article);
            pizzaContainer.appendChild(pizzaOrder);
        }
    })
}

var request = new XMLHttpRequest();

function requestData() { // fordert die Daten asynchron an
    request.open("GET", "KundenStatus.php"); // URL für HTTP-GET
    request.onreadystatechange = processData; //Callback-Handler zuordnen
    request.send(null); // Request abschicken
}

function processData() {
    "use strict";
    if(request.readyState === 4) { // Uebertragung = DONE
        if (request.status === 200) {   // HTTP-Status = OK
            if(request.responseText != null) {
                process(request.responseText);// Daten verarbeiten
            }
            else console.error ("Dokument ist leer");
        }
        else console.error ("Uebertragung fehlgeschlagen");
    } else ;          // Uebertragung laeuft noch
}

document.addEventListener("DOMContentLoaded", function (){
    window.setInterval(requestData, 2000);
})