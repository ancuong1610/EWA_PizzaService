<?php declare(strict_types=1);

require_once './Page.php';

class BackerSeite extends Page
{
    protected function __construct()
    {
        parent::__construct();
    }
    public function __destruct()
    {
        parent::__destruct();
    }
    protected function getViewData(): array
    {
        $sqlAbfrage = "SELECT ordered_article_id, 
    name, status, ordering_time, ordering_id 
    FROM article NATURAL JOIN ordered_article 
    NATURAL JOIN ordering WHERE status < 3 
    ORDER BY ordering_time, ordered_article_id;";

        $recordSet = $this->database->query($sqlAbfrage);
        if (!$recordSet) {
            throw new Exception("Keine Bestellung in Datenbank vorhanden");
        }
        $bestellungArray = array(array());
        $record = $recordSet->fetch_assoc();
        $count = 0;
        while ($record) {
            $bestellungArray[$count]["orderedArticleID"] = $record["ordered_article_id"];
            $bestellungArray[$count]["name"] = $record["name"];
            $bestellungArray[$count]["status"] = $record["status"];
            $bestellungArray[$count]["orderingTime"] = $record["ordering_time"];
            $bestellungArray[$count]["orderingID"] = $record["ordering_id"];
            $record = $recordSet->fetch_assoc();
            $count = $count + 1;
        }
        $recordSet->free();

        return $bestellungArray;
    }
    private function fillPizzaInfo(string $formID = "", string $orderedArticleID = "", string $name = "", string $status = "", string $orderingTime = "", string $orderingID = ""): void
    {
        $idBestellt = "ordered" . "$orderedArticleID";
        $idImOfen = "ofen" . "$orderedArticleID";
        $idFertig = "fertig" . "$orderedArticleID";
        $checkStatusArray = array(0 => "", 1 => "", 2 => "");

        if ($status == "0") {
            $checkStatusArray[0] = "checked";
        } elseif ($status == "1") {
            $checkStatusArray[1] = "checked";
        } else {
            $checkStatusArray[2] = "checked";
        }
        echo <<<EOT
        <div>
            <h3 class="baecker_header">$orderedArticleID $name | Ordering ID: $orderingID</h3>
            <div class="baecker_header">
                <input class="baecker_header"
                form="$formID" type="radio" name="pizzaStatus" value="0" $checkStatusArray[0]
                onclick="document.forms['$formID'].submit();">
                <label class="baecker_header"
                for="$idBestellt">Bestellt</label><br>
                <input class="baecker_header"
                 form="$formID" type="radio" name="pizzaStatus" value="1" $checkStatusArray[1]
                onclick="document.forms['$formID'].submit();">
                <label class="baecker_header"
                for="$idImOfen">Im Ofen</label><br>
                <input class="baecker_header"
                form="$formID" type="radio" name="pizzaStatus" value="2" $checkStatusArray[2]
               onclick="document.forms['$formID'].submit();">
                <label class="baecker_header"
                for="$idFertig">Fertig</label><br>
                <input class="baecker_header"
                form="$formID" type="hidden" name="pizzaID" value=$orderedArticleID>
            </div>
        </div>

    EOT;
    }

    private function printPizzaList(array $data): void
    {
        if (count($data[0])) {
            foreach ($data as $bestellung){
                $orderedArticleID = htmlspecialchars($bestellung["orderedArticleID"], ENT_QUOTES, 'UTF-8');
                $formID = "Pizza" . $orderedArticleID;
                $name = htmlspecialchars($bestellung["name"], ENT_QUOTES, 'UTF-8');
                $status = htmlspecialchars($bestellung["status"], ENT_QUOTES, 'UTF-8');
                $orderingTime = htmlspecialchars($bestellung["orderingTime"], ENT_QUOTES, 'UTF-8');
                $orderingID = htmlspecialchars($bestellung["orderingID"], ENT_QUOTES, 'UTF-8');

                echo <<< EOT
    <form id="$formID" action="Baecker.php" method="post" lang="de" accept-charset="UTF-8"></form>

EOT;
                $this->fillPizzaInfo($formID, $orderedArticleID, $name, $status, $orderingTime, $orderingID);
            }
        }
        else {
            echo <<<EOT
            <p class = "warning"> KEINE BESTELLUNG </p>
            EOT;;
        }
    }
    
    protected function generateView(): void
    {
        $data = $this->getViewData();

        $sec = "10";
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $sec; url=$page");

        $this->generatePageHeader('Baecker');

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

EOT;
        $this->printPizzaList($data);
        $this->generatePageFooter();
    }
    protected function processReceivedData(): void
    {
        parent::processReceivedData();
        if(count($_POST)){
            if(isset($_POST["pizzaID"]) && isset($_POST["pizzaStatus"])) {
                $orderedArticleID = $this->database->real_escape_string($_POST["pizzaID"]);
                $status = $this->database->real_escape_string($_POST["pizzaStatus"]);

                $sqlAbfrage =
                    "SELECT * FROM ordered_article 
                    WHERE ordered_article_id = \"$orderedArticleID\";";

                $recordset = $this->database->query($sqlAbfrage);

                if ($recordset->num_rows == 0) {
                    $recordset->free();
                    throw new Exception(" Pizza nicht vorhanden!");

                } else {
                    $sqlAbfrage =
                        "UPDATE ordered_article 
                        SET status = \"$status\" 
                        WHERE ordered_article_id = \"$orderedArticleID\";";
                    $this->database->query($sqlAbfrage);
                }
            }
        }
    }

    public static function main(): void
    {
        try {
            $page = new BackerSeite();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

BackerSeite::main();