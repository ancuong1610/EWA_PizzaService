<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

require_once './Page.php';

class Result extends Page
{
    private string $selectedCountry;

    protected function __construct()
    {
        parent::__construct();
        $this->selectedCountry = 'xxx';
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    protected function getViewData():array
    {
        // build SQL query from form parameters
        $countries = array();
        $this->selectedCountry = $this->database->real_escape_string($this->selectedCountry);
        $sql = "SELECT * FROM zielflughafen WHERE Land = \"$this->selectedCountry\"";
        $recordset = $this->database->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
        }

        // read selected records into result array
        $record = $recordset->fetch_assoc();
        while ($record) {
            $airport = $record["Zielflughafen"];
            $country = $record["Land"];
            $countries[$airport] = $country;
            $record = $recordset->fetch_assoc();
        }
        $recordset->free();
        return $countries;
    }

    private function insert_tablerow(string $indent, string $entry1 = "", string $entry2 = "", string $entry3 = ""):void
    {
        echo $indent . "<tr>\n";
        echo $indent . "\t<td>$entry1</td>\n";
        echo $indent . "\t<td>$entry2</td>\n";
        echo $indent . "\t<td>$entry3</td>\n";
        echo $indent . "</tr>\n";
    }

    protected function generateView():void
    {
        $countries = $this->getViewData();    // vor der ersten HTML-Ausgabe

        $this->generatePageHeader('Ergebnis');
        echo <<<HERE
		<h1>Ausgewählte Flughäfen:</h1>
		<table>
			<tr>
				<th>Zielflughafen</th>
				<th>Land</th>
				<th>Zielflughafen (Land)</th>
			</tr>

HERE;
        foreach ($countries as $airport => $country) {
            $airport = htmlspecialchars($airport);
            $country = htmlspecialchars($country);
            $this->insert_tablerow("\t\t\t", $airport, $country, $airport . " (" . $country . ")");
        }
        echo <<<HERE
		</table>
		<p><input type="button" value="Neue Auswahl" 
			onclick="window.location.href='Select.php'"/></p>

HERE;
        $this->generatePageFooter();
    }

    protected function processReceivedData():void
    {
        parent::processReceivedData();
        if (isset($_POST["AuswahlLand"])) {
            $this->selectedCountry = $_POST["AuswahlLand"];
        }
    }

    public static function main():void
    {
        try {
            $page = new Result();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Result::main();
