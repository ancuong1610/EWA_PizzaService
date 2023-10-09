<?php // UTF-8 marker äöüÄÖÜß€
abstract class Page
{
    protected $db = null;

    protected function __construct()
    {
        error_reporting(E_ALL);
        // This code switches from the the local installation (XAMPP) to the docker installation
        // not required in examination
        $host = "localhost";
        if (gethostbyname('mariadb') != "mariadb") {
            $host = "mariadb";
        }

        $this->db = new MySQLi($host, "public", "public", "2020_News"); //NOSONAR ignore hardcoded password

        if ($this->db->connect_errno) {
            throw new Exception("Connect failed: " . $this->db->connect_errno);
        }

        // set charset to UTF8!!
        if (!$this->db->set_charset("utf8")) {
            throw new Exception($this->db->error);
        }
    }

    public function __destruct()
    {
        $this->db->close();
    }

    /**
     * Generates the header section of the page.
     * i.e. starting from the content type up to the body-tag.
     * Takes care that all strings passed from outside
     * are converted to safe HTML by htmlspecialchars.
     *
     * @param $headline $headline is the text to be used as title of the page
     */
    protected function generatePageHeader($headline = "")
    {
        header("Content-type: text/html; charset=UTF-8");
        $headline = htmlspecialchars($headline);

        echo <<<EOT
<!DOCTYPE html>
<html lang="de">  
  <head>
    <meta charset="UTF-8" />
	<title>$headline</title>
    <link rel="stylesheet" type="text/css" href="news.css" />
    <script src="news.js"> </script>
  </head>
EOT;

    }

    /**
     * Outputs the end of the HTML-file i.e. /body etc.
     */
    protected function generatePageFooter()
    {
        echo "</html>";
    }

    /**
     * Processes the data that comes via GET or POST i.e. CGI.
     * If every page is supposed to do something with submitted
     * data do it here. E.g. checking the settings of PHP that
     * influence passing the parameters (e.g. magic_quotes).
     */
    protected function processReceivedData()
    {

    }
} // end of class

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >