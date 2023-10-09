<?php // UTF-8 marker äöüÄÖÜß€

require_once('SqlFormatter.php');

class SqlInjectionQuery
{
    protected MySQLi $database;
		
	protected bool $SafeMode;
	protected string $PageTitle;
	protected string $Email;
	protected string $Password;
	protected string $Query;
	protected string $Onload;

    protected function __construct()
    {
		$this->SafeMode = false;
		
// activate full error checking
        error_reporting(E_ALL);	
		
	$driver = new mysqli_driver();
	$driver->report_mode = MYSQLI_REPORT_ERROR;
		
        $host = "localhost";
        /********************************************/
// This code switches from the the local installation (XAMPP) to the docker installation
        if (gethostbyname('mariadb') != "mariadb") { // mariadb is known?
            $host = "mariadb";
        }
        $database = "SQL_Injection";
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
            $page = new SqlInjectionQuery();
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
			$this->PageTitle="MIT real_escape_string vor der Query";
			$this->Onload ="";
		} else {
			$this->SafeMode = false;
			$this->PageTitle="OHNE real_escape_string vor der Query";
			$this->Onload ="onload=\"document.body.style.border='solid red 1em';\"";
		}
    }

    protected function generateView():void
    {
        $data = $this->getViewData();
		
		$EmailForHTML=htmlentities($this->Email);
		$PasswordForHTML=htmlentities($this->Password);
		$QueryForHTML=SqlFormatter::highlight($this->Query);
		
		if ($this->SafeMode){
			$QueryComment = "<em>MIT</em> real_escape_string auf Parametern";
		} else {
			$QueryComment = "<em>OHNE</em> real_escape_string auf Parametern";
		}
		
echo <<<EOT
	<!DOCTYPE html>
		<html lang="de">
			<head>
				<meta charset="UTF-8" />
				<style>
					img {width:100vw; }
					h1 	{font: 1.2em Arial, sans-serif;}
					pre {white-space: pre-wrap;}
				</style>
				<meta http-equiv="refresh" content="5" />
				<title>SQL-Injection-Demo</title>
			</head>
			<body $this->Onload>
				<header>
					<h1>SQL-Injection-Demo: $this->PageTitle</h1>
				</header>
				
				<article>
					<!--
					<h2>Daten wie sie eingegeben wurden: </h2>
					<p>	Email: {$EmailForHTML}</p>
					<p> Passwort: {$PasswordForHTML}</p>
					-->
					<p> Ausgeführte Query {$QueryComment}: {$QueryForHTML}</p>					
				</article>		
EOT;
		//print_r ($data);
		
		for ($i=0; $i<count($data); $i++){
			//print_r($data[$i]);
			$accountId=$data[$i]["id"];
			$accountEmail=$data[$i]["Email"];
			$accountPassword=$data[$i]["SecretPassword"];
			$accountSecret=$data[$i]["SecretData"];	
			echo "<article>";
			echo "<h2>Daten des Accounts: {$accountId}</h2>";			
			echo "<p>	Email: " . $accountEmail . "</p>";
			echo "<p>	Passwort: " . $accountPassword . "</p>";
			echo "<p>	Geheime Daten: " . $accountSecret . "</p>";
			echo "</article>";
		}
		


echo <<<EOT
			</body>
				</html>
EOT;
    }

    protected function getViewData():array
    {
        $data = array();
		
		// read query from database (escaped in order to make sure that it is not modified)
        $sql = "SELECT * FROM attack";
        $recordset = $this->database->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
        }
        $data = $recordset->fetch_assoc();
		
		if ($data){
			$this->Email=$data["EscapedEmail"];
			$this->Password=$data["EscapedPassword"];
			$this->Email = urldecode($this->Email);
			$this->Password = urldecode($this->Password);
		} else {
			$this->Email = "";
			$this->Password = "";
		}
		$recordset->free();
		
		// 
		if ($this->SafeMode){
			$this->Email=$this->database->real_escape_string($this->Email);
			$this->Password=$this->database->real_escape_string($this->Password);
		}
		
		// now try to access the accounts with the email and passwort given
		$data = array();
		
		//
		
		$sql = "SELECT * FROM accounts WHERE Email = '$this->Email' AND SecretPassword = '$this->Password';";
		
		$this->Query=$sql;
		
		//echo $sql;
		
		try {
			$recordset = $this->database->query($sql);
			if (!$recordset) {
				throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
			}
			
			while ($record=$recordset->fetch_assoc()) {
				$data[] = $record;
			}
			
			$recordset->free();
		}
		catch (Exception $e) {	// typisiert !
			echo 'Caught Exception: ', $e->getMessage(), "\n";	// besser: komplettes HTML
		}
		
		// Continue execution
		return $data;
    }

    public function __destruct()
    {
        $this->database->close();
    }
}

SqlInjectionQuery::main();
				