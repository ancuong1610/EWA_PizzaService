<?php declare(strict_types=1);

class Baker {
    protected function generateView(): void {
        $orders = [
            ['id' => 1, 'pizzas' => ['Margherita', 'Salami'], 'totalPrice' => '8,50 €', 'status' => 'In Preparation'],
            ['id' => 2, 'pizzas' => ['Hawaii'], 'totalPrice' => '5,50 €', 'status' => 'In Preparation'],
            ['id' => 3, 'pizzas' => ['Margherita'], 'totalPrice' => '4,00 €', 'status' => 'In Preparation']
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
                    <strong>Baecker</strong>
                </h1>
                <h2>
                    <strong>Order Details</strong>
                </h2>
        HTML;

        foreach ($orders as $order) {
            echo <<<HTML
                <form action="https://echo.fbi.h-da.de/" method="post">
                    <p><strong>Order #{$order['id']}</strong></p>
                    <p><strong>Pizzas:</strong></p>
            HTML;

            foreach ($order['pizzas'] as $pizza) {
                echo <<<HTML
                    <img
                        width="150"
                        height="100"
                        src="pizza.jpg"
                        alt="Pizza Image"
                    >
                    <br>
                    <p>{$pizza}</p>
                    <label for="status{$order['id']}">Status:</label>
                    <select name="status[]" id="status{$order['id']}" class="status">
                        <option value="In Preparation" selected>In Preparation</option>
                        <option value="Finished">Finished</option>
                        <option value="Delivery">Delivery</option>
                    </select>
                    <hr> <!-- Divider for clarity -->
                HTML;
            }

            echo <<<HTML
                    <p><strong>Total Price:</strong> {$order['totalPrice']}</p>
                    <button type="submit">Update Status</button>
                </form>
                <hr> <!-- Divider for clarity -->
            HTML;
        }

        echo <<<HTML
            <div id="statusBar">
                <!-- Status bar for orders (im Vorberitung, fertig, Lieferung) -->
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
