<?php // UTF-8 marker äöüÄÖÜß€

class SqlInjection
{
	protected MySQLi $database;
	protected string $password;
	protected string $email;

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
		<title>SQL-Injection</title>
	  <script>
		function fillInput(no){
			
			let email = Array();
			let password = Array();
		
			email[0] = "hans.mustermann@mail.com";
			password[0] = "123";
			
			email[1] = "hacker@evil.com";
			password[1] = "xxx' OR 1 = 1 -- ' ]";

			email[2] = "JohnDoe@yahoo.com' -- '";
			password[2] = "xxx";


			email[3] = "hacker@evil.com' OR 1 = 1; SELECT COUNT(Id) FROM accounts;--";
			password[3] = "x";

			// email[4] = "colorTest + address";
			// password[4] = "colorTest + address";
			
			document.getElementById("email").value=email[no];
			document.getElementById("email").setAttribute("value",email[no]);

			document.getElementById("password").value=password[no];
			document.getElementById("password").setAttribute("value",password[no]);
		}
	  </script>
	  </head>
	  <body >
		<header><h1>SQL-Injection</h1></header>
		
		<form action="SQL_Injection_Login.php" method="post" accept-charset="UTF-8">
		<fieldset>
		<legend>Login zur Top-Secret-Website</legend>
		<label>Ihre Emailadresse
			<input type="text" name="email" size="70" id="email" required/>
		</label>
		</br>

		<label>Ihr Passwort 
<!--			<input type="password" name="password" size="70" id="password"/> -->
				<input type="text" name="password" id="password" size="70" />
</br>
(normalerweise natürlich als Eingabefeld vom Typ password und mit HTTPS - aber dann sieht man nichts)
		</label>
		</br>
		
			<input type="submit" value="Login"/>
		
		  </form>
		 </fieldset>
		  
		  <fieldset>
	  <legend>Beispiel-Eingaben (anklicken und mit dem Bestellknopf abschicken)</legend>
	  <label>
	  	<input type="button" value="Normale Eingabe" onclick="fillInput(0);" />
		Eine normale Eingabe wie es ein echter Kunde tun würde
	  </label><br/>

	  <label>
		<input type="button" value="Angriff 1" onclick="fillInput(1);" />
		Kann man die Passwort-Abfrage durch Anhängen eines OR-Ausdrucks aushebeln?
	  </label><br/>
	  <label>
		<input type="button" value="Angriff 2" onclick="fillInput(2);" />
		Kann man die Daten einer bekannten Email-Adresse auslesen (ohne Password)?
	  </label><br/>
	  <label>
		<input type="button" value="Angriff 3" onclick="fillInput(3);" />
		Kann man einen beliebigen SQL-Befehl anhängen und ausführen? (Wird von modernen DBs erkannt und verweigert - siehe &quot;Multiquery&quot;)
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
        if (isset($_POST["email"])&& isset($_POST["password"])) {	
						
			$this->email = $_POST["email"];	
            $this->password = $_POST["password"];	
			
			// escape new entries in such a way that it can be stored and restored without changes by the DB
			$EscapedEmail = urlencode($this->email);
			$EscapedPassword = urlencode($this->password);

			//delete all entries from table
			$sql = "DELETE FROM attack;";
			$recordset = $this->database->query($sql);
		    if (!$recordset) {
				throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
			}	

			// insert new entry			
			$sql = "INSERT INTO `attack`(`EscapedEmail`, `EscapedPassword`) VALUES ('$EscapedEmail','$EscapedPassword')";
			$recordset = $this->database->query($sql);		
			if (!$recordset) {
				throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
			}
			
			header("HTTP/1.1 303 See Other");
			header("Location: SQL_Injection_Login.php");
        }
		
    }


    public static function main()
    {
        try {
            $page = new SqlInjection();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

SqlInjection::main();
