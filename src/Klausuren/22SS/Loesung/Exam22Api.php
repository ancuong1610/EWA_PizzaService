<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
require_once './Page.php';

class RestDictionary extends Page
{
    private string $searchWord = "";
    protected function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    protected function getViewData():array
    {
		$this->searchWord = strtolower(trim($this->searchWord));
		
        if ($this->searchWord === "") {
            return array();
		}
		
        $explanation = array();
		
		$search = $this->_database->real_escape_string($this->searchWord);
        $sql = "SELECT id, explanation FROM `2022_Easy2Read`.Dictionary where TRIM(LOWER(`word`)) = '$search' limit 1";
        $recordset = $this->_database->query($sql);
        if (!$recordset) {
            throw new Exception("Fehler in Abfrage: " . $this->_database->error);
        }
        while ($record = $recordset->fetch_assoc()) {
            $explanation["word"] = $this->searchWord;
            $explanation["explanation"] = $record["explanation"];
        }
        $recordset->free();
        return $explanation;
    }

    protected function generateView():void
    {
		$data = $this->getViewData();
		if (empty($data)){
            // send response with 404 error
            header("HTTP/1.0 404 Not Found");
            die();
        }
        header("Content-Type: application/json; charset=UTF-8");
        $serializedData = json_encode($data);
        echo $serializedData;
    }

    protected function processReceivedData():void
    {
        parent::processReceivedData();
        if (isset($_GET["search"]) && !empty($_GET["search"])){
            $this->searchWord = $_GET["search"];
        }
    }

    public static function main():void
    {
        try {
            $page = new RestDictionary();
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
RestDictionary::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >