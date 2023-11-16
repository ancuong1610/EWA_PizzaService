<?php declare(strict_types=1);

class Driver {
    private $name;
    private $age;
    private $driverLicense;
    private $orderIDs;

    public function __construct(string $name, int $age, string $driverLicense, array $orderIDs = []) {
        $this->name = $name;
        $this->age = $age;
        $this->driverLicense = $driverLicense;
        $this->orderIDs = $orderIDs;
    }

    public function generateView(): void {
        echo <<<HTML
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <meta charset="UTF-8">
                <title>Driver Dashboard</title>
            </head>
            <body>
                <hr> <!-- Divider line -->
    
                <p><strong>Name:</strong> {$this->name}</p>
                <p><strong>Age:</strong> {$this->age}</p>
                <p><strong>Driver License:</strong> {$this->driverLicense}</p>
    
        HTML;
    
        if (!empty($this->orderIDs)) {
            echo '<p><strong>Currently Delivering Orders:</strong></p>';
            echo '<ul>';
            foreach ($this->orderIDs as $orderID) {
                echo "<li>Order #{$orderID}</li>";
            }
            echo '</ul>';
        }
    
        echo <<<HTML
            <hr> <!-- Divider line -->

            <form action="https://echo.fbi.h-da.de/" method="post">
                <input type="hidden" name="driver_name" value="{$this->name}">
                <button type="submit" name="submit_driver_name">Submit Driver Name</button>
            </form>

            </body>
            </html>
        HTML;
    }
    

    public static function main(): void {
        // Dummy data for three drivers
        $driver1 = new Driver('John Doe', 30, 'DL123456', [1, 2]);
        $driver2 = new Driver('Jane Smith', 28, 'DL654321');
        $driver3 = new Driver('Bob Johnson', 35, 'DL987654', [3]);

        // Display driver information
        $driver1->generateView();
        $driver2->generateView();
        $driver3->generateView();
    }
}

Driver::main();
