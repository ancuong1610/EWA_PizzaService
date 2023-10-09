<?php // UTF-8 marker äöüÄÖÜß€
require_once './Page.php';

class DBException extends Exception
{
}

class News extends Page
{
    private $JSON = false;

    protected function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    protected function getViewData()
    {
        // Aufgabe 3a ***********************************
        $news = array();
        $sql = "SELECT id, title, text, timestamp FROM news ORDER BY timestamp DESC";
        $recordset = $this->db->query($sql);
        if (!$recordset) {
            throw new DBException("Fehler in Abfrage: " . $this->db->error);
        }
        while ($record = $recordset->fetch_assoc()) {
            // Aufgabe 3c) ****************************
            $record["timestamp"] = $this->getLocalizedDate($record["timestamp"]);    // 3c)
            // Ende Aufgabe 3c) **********************
            $news[] = $record;
        }
        $recordset->free();
        // Ende Aufgabe 3a ***********************************
        return $news;
    }

    protected function generateView()
    {
        // Aufgabe 3e ***********************************
        if ($this->JSON) {
            $this->generateJSONView();
        } else {
            $this->generateHTMLView();
        }
        // Ende Aufgabe 3e ******************************
    }

    protected function generateHTMLView()
    {
        $this->generatePageHeader("News");

        echo <<<EOT

  <!-- Aufgabe 1 **************************************** -->
  <body onload="pollNews();"> <!-- onload für Aufgabe 4b -->
      <header>
        <h1>Meine Zeitung</h1>
        <img src="logo.png" alt="fbi logo" />
    </header>
    <nav>
        <ul>
            <li>Home</li>
            <li>Mediathek</li>
            <li>Politik</li>
            <li>Sport</li>
        </ul>
    </nav>
	
	<section>
	<h2>News-Ticker</h2>
	<div id="news"></div>
	</section>

    <section>
	  <h2>Ihre News</h2>
		<form action="news.php" method="post" accept-charset="UTF-8">
			<div class="formular">
			<input type="text" name="Titel" placeholder="Titel Ihrer News" value="" tabindex="1"/>
			<textarea name="Text" placeholder="Ihre News" tabindex="2" accesskey="n"></textarea>
			<input type="submit" value="Absenden" tabindex="-1"/>
		</div>
		</form>
	</section>
	
	<footer><p>&copy; Fachbereich Informatik</p></footer>
	
	</body>	
	<!-- Ende Aufgabe 1 **************************************** -->
	
EOT;
        $this->generatePageFooter();

    }

    protected function generateJSONView()
    {
        // Aufgabe 3b ***********************************
        header("Content-Type: application/json; charset=UTF-8");
        $news = $this->getViewData();
        $serializedData = json_encode($news);
        echo $serializedData;
        // Ende Aufgabe 3b ******************************
    }

    protected function processReceivedData()
    {
        // Aufgabe 2 ****************************************
        parent::processReceivedData();
        // Aufgabe 3d *************************
        if (isset($_GET["JSON"])) {
            $this->JSON = true;
        }
        // Ende Aufgabe 3d *************************
        if (isset($_POST["Titel"]) && isset($_POST["Text"])) {
            $titel = $this->db->real_escape_string($_POST["Titel"]);
            $text = $this->db->real_escape_string($_POST["Text"]);
            $sql = "INSERT INTO news (title, text) values ('$titel','$text');";
            if (!$this->db->query($sql)) {
                throw new DBException("Insert failed: " . $this->db->error);
            }
            header('Location:news.php'); // löst POST-Blockade; nicht gefordert für die Klausur
        }
        // Ende Aufgabe 2 **********************************
    }

    protected function getLocalizedDate($date)
    {
        $date = new DateTime($date);
        if (strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], "de-DE") > -1) {
            return $date->format("d.m.Y H:i:s");
        } else { // English as default
            return $date->format("Y/m/d H:i:s");
        }
    }

    public static function main()
    {
        try {
            $page = new News();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

News::main();

