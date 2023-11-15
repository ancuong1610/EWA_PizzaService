<?php declare(strict_types=1);

class Baker {
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
                <title>Pizza</title>
            </head>
            <body>
                <h1>
                    <strong>Order Pizzas</strong>
                </h1>
                <h2>
                    <strong>Pizza Menu</strong>
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
            <form action="https://echo.pizza-shop.com/" method="post" target="_blank">
                <select name="Pizza" id="selectPizza" class="selectPizza" onchange="seePrice()" size="7" multiple>
                    <option value="margherita">Margherita</option>
                    <option value="salami">Salami</option>
                    <option value="hawaii">Hawaii</option>
                </select>

                <p class="priceTotal">Total Price: 0,0 €</p>
                <input type="hidden" name="totalPrice" id="totalPrice" value="0.00">

                <div>
                    <button type="reset">Clear All</button>
                    <button
                        type="button"
                        onclick="clearSelectOption()"
                    >
                        Clear Selection
                    </button>
                    <button type="submit">Order</button>
                </div>
            </form>

            <br>

            <div id="statusBar">
                <!-- Status bar for pizza (im Vorberitung, fertig, Lieferung) -->
            </div>

            <script src="interact.js"></script>
            </body>
            </html>
        HTML;
    }

    public static function main(): void {
        try {
            $page = new Baker();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Baker::main();
