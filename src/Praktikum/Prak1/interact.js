// interact.js

function addPizzaToCart(name, price) {
    var selectPizza = document.getElementById('selectPizza');
    var option = document.createElement('option');
    option.value = name;
    option.text = name + ' - ' + price + ' €';
    selectPizza.add(option);

    updateTotalPrice(price);
}

function updateTotalPrice(price) {
    var totalPriceInput = document.getElementById('totalPrice');
    var currentTotalPrice = parseFloat(totalPriceInput.value);
    var newTotalPrice = currentTotalPrice + parseFloat(price);
    totalPriceInput.value = newTotalPrice.toFixed(2);

    var priceTotal = document.querySelector('.priceTotal');
    priceTotal.textContent = 'Total Price: ' + newTotalPrice.toFixed(2) + ' €';
}
