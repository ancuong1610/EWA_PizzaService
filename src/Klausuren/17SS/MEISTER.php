<?php

require_once 'Page.php';

class MEISTER extends Page
{
    protected $frageRecord = null;
    protected $richtig = true;

    protected function __construct()
    {
        session_start();
        parent::__construct();
    }

    protected function getViewData()
    {
        $recordset = $this->db->query("SELECT * FROM fragen ORDER BY rand() LIMIT 1;");
        if (!$recordset) {
            throw new Exception("Fehler beim Lesen der Frage");
        }
        $this->frageRecord = $recordset->fetch_assoc();
        $recordset->free();
    }

    protected function generateView()
    {
        $this->getViewData();
        $this->generatePageHeader("Quizmeister");
        echo <<<EOT
		<h1>Wer wird h_da Quizmeister?</h1>
		<form action="MEISTER.php" method="post">

EOT;
        if ($this->richtig) {   // alle bisherigen Antworten sind richtig
            if (!isset($_SESSION['spielID'])) {   // 1. Aufruf im neuen Spiel
                echo <<<EOT
				<div>
					<p>
						Neues Spiel - bitte geben Sie Ihren Namen ein:
					</p>
					<input type="text" name="name" value="" id="name" placeholder="Ihr Name?" required/>
				</div>

EOT;
            }
            $frage = htmlspecialchars($this->frageRecord['frage']);
            $antwort1 = htmlspecialchars($this->frageRecord['antwort1']);
            $antwort2 = htmlspecialchars($this->frageRecord['antwort2']);
            $antwort3 = htmlspecialchars($this->frageRecord['antwort3']);
            echo <<<EOT
			<div>
				<h2>Frage:</h2>
				<p>$frage</p>
				<input type="submit" name="antwort1" value="$antwort1" class="submit" />
				<input type="submit" name="antwort2" value="$antwort2" class="submit" />
				<input type="submit" name="antwort3" value="$antwort3" class="submit" />
			</div>

EOT;
            $_SESSION['richtigeAntwort'] = $this->frageRecord['richtig'];
        } else {   // die letzte Antwort war falsch
            echo "<p>leider falsch</p>\r\n";
        }
        echo <<<EOT
		</form>
		<progress id="myProgress" value="0" max="30"></progress>	<!-- war vorgegeben -->

EOT;
        $this->generatePageFooter();
    }

    protected function processReceivedData()
    {
        if (isset($_POST['name'])) {
            $name = $this->db->real_escape_string($_POST['name']);
            if (!$name) {
                throw new Exception("Name fehlt");
            }
            $ok = $this->db->query("INSERT INTO spiele (name, antworten) VALUES ('$name', 0);");
            if (!$ok) {
                throw new Exception("Fehler bei Insert");
            }
            $_SESSION['spielID'] = $this->db->insert_id;
        }

        if (isset($_SESSION['spielID'])) {
            $antwort = $this->getAntwort();

            if ($antwort > 0) {
                $this->richtig = ($antwort == $_SESSION['richtigeAntwort']);
            } else {
                $this->richtig = false;    // Frage nicht beantwortet oder Timeout
            }
            if ($this->richtig) {
                $ok = $this->db->query("UPDATE spiele SET antworten = antworten + 1 WHERE id = '{$_SESSION['spielID']}';");
                if (!$ok) {
                    throw new Exception("Fehler bei Update");
                }
            } else {
                $_SESSION = array();    // neues Spiel vorbereiten
            }
        }
    }

    protected function getAntwort(): int
    {
        if (isset($_POST['antwort1'])) {
            $antwort = 1;
        } else if (isset($_POST['antwort2'])) {
            $antwort = 2;
        } else if (isset($_POST['antwort3'])) {
            $antwort = 3;
        } else {
            $antwort = 0;
        }
        return $antwort;
    }

    public static function main()
    {
        try {
            $page = new MEISTER();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/plain");
            echo $e->getMessage();
        }
    }

}

MEISTER::main();    
