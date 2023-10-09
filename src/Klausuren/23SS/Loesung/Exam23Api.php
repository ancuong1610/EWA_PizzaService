<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
require_once './Page.php';

class Exam23Api extends Page
{
    private string $name = "";
    private string $email = "";
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
        $result = array();
        $result["name"] = $this->name;
        $result["email"] = $this->email;
        return $result;
    }

    protected function generateView():void
    {
		$data = $this->getViewData();
		header("Content-Type: application/json; charset=UTF-8");
        $serializedData = json_encode($data);
        echo $serializedData;
    }

    protected function processReceivedData():void
    {
        if (isset($_POST['name']) && isset($_POST['email'])) {
            $this->name = $this->database->real_escape_string($_POST['name']);
            $this->email = $this->database->real_escape_string($_POST['email']);
            if (!$this->name) {
                throw new Exception("Name fehlt");
            }
            if (!$this->email) {
                throw new Exception("Email fehlt");
            }
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("ungueltige Emailadresse");
            }
            $ok = $this->database->query("INSERT INTO anmeldung (kunden_name, kunden_email) VALUES ('$this->name', '$this->email');");
            if (!$ok) {
                throw new Exception("Fehler bei Insert");
            }

        }
    }

    public static function main():void
    {
        try {
            $page = new Exam23Api();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/html; charset=UTF-8");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($e->getMessage());
        }
    }
}


// This call is starting the creation of the page. 
// That is input is processed and output is created.
Exam23Api::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >