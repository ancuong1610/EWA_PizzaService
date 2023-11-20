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

        ?>
        <!DOCTYPE html>
        <html lang="de">
        <head>
            <meta charset="UTF-8">
            <title>Customer Dashboard</title>
        </head>
        <body>
            <header>
                <h1>Welcome, <strong><?= $customerInfo['name'] ?></strong></h1>
            </header>

            <section id="customer-info">
                <h2>Customer Information:</h2>
                <p><strong>Name:</strong> <?= $customerInfo['name'] ?></p>
                <p><strong>Age:</strong> <?= $customerInfo['age'] ?></p>
                <p><strong>Address:</strong> <?= $customerInfo['address1'] ?>, <?= $customerInfo['address2'] ?></p>
                <p><strong>Payment Method:</strong> <?= $customerInfo['payment'] ?></p>
            </section>

            <section id="orders">
                <h2>Your Orders</h2>

                <?php foreach ($orders as $order): ?>
                    <article class="order">
                        <h3>Order #<?= $order['id'] ?></h3>
                        <section class="pizzas">
                            <h4>Pizzas:</h4>
                            <?php foreach ($order['pizzas'] as $pizza): ?>
                                <img width="150" height="100" src="pizza.jpg" alt="Pizza Image">
                                <p><?= $pizza ?></p>
                                <hr>
                            <?php endforeach; ?>
                        </section>

                        <p><strong>Total Price:</strong> <?= $order['totalPrice'] ?></p>
                        <p><strong>Status:</strong> <?= $order['status'] ?></p>
                        <input type="hidden" name="customer_name" value="<?= $customerInfo['name'] ?>">
                        <hr>
                    </article>
                <?php endforeach; ?>
            </section>

            <form action="https://echo.fbi.h-da.de/" method="post">
                <button type="submit" name="submit_all_orders">Update All Orders</button>
            </form>

            <div id="statusBar">
                <!-- Status bar for orders (im Vorberitung, fertig, Lieferung) -->
            </div>

            <script src="interact.js"></script>
        </body>
        </html>
        <?php
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
