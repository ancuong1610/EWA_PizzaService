<?php // UTF-8 marker äöüÄÖÜß€
class XssDemoDriver
{
    protected MySQLi $database;
		
	protected bool $SafeMode;
	protected string $PageTitle;

    protected function __construct()
    {
		$this->SafeMode = false;
		
// activate full error checking
        error_reporting(E_ALL);
        $host = "localhost";
        /********************************************/
// This code switches from the the local installation (XAMPP) to the docker installation
        if (gethostbyname('mariadb') != "mariadb") { // mariadb is known?
            $host = "mariadb";
        }
        $database = "XSS_Demo";
        $user = "public";
        $pwd = "public"; //NOSONAR ignore inline password for demo
// open database
        $this->database = new MySQLi($host, $user, $pwd, $database);
// check connection to database
        if ($this->database->connect_errno) {
            throw new Exception("Connect failed: " . $this->database->connect_errno);
        }
// set character encoding to UTF-8
        if (!$this->database->set_charset("utf8")) {
            throw new Exception("Fehler beim Laden des Zeichensatzes UTF-8: " . $this->database->error);
        }
    }

    public static function main()
    {
        try {
            $page = new XssDemoDriver();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }

    protected function processReceivedData():void
    {
		// if this page is called with a get parameter - switch to secure mode
		if (count($_GET)){
			$this->SafeMode = true;
			$this->PageTitle="MIT htmlspecialchars vor der Ausgabe";
		} else {
			$this->SafeMode = false;
			$this->PageTitle="OHNE htmlspecialchars vor der Ausgabe";
		}
    }

    protected function generateView():void
    {
        $data = $this->getViewData();
		
		//print_r ($data);

        $nameUnmodified=$data["NameUnmodified"];
        $nameHTMLSpecialChar=$data["NameHTMLSpecialChar"];
        $addressUnmodified=$data["AddressUnmodified"];
		
		if ($this->SafeMode){
			$nameUnmodified=htmlspecialchars($nameUnmodified);
			$nameHTMLSpecialChar=htmlspecialchars($nameHTMLSpecialChar);
			$addressUnmodified=htmlspecialchars($addressUnmodified);
		}

        echo <<<EOT
<!DOCTYPE html>
		<html lang="de">
			<head>
				<meta charset="UTF-8" />
				<style>
					img {width:100vw; }
					h1 	{font: 1.2em Arial, sans-serif;}
				</style>
				<meta http-equiv="refresh" content="5" /> <!-- // NOSONAR ignore deprecated refresh -->
				<title>XSS Attack</title>
			</head>
			<body>
				<header>
					<h1>Cross-Site-Scripting: $this->PageTitle</h1>
				</header>
				<img src="XSS_Demo_Driver_Header.jpg" width="60%"
   					alt="Snapshot vom Pizzaservice. Sorry, Sie müssen die Praktikumsaufgabe selbst lösen!" />
				<p>	{$nameUnmodified}, {$addressUnmodified}</p>					
				<img src="XSS_Demo_Driver_Footer.jpg" width="60%"
   					alt="Snapshot vom Pizzaservice. Sorry, Sie müssen die Praktikumsaufgabe selbst lösen!" />
			</body>
				</html>
EOT;
    }

    protected function getViewData(): array
    {
        $sql = "SELECT * FROM attack";
        $recordset = $this->database->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
        }
        $data = $recordset->fetch_assoc();
        $recordset->free();

        if ($data){
            return $data;
        }else{
            return array();
        }
    }

    public function __destruct()
    {
        $this->database->close();
    }
}

XssDemoDriver::main();
				