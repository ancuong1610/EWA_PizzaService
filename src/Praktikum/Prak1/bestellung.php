<?php

class Bestellung {
    protected function generateView(): void {
        $pizzas = [
            ['name' => 'Margherita', 'price' => '4.00'],
            ['name' => 'Salami', 'price' => '4.50'],
            ['name' => 'Hawaii', 'price' => '5.50']
        ];

        echo <<<HTML
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <meta charset="UTF-8">
                <title>PizzaShop</title>
                <script src="interact.js" defer></script> 
            </head>
            <body>
                <h1>
                    <strong>Bestellung</strong>
                </h1>
                <h2>
                    <strong>Speisekarte</strong>
                </h2>
        HTML;

        foreach ($pizzas as $pizza) {
            echo <<<HTML
                <div>
                    <img
                        width="150"
                        height="100"
                        src="pizza.jpg"
                        alt="Pizza Image"
                    >
                    <br>
                    <p>{$pizza['name']}</p>
                    <p>{$pizza['price']} €</p>
                    <button type="button" onclick="addPizzaToCart('{$pizza['name']}', {$pizza['price']})">Add to Cart</button>
                </div>
            HTML;
        }

        echo <<<HTML
            <h1> Order Menu </h1>
            <form action="https://echo.fbi.h-da.de/" method="post" target="_blank">
                <select name="Pizzas[]" id="selectPizza" class="selectPizza" size="7" multiple></select>

                <p class="priceTotal">Total Price: 0,0 €</p>
                <input type="hidden" name="totalPrice" id="totalPrice" value="0.00">

                <div>
                    <input
                        type="text"
                        id="inputAddress"
                        name="address"
                        placeholder="Ihre Adresse"
                        size="20"
                        required // Added 'required' to prevent sending with an empty address
                    >
                </div>
                <div>
                    <button type="reset">Alle Löschen</button>
                    <button
                        type="button"
                        onclick="clearSelecOption()"
                    >
                        Auswahl Löschen
                    </button>
                    <button type="submit">Bestellen</button>
                </div>
            </form>

            <br>
            </body>
            </html>
        HTML;
    }

    public static function main(): void {
        try {
            $page = new Bestellung();
            $page->generateView();
             // Check if the form is submitted
             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Print the contents of the $_POST array
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';
            }
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Bestellung::main();
?>
