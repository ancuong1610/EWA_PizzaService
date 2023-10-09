<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

abstract class Page
{
    protected MySQLi $database;

    protected function __construct()
    {
        // activate full error checking
        error_reporting(E_ALL);

        // open database
        require_once 'pwd.php'; // read account data
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

    protected function generatePageHeader(string $title = ''):void
    {
        $title = htmlspecialchars($title);

        // define MIME type of response (*before* all HTML):
        header("Content-type: text/html; charset=UTF-8");

        // output HTML header
        echo <<<EOT
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8"/>
    <title>$title</title>
	<style type="text/css">
		th, td { background-color:white; padding:3px; }
		table  { background-color:grey; }
	</style>
</head>
<body>

EOT;
    }

    protected function generatePageFooter():void
    {
        echo <<<EOT
</body>
</html>

EOT;
    }

    protected function processReceivedData():void
    {

    }
}
