<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Bestellung</title>
</head>
<body>
<section>
    <h1> Order Menu </h1>

    <?php
    // Define menu items
    $menuItems = [
        ['name' => 'Margherita', 'price' => '4.00'],
        ['name' => 'Hawaii', 'price' => '5.00'],
        ['name' => 'Salami', 'price' => '4.50']
    ];

    // Display menu items
    foreach ($menuItems as $index => $menuItem) {
        echo "<form action='https://echo.fbi.h-da.de/' method='post'>
                <img src='pizza.jpg' alt='Just a Pizza' width='100' height='100'>
                <p>{$menuItem['name']}</p>
                <p>{$menuItem['price']}€</p>
                <input type='hidden' name='item' value='{$menuItem['name']}'>
                <input type='hidden' name='price' value='{$menuItem['price']}'>
                <button type='submit' tabindex='" . ($index + 1) . "' accesskey='" . strtoupper($menuItem['name'][0]) . "'>Add to Basket</button>
              </form>";
    }
    ?>

</section>

<!-- Basket of checklist -->
<section>
    <h2>Basket of goods</h2>

    <form action="https://echo.fbi.h-da.de/" method="post">
        <select name="selected_item" tabindex="4">
            <?php
            // Display options in the basket dropdown
            foreach ($menuItems as $menuItem) {
                echo "<option value='{$menuItem['name']}'>{$menuItem['name']}</option>";
            }
            ?>
        </select>
        <p>14.50€</p>
        <button type="submit" name="action" value="delete_all" tabindex="5" accesskey="D">Delete all Products</button>
        <button type="submit" name="action" value="delete_selection" tabindex="6" accesskey="X">Delete Selection</button>
        <button type="submit" name="action" value="order" tabindex="7" accesskey="O">Order</button>
    </form>
</section>
</body>
</html>
