<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
/**
 * Class DemoEscape for the demo of htmlspecialchars and real_escape_string of the EWA lecture
 */

class DemoEscape
{
    private string $demotext="";

    protected MySQLi $_database;

    protected function __construct()
    {
        error_reporting(E_ALL);

        $host = "mariadb";
        $this->_database = new MySQLi($host, "public", "public", "SQL_Injection"); //NOSONAR ignore hardcoded password

        if ($this->_database->connect_errno) {
            throw new Exception("Connect failed: " . $this->_database->connect_errno);
        }

        // set charset to UTF8!!
        if (!$this->_database->set_charset("utf8")) {
            throw new Exception($this->_database->error);
        }
    }

    public function __destruct()
    {
        $this->_database->close();
    }

    protected function getViewData():array
    {
        return array();
    }

    protected function generateView():void
    {
        $data = $this->getViewData(); // NOSONAR ignore unused $data
        $this->generatePageHeader('Demo von htmlspecialchars und real_escape_string');
        ($this->demotext === "") ? $this->generateForm() : $this->printFunctionUsage();
        $this->generatePageFooter();
    }


    /**
     * Outputs the end of the HTML-file i.e. </body> etc.
     * @return void
     */
    protected function generatePageFooter(): void
    {
        echo "</body></html>";
    }

    /**
     * Generates the header section of the page.
     * i.e. starting from the content type up to the body-tag.
     * Takes care that all strings passed from outside
     * are converted to safe HTML by htmlspecialchars.
     *
     * @param $title $title is the text to be used as title of the page
     * @return void
     */
    protected function generatePageHeader(string $title = "", string $jsFile = "", bool $autoreload = false): void
    {
        $title = htmlspecialchars($title);
        // define MIME type of response (*before* all HTML):
        header("Content-type: text/html; charset=UTF-8");
        $js = ($jsFile === "") ? "" : "<script src='{$jsFile}'> </script>";
        $refresh = ($autoreload) ? '<meta http-equiv="refresh" content="5" />' : "";
        // output HTML header
        echo <<<EOT
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8"/>
    <title>$title</title>
    $js
    $refresh
</head>
<body>

EOT;
    }

    private function printFunctionUsage():void
    {
        $text = $this->demotext;
        $specialchars = htmlspecialchars($this->demotext);
        $entities = htmlentities($this->demotext);
        $realescape = $this->_database->real_escape_string($this->demotext);

        echo "<h1>Was bewirken eigentlich htmlspecialchars, real_escape_string & Co.?</h1>";

        //Es braucht Klimmzüge, um das ordentlich auszugeben, besser einfach debuggen!?

        $this->print_to_html($text, "Originaltext");

        $this->print_to_html($specialchars, "SpecialChars");

        $this->print_to_html($entities, "HTMLEntities");

        $this->print_to_html($realescape, "RealEscape");

        $this->generateForm();
    }

    private function generateForm():void
    {
        echo <<<FORM
            <form method="get" action="PHP_DemoEscape.php" accept-charset="UTF-8">
                <input type="text" name="demotext" aria-label="Demostring" value="öngstlich mit ; und <script> und ';drop table" size="50" />
                <input type="submit" value="submit" />
            </form>
FORM;

    }

    protected function processReceivedData():void
    {
        if (isset($_GET["demotext"])){
            $this->demotext = $_GET["demotext"];
        }
    }

function print_to_html($data, $context = 'Debug in Console') {
    $text = $context . ": " . $data;
    $text = htmlentities($text);
    $html = "<p>$text</p>";
    echo $html;
}

    public static function main():void
    {
        try {
            $page = new DemoEscape();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

DemoEscape::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends).
// Not specifying the closing ? >  helps to prevent accidents
// like additional whitespace which will cause session
// initialization to fail ("headers already sent").
//? >