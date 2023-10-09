<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

require_once './Page.php';

class Exam21 extends Page
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

    /**
     * Cleans up whatever is needed.
     * Calls the destructor of the parent i.e. page class.
     * So, the database connection is closed.
     */
    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * Fetch all data that is necessary for later output.
     * Data is returned in an array e.g. as associative array.
	 * @return array An array containing the requested data. 
	 * This may be a normal array, an empty array or an associative array.
     */
    protected function getViewData():array
    {
        $data = array();
        $sql = "SELECT id, datetime, opposingTeam, status FROM games order by datetime asc";
        $recordset = $this->_database->query($sql);
        if (!$recordset) {
            throw new Exception("Fehler in Abfrage: " . $this->_database->error);
        }
        while ($record = $recordset->fetch_assoc()) {
            $data[] = $record;
        }
        $recordset->free();
        return $data;
    }

    /**
     * First the required data is fetched and then the HTML is
     * assembled for output. i.e. the header is generated, the content
     * of the page ("view") is inserted and -if available- the content of
     * all views contained is generated.
     * Finally, the footer is added.
	 * @return void
     */
    protected function generateView():void
    {
        $data = $this->getViewData(); // NOSONAR ignore unused $data

		// just to be sure - escape all html-values...
		for ($i = 0; $i < count($data); $i++) {			
			foreach($data[$i] as $key => $value){
				$data[$i][$key] = htmlspecialchars($value);
			}
		}
		
        $this->generatePageHeader("Spielplanung");
        $nextGame = $this->generateNextGameSection($data);
        echo <<<EOT
        <body onload="pollData()">
            <header>
                <img alt="" src="logo.png" />
                <h1>Spielplanung</h1>
            </header>
            $nextGame
EOT;
        $games = $this->generateGameTableRows($data);
        echo <<<EOT
            <section>
            <h2>Spiele</h2>
            <table>
                <tr><th>Datum</th><th>Team</th><th>Status</th></tr>
                $games
            </table>
            </section>
        </body>
EOT;
        $this->generatePageFooter();
    }

    protected function generateGameTableRows(array $dataRows): string
    {
        $htmlRows = "";
        foreach($dataRows as $row){
            $htmlRows .= "<tr><td>" . $this->getFormattedDateTime($row["datetime"]) . "</td><td>" . $row["opposingTeam"] . "</td><td>". $this->getStatusTextToInt($row["status"]) . "</td></tr>\n";
        }
        return $htmlRows;
    }

    protected function generateNextGameSection(array $dataRows): string
    {
        foreach($dataRows as $row){
            if ($row["status"] == 1 || $row["status"] == 2){
                $gameId = $row["id"];
                $nextGameInfo = $this->getFormattedDateTime($row["datetime"]) . " Uhr gegen " . $row["opposingTeam"];
                return "<section><h2>$nextGameInfo</h2>"
                    . '<h3>Zusagen Spieler:innen <span id="players">?</span></h3>'
                    . '<form accept-charset="UTF-8" method="post"><input type="hidden" id="gameId" name="gameId" value="'
                        . $gameId . '"><input type="submit" name="finishGame" value="Planung abschließen" /></form></section>';
            }
        }
        return "<h2>kein aktuelles Spiel</h2>";
    }

    private function getStatusTextToInt(string $status):string
    {
        switch ($status) {
            case "0":
                $ret = "zukünftig";
				break;
            case "1":
                $ret = "in Planung";
				break;
            case "2":
                $ret = "Planung abgeschlossen";
				break;
            case "3":
                $ret = "vorbei";
				break;
            default:
                $ret = "unbekannter Status";				
        }
		return $ret;
    }

    private function getFormattedDateTime(string $date):string
    {
        $date = new DateTime($date);
            return $date->format("d.m.Y H:i");
    }

    /**
     * Processes the data that comes via GET or POST.
     * If this page is supposed to do something with submitted
     * data do it here.
	 * @return void
     */
    protected function processReceivedData():void
    {
        parent::processReceivedData();
        if (isset($_POST["finishGame"]) && isset($_POST["gameId"])){
            $gameId = $this->_database->real_escape_string($_POST["gameId"]); //oder is_numeric prüfen
            $sql = "UPDATE games set status = 2 WHERE id=$gameId AND status=1;";
            if (!$this->_database->query($sql)) {
                throw new Exception("Update failed: " . $this->_database->error);
            }
            header('Location:Exam21.php');
            //header();
            die();
        }
    }

    /**
     * This main-function has the only purpose to create an instance
     * of the class and to get all the things going.
     * I.e. the operations of the class are called to produce
     * the output of the HTML-file.
     * The name "main" is no keyword for php. It is just used to
     * indicate that function as the central starting point.
     * To make it simpler this is a static function. That is you can simply
     * call it without first creating an instance of the class.
	 * @return void
     */
    public static function main():void
    {
        try {
            $page = new Exam21();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

// This call is starting the creation of the page. 
// That is input is processed and output is created.
Exam21::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >