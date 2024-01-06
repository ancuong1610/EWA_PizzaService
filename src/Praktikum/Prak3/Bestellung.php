<?php
declare(strict_types=1);

require_once './Page.php';

class Bestellung extends Page
{
    // to do: declare reference variables for members
    // representing substructures/blocks

    /**
     * Instantiates members (to be defined above).
     * Calls the constructor of the parent i.e. page class.
     * So, the database connection is established.
     * @throws Exception
     */
    protected function __construct()
    {
        parent::__construct();
        // to do: instantiate members representing substructures/blocks
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    protected function getViewData(): array
    {
        $sqlAbfrageCommand = "SELECT* FROM article";
        $recordSet = $this->database->query($sqlAbfrageCommand);
        if(!$recordSet) {
            throw new Exception("keine Article in der Datenbank");
        }
        $article_List = array();

        while ($record = $recordSet->fetch_assoc()) {
            $get_article_id_from_datenbank = $record["article_id"];
            $get_name_from_datenbank = $record["name"];
            $get_picture_from_datenbank = $record["picture"];
            $get_price_from_datenbank = $record["price"];
            $article_List[] = array(
                "article_id" => $get_article_id_from_datenbank,
                "name" => $get_name_from_datenbank,
                "picture" => $get_picture_from_datenbank,
                "price" => $get_price_from_datenbank
            );
        }

        $recordSet->free();
        return $article_List;
    }

    protected function generateView(): void
    {
        $article_List = $this->getViewData();
        $this->generatePageHeader('Bestellung'); //to do: set optional parameters
    
        echo <<<EOT
        <div class="navbar">
            <div class="brand">EWA</div>
            <nav>
              <a href="Home.php" class="nav-link">Home</a>
              <a href="Bestellung.php" class="nav-link">Menu</a>
              <a href="Kunde.php" class="nav-link">Customer</a>
              <a href="Fahrer.php" class="nav-link">Driver</a>
              <a href="Baecker.php" class="nav-link">Baker</a>
            </nav>
        </div>
        <body>
        <section class="main-content">
            <div class="article_detail_flex_container">
    EOT;
    
        foreach ($article_List as $article) {
            echo <<< EOT
            <div class="article_div" 
                 ondblclick="doubleClickFunction(event)" 
                 data-name="$article[name]"
                 data-price="$article[price]"
                 data-value="$article[article_id]">
                 
                <figure
                    data-name="$article[name]"
                    data-price="$article[price]"
                    data-value="$article[article_id]">
                    
                    <img class="pizza_image" src='pizza.png' alt="" 
                         title="$article[name]"
                         data-name="$article[name]"
                         data-price="$article[price]"
                         data-value="$article[article_id]"
                         style="max-width: 18%; height: auto;"/>
                    
                    <figcaption data-name="$article[name]"
                                 data-price="$article[price]"
                                 data-value="$article[article_id]">
                        $article[name] $article[price] &euro;
                    </figcaption>
                </figure>   
            </div>
        EOT;
        };
    
        $total_price = 0;
        echo <<< EOT
            </div>
            <div class="warenkorb_section">
                <h2>SHOPPING CART</h2>
                <form action="Bestellung.php" id="BestellungsInfos" method="post" accept-charset="UTF-8">
                    <select id="warenkorb" name="warenkorb[]" multiple="multiple" size="5">
        EOT;
        
        echo <<< EOT
                    </select>   
                    <p id="gesamtpreis">Gesamtpreis: </span><span id="total_price">$total_price </span>&euro;</p>
                    <input id="address_input" type="text" name="address-input" size="30" maxlength="60" placeholder="Ihre Adresse" value="" required style="display: block"/>
                    <input class="btn" id="delete_all_btn" type="button" onclick = "deleteAllOption()" value="Remove All"/>
                    <input class="btn" id="delete_btn" type="button" onclick = "deleteSelectedOption()" value="Remove Selected"/>
                    <input class="btn" id="submit_btn" type="button" onclick = "selectAllOption()" value="Submit"/>
                </form>
            </div>
        </section>
        EOT;
    
        $this->generatePageFooter();
    }
    
    protected function processReceivedData(): void
    {
        parent::processReceivedData();
        if (isset($_POST["address-input"])&&isset($_POST["warenkorb"])) {

            //insert from address-input into ordering TABLE
            $customer_address = $_POST["address-input"];
            $ordered_article_list = $_POST["warenkorb"];

            if (strlen($customer_address) <= 0) {
                throw new Exception("Bitte geben Sie in beiden Feldern etwas an!");
            }
            else {
                session_start();
                $sql_customer_address = $this->database->real_escape_string($customer_address);
                $currentDateTime = date("Y-m-d H:i:s");
                $sqlInsertCustomerAddressCommand =
                    "INSERT INTO ordering 
                    SET address = '$sql_customer_address', ordering_time = '$currentDateTime'";
                $this->database->query($sqlInsertCustomerAddressCommand);
                $new_inserted_ordering_id = $this->database->insert_id;

                $_SESSION['last_ordering_id'] = $new_inserted_ordering_id;

                // //insert from warenkorb into ordered_article TABLE
                //     $index = 0;
                //     foreach ($ordered_article_list as $ordered_article) {
                //         $sqlInsertOrderedArticleCommand = "INSERT INTO ordered_article 
                //             SET ".
                //             "ordering_id = $new_inserted_ordering_id, ".
                //             "article_id = $ordered_article_list[$index],".
                //             "status = 0";
                //         $this->database->query($sqlInsertOrderedArticleCommand);

                //         $index = $index+1;
                //     }
            }
        }
    }
    public static function main(): void
    {
        try {
            $page = new Bestellung();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Bestellung::main();