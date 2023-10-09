<?php

require_once 'Page.php';

class PosterShop extends Page
{
    private $heading = "Finde das passende Poster für dein Wohnzimmer!";

    protected function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['zimmer'])) {
            $_SESSION['zimmer'] = "Background.jpg";
        }
    }

    protected function getViewData()
    {
        $sql = "SELECT datei FROM poster ORDER BY datei;";
        $result = $this->db->query($sql);
        if (!$result) {
            throw new Exception("Select fehlgeschlagen: " . $this->db->error);
        }
        $pictures = array();
        while ($poster = $result->fetch_assoc()) {
            $pictures[] = $poster["datei"];
        }
        $result->free();
        return $pictures;
    }

    protected function generateView()
    {
        $pictures = $this->getViewData();
        $this->generatePageHeader("PosterShop");
        $options = "\r\n";
        for ($i = 0; $i < count($pictures); $i++) {
            $options .= <<<EOT
					<option>{$pictures[$i]}</option>

EOT;
        }

        echo <<<EOT
			<h1>$this->heading</h1>
			<div> <!-- nötig, damit die Positionierung klappt (in der Klausur nicht erwartet!) -->
				<img id="zimmer" alt="Wohnzimmer" src="Images/{$_SESSION['zimmer']}"/>
				<img id="poster" alt="Ausgewähltes Poster" src=""/>
			</div>
			<form action="PosterShop.php" accept-charset="UTF-8" method="post">
				<select name="allPosters" id="allPosters" class="hidden">
					$options
				</select>
				<input type="button" name="next" value="Nächstes Poster" onclick="nextPoster();"/>
				<input type="submit" name="order" value="Poster bestellen"/>
			</form>

EOT;
        $this->generatePageFooter();
    }

    protected function processReceivedData()
    {
        if (isset($_POST['allPosters'])) {
            $selectedPoster = $this->db->real_escape_string($_POST['allPosters']);
            $sql = "INSERT INTO bestellung (kunde, datei) VALUES ('{$_SESSION['kunde']}', '$selectedPoster');";
            if (!$this->db->query($sql)) {
                throw new Exception("Insert fehlgeschlagen: " . $this->db->error);
            }
            $this->heading = "Vielen Dank für Ihre Bestellung";
        }
    }

    public static function main()
    {
        try {
            $page = new PosterShop();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

PosterShop::main();
