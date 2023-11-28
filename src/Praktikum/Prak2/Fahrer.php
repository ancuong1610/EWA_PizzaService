<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

// to do: change name 'PageTemplate' throughout this file
require_once './Page.php';
class Fahrer extends Page
{
    protected function __construct()
    {
        parent::__construct();
        // to do: instantiate members representing substructures/blocks
    }
    public function __destruct()
    {
        parent::__destruct();
    }
    protected function getViewData():array
    {
        $sqlAbfrage = "SELECT * FROM ordering";
        $recordSet = $this->database->query($sqlAbfrage);
        if(!$recordSet)
        {
            throw new Exception("Keine Bestellung in Datenbank");
        }
        $lieferArray = array();
        $count = 0;

        $record = $recordSet->fetch_assoc();
        while($record)
        {
            $lieferArray[$count]["orderingID"] = $record["ordering_id"];
            $lieferArray[$count]["address"] = $record["address"];
            $lieferArray[$count]["orderingTime"] = $record["ordering_time"];

            $orderingID = $record["ordering_id"];

            $pizzaAbfrage = "SELECT ordering_id, name, status, price FROM ordered_article NATURAL JOIN article WHERE ordering_id = $orderingID ORDER BY ordering_id";
            $pizzaRecordSet = $this->database->query($pizzaAbfrage);
            $pizzaRecord = $pizzaRecordSet->fetch_assoc();

            $totalPrice = 0;
            $pizzaList = "";
            $pizzaStatus = array();

            while ($pizzaRecord)
            {
                if($pizzaRecord["ordering_id"] == $orderingID)
                {
                    $totalPrice += $pizzaRecord["price"];
                    array_push($pizzaStatus, $pizzaRecord["status"]);
                    if($pizzaList == "")
                    {
                        $pizzaList = $pizzaRecord["name"];
                    }
                    else
                    {
                        $pizzaList = $pizzaList.", ".$pizzaRecord["name"];
                    }
                }
                $pizzaRecord = $pizzaRecordSet->fetch_assoc();
            }
            $pizzaRecordSet->free();

            $lieferArray[$count]["totalPrice"] = (string)$totalPrice. "€";
            $lieferArray[$count]["pizzaList"] = $pizzaList;
            $lieferArray[$count]["pizzaStatus"] = (string) min($pizzaStatus);
            $record = $recordSet->fetch_assoc();
            $count++;
        }
        $recordSet->free();
        return $lieferArray;
    }
    private function fillStatusInfo(string $orderingID = "", string $address = "", string $orderingTime = "", string $totalPrice = "", string $pizzaList = "", string  $status = ""): void
    {
        $idFertig="fertig" . "$orderingID";
        $idUnterwegs="unterwegs" . "$orderingID";
        $idGeliefert="geliefert" . "$orderingID";

        $checkstatusarray = array(0 => "", 1 => "", 2 => "");

        if ($status == "2") {
            $checkstatusarray[0] = "checked";
        }
        elseif ($status == "3") {
            $checkstatusarray[1] = "checked";
        }
        elseif ($status == "4") {
            $checkstatusarray[2] = "checked";
        }

        echo <<< EOT
        <div>
            <table>
                <tr>
                    <td>$address</td>
                </tr>
                <tr>
                    <td>$orderingTime</td>
                </tr>
                <tr>
                    <td>$pizzaList:   $totalPrice</td>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <td><input type="radio" id="$idFertig" name="$orderingID" value="fertig" $checkstatusarray[0]><label for="$idFertig"></label>Fertig</label><br></td>
                            <td><input type="radio" id="$idUnterwegs" name="$orderingID" value="unterwegs" $checkstatusarray[1] for="$idUnterwegs"><label>Unterwegs</label><br></td>
                            <td><input type="radio" id="$idGeliefert" name="$orderingID" value="geliefert" $checkstatusarray[2] for="$idGeliefert"><label>Geliefert</label><br></td>
                        </tr>
                    </table>
                </tr>
            </table>
            
        </div>
        <br>
        EOT;
    }
    protected function generateView():void
    {
        $data = $this->getViewData();
        $sec = "10";
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $sec; url = $page");
        $this->generatePageHeader('Fahrer');



        echo <<< EOT
            <h2>Auslieferbare Bestellungen</h2>
            <form action="Fahrer.php" id="LieferInfos" method="post" accept-charset="UTF-8">       
        EOT;

        if (!$data) {
            echo "Keine Bestellungen anzuzeigen";
        }
        else {
            foreach ($data as $liefer) {
                $status = $liefer["pizzaStatus"];
                if($status == "2" || $status == "3")
                {
                    $orderingID = $liefer["orderingID"];
                    $address = $liefer["address"];
                    $orderingTime = $liefer["orderingTime"];
                    $totalPrice = $liefer["totalPrice"];
                    $pizzaList = $liefer["pizzaList"];
                    $this->fillStatusInfo($orderingID, $address, $orderingTime, $totalPrice, $pizzaList, $status);
                }
            }

            echo <<<EOT
                <input type="submit" id="submit" value="Bestätigen">
            </form>
        </body>
        EOT;

        }
        $this->generatePageFooter();
    }
    protected function processReceivedData():void
    {
        parent::processReceivedData();

        if(count($_POST))
        {
            if(isset($_POST))
            {
                foreach ($_POST as $orderingID => $status)
                {
                    $sqlAbfrage = "SELECT * FROM ordering WHERE ordering_id = $orderingID";
                    $recordSet = $this->database->query($sqlAbfrage);

                    if($recordSet->num_rows == 0)
                    {
                        $recordSet->free();
                        throw new Exception("Keine Bestellung vorhanden");
                    }
                    else
                    {
                        if ($status == "fertig") {
                            $status = "2";
                        }
                        elseif ($status == "unterwegs") {
                            $status = "3";
                        }
                        else {
                            $status = "4";
                        }

                        $sqlAbfrage = "UPDATE ordered_article SET status = $status WHERE ordering_id = $orderingID";
                        $this->database->query($sqlAbfrage);
                    }
                }
            }
        }
    }

    public static function main():void
    {
        try {
            $page = new Fahrer();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Fahrer::main();