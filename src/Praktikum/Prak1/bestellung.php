<?php declare(strict_types=1);

class Bestellung {
    protected function generateView(): void {
        $pizzas = [
            ['name' => 'Margherita', 'price' => '4,00 €'],
            ['name' => 'Salami', 'price' => '4,50 €'],
            ['name' => 'Hawaii', 'price' => '5,50 €']
        ];

        echo <<<HTML
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <meta charset="UTF-8">
                <title>PizzaShop</title>
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
                <img
                    width="150"
                    height="100"
                    src="pizza.jpg"
                    alt="Pizza Image"
                >
                <br>
                <p>{$pizza['name']}</p>
                <p>{$pizza['price']}</p>
            HTML;
        }

        echo <<<HTML
            <h1> Order Menu </h1>
            <form action="https://echo.fbi.h-da.de/" method="post" target="_blank">
                <select name="Pizza" id="selectPizza" class="selectPizza" onchange="seePrice()" size="7" multiple>
                    <option value="margherita" data-price="4.00">Margherita</option>
                    <option value="salami" data-price="4.50">Salami</option>
                    <option value="hawaii" data-price="5.50">Hawaii</option>
                </select>

                <!-- Hidden inputs for the pizza name and price -->
                <input type="hidden" name="pizzaName" id="pizzaName" value="">
                <input type="hidden" name="pizzaPrice" id="pizzaPrice" value="0.00">

                <p class="priceTotal">Total Price: 0,0 €</p>
                <input type="hidden" name="totalPrice" id="totalPrice" value="0.00">

                <div>
                    <input
                        type="text"
                        id="inputAddress"
                        name="address"
                        placeholder="Ihre Adresse"
                        size="20"
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

            <script src="interact.js"></script>
            </body>
            </html>
        HTML;
    }

    public static function main(): void {
        try {
            $page = new Bestellung();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Bestellung::main();
