<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

require_once './Page.php';

class Select extends Page
{

    protected function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    protected function generateView():void
    {
        $this->generatePageHeader('Auswahl');
        echo <<<HERE
    <p>Bitte wählen Sie ein Land:</p>

HERE;
        $countries = $this->getViewData();
        $numOfRecords = count($countries);

        echo <<<EOT
	<form id="Auswahl" action="Result.php" method="post">
		<p>
			<select name="AuswahlLand" size="$numOfRecords">

EOT;

        foreach ($countries as $country) {
            $this->insert_option("\t\t", $country);
        }
        echo <<<EOT
			</select>
		</p>
		<p><input type="submit" value="Flughäfen anzeigen"/></p>
	</form>

EOT;
        echo <<<HERE
	<p><input type="button" value="Flughafen einfügen"
		onclick="window.location.href='Add.php'"/></p>

HERE;
        $this->generatePageFooter();
    }

    protected function getViewData():array
    {
        $sql = "SELECT Land FROM zielflughafen GROUP BY Land";

        $recordset = $this->database->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
        }
        // read selected records into result array
        $country = array();
        $record = $recordset->fetch_assoc();
        while ($record) {
            $country[] = $record["Land"];
            $record = $recordset->fetch_assoc();
        }
        $recordset->free();
        return $country;
    }

    private function insert_option(string $indent, string $name):void
    {
        echo $indent . "<option>" . htmlspecialchars($name) . "</option>\n";
    }

    protected function processReceivedData():void
    {
        parent::processReceivedData();
    }

    public static function main():void
    {
        try {
            $page = new Select();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Select::main();
