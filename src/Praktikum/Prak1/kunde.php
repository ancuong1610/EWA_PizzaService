<?php declare(strict_types=1);

class Customer {
    protected function generateView(): void {
        $customerInfo = [
            'name' => 'Joe Mama',
            'age' => 100,
            'address1' => 'Nowhere',
            'address2' => 'Somewhere',
            'payment' => 'Credit Card'
        ];

        $orders = [
            ['id' => 1, 'pizzas' => ['Margherita', 'Salami'], 'totalPrice' => '8,50 €', 'status' => 'In Preparation'],
            ['id' => 2, 'pizzas' => ['Hawaii'], 'totalPrice' => '5,50 €', 'status' => 'Fertig'],
            ['id' => 3, 'pizzas' => ['Margherita'], 'totalPrice' => '4,00 €', 'status' => 'Lieferung']
        ];

        echo <<<HTML
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <meta charset="UTF-8">
                <title>Customer Dashboard</title>
            </head>
            <body>
                <h1>
                    <strong>Welcome, {$customerInfo['name']}</strong>
                </h1>
                <p><strong>Customer Information:</strong></p>
                <p><strong>Name:</strong> {$customerInfo['name']}</p>
                <p><strong>Age:</strong> {$customerInfo['age']}</p>
                <p><strong>Address:</strong> {$customerInfo['address1']}, {$customerInfo['address2']}</p>
                <p><strong>Payment Method:</strong> {$customerInfo['payment']}</p>

                <h2>
                    <strong>Your Orders</strong>
                </h2>
        HTML;

        foreach ($orders as $order) {
            echo <<<HTML
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
                    <hr> <!-- Divider for clarity -->
                HTML;
            }

            echo <<<HTML
                <p><strong>Total Price:</strong> {$order['totalPrice']}</p>
                <p><strong>Status:</strong> {$order['status']}</p>
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
            $page = new Customer();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Customer::main();
