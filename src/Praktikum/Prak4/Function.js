let total_price = 0.0;

var addressInput = document.getElementById("address_input");
addressInput.addEventListener("input",function(){
    checkOrderAvail();
});

var cart = document.getElementById("warenkorb");
cart.addEventListener("change", function(){
    checkOrderAvail();
})

function checkOrderAvail(){
    "use strict";
    var addressValue = document.addressInput.value.trim();
    var submitBtn = document.getElementById("submit_btn");

    if(addressValue !== "" && cart.options.length > 0){
        submitBtn.disabled = false;
    }
    else{
        submitBtn.disabled = true;
    }
}

function doubleClickFunction(event){
    "use strict";
    let article_name = event.target.getAttribute("data-name");
    //create new option in the Warenkorb
    let newOption = document.createElement("option");
    //generate article_id using article_name;
            newOption.id = event.target.getAttribute("data-name");
            newOption.value = event.target.getAttribute("data-value");
            newOption.setAttribute('data-name',  event.target.getAttribute("data-name"));
            newOption.setAttribute('data-price', event.target.getAttribute("data-price"));
            var textNode = document.createTextNode(`${article_name}`);
            newOption.appendChild(textNode);
            var warenkorb = document.getElementById("warenkorb");
            warenkorb.appendChild(newOption);
    addPricetoCart(newOption.getAttribute('data-price'));
}

function addPricetoCart(price){
    "use strict";
    total_price += parseFloat(price);
    var lastprice = total_price.toFixed(2);
    document.getElementById("total_price").textContent = lastprice;
}

function subPricefromCart(price){
    "use strict";
    total_price -= parseFloat(price);
    var lastprice = total_price.toFixed(2);
    document.getElementById("total_price").textContent = lastprice;
}

function deleteAllOption(){
    "use strict";
    var cart = document.getElementById("warenkorb");
    while(cart.options.length > 0){
        cart.remove(0);
    }
    total_price = 0;
    document.getElementById("total_price").textContent = total_price;
}

function deleteSelectedOption(){
    "use strict";
    var cart = document.getElementById("warenkorb");
    for(let i = 0; i < cart.options.length(); i++){
        if(cart.options[i].selected){
            subPricefromCart(cart.options[i].getAttribute('data-price'));
            cart.remove(i);
        }
    }
}

function selectAllOption(){
    "use strict";
    var cart = document.getElementById("warenkorb");
    for(let i = 0; i < cart.options.length; i++){
        cart.options[i].selected = true;
    }

    var form = document.getElementById("BestellungsInfos");
    form.submit();
}