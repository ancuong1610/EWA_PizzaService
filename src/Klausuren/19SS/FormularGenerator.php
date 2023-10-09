<?php // UTF-8 marker äöüÄÖÜß€

// This is a template for top level classes, which represent a complete web page and
// which are called directly by the user.
// The order of methods might correspond to the order of thinking during implementation.

require_once './Page.php';

// to do: change name 'PageTemplate' throughout this file
class FormularGenerator extends Page
{
    // to do: declare attributes (e.g. references for member variables representing substructures/blocks)

    protected function __construct()
    {
        parent::__construct();
        // to do: instantiate attribute objects
    }

    public function __destruct()
    {
        // to do: if necessary, destruct attribute objects representing substructures/blocks
        parent::__destruct();
    }


    protected function getViewData()
    {
        // ID beinhaltet implizit die Anzeigereihenfolge
        $sql = "SELECT ID, Beschriftung, NameAttr, Typ FROM Formelemente ORDER BY ID";

        $recordset = $this->db->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->db->error);
        }

        $elemente = array();
        $data = array();
        while ($record = $recordset->fetch_assoc()) {
            $data["ID"] = $record["ID"];
            $data["Beschriftung"] = $record["Beschriftung"];
            $data["NameAttr"] = $record["NameAttr"];
            $data["Typ"] = $record["Typ"];
            $elemente[$record["ID"]] = $data; // Array of arrays
        }
        $recordset->free();
        return $elemente;
    }

    protected function generateView()
    {
        if (!isset($_GET["key"])) { //No response-page required for AJAX-request (not expected)
            $viewData = $this->getViewData();
            $this->generatePageHeader('FormularGenerator');

            echo <<<HTML
			<form action="https://echo.fbi.h-da.de" method="post" accept-charset="UTF-8">
			
HTML;
            foreach ($viewData as $elemente => $data) { //NOSONAR ignore unused $elemente
                $this->generateInputElement($data);
            }
            echo <<<HTML
				<input class = "submit" type="submit" value="Absenden"/>
				</form>
HTML;
            $this->generatePageFooter();
        }
    }

    private function generateInputElement($data)
    {
        $type = $data['Typ'];
        $name = $data['NameAttr'];
        // do not use htmlspecialchars before view is being generated!
        $label = htmlspecialchars($data["Beschriftung"]);
        $value = "";
        if (isset($_SESSION[$name])) { // AJAX-Werte einbauen
            $value = $_SESSION[$name];
        }

        echo <<<HTML
	<div class="row">
			<label> $label <!-- label needs to be defined (accessibility) -->
				<input type="$type" name="$name" value="$value"/>	
			</label>
	</div>
	
HTML;
    }

    protected function isValidKey($name)
    {
        //Helper function - checks whether passed name-attribute exists in database
        $key = $this->db->real_escape_string($name);
        $sql = "SELECT NameAttr FROM Formelemente WHERE NameAttr ='$key'";
        //error_log ("****** $sql *******");
        $recordset = $this->db->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->db->error);
        }

        $ret = false;
        if ($recordset->num_rows) {
            $ret = true;
        }
        $recordset->free();
        return $ret;
    }

    protected function processReceivedData()
    {
        session_start(); // first thing - maybe in main, but better here because main is given
        parent::processReceivedData();
        if (isset($_GET["key"]) && isset($_GET["value"])) {
            $key = $_GET["key"];
            $value = $_GET["value"];
            //error_log ("$key = $value"); 	// for debugging
            if ($this->isValidKey($key)) {
                $_SESSION[$key] = $value;
            }
        }
    }

    public static function main()
    {
        try {
            $page = new FormularGenerator();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

FormularGenerator::main();
