<?php declare(strict_types=1);

abstract class Page
{
    protected MySQLi $_database;

    protected function __construct()
    {
        error_reporting(E_ALL);

        $host = "localhost";
        /********************************************/
        // This code switches from the the local installation (XAMPP) to the docker installation 
        if (gethostbyname('mariadb') != "mariadb") { // mariadb is known?
            $host = "mariadb";
        }
        /********************************************/

        $this->_database = new MySQLi($host, "public", "public", "HDA_Chatbot");

        if (mysqli_connect_errno()) {
            throw new Exception("Connect failed: " . mysqli_connect_error());
        }

        // set charset to UTF8!!
        if (!$this->_database->set_charset("utf8")) {
            throw new Exception($this->_database->error);
        }
    }

    public function __destruct()
    {
    }

    /**
     * @param string $title $title is the text to be used as title of the page
     * @param string $jsFile path to a java script file to be included, default is "" i.e. no java script file
     * @param bool $autoreload  true: auto reload the page every 5 s, false: not auto reload
     * @return void
     */
    protected function generatePageHeader(string $title = "", string $jsFile = "", bool $autoreload = false):void
    {
        $title = htmlspecialchars($title);
        header("Content-type: text/html; charset=UTF-8");

        echo <<< HTML
            <!DOCTYPE html>
            <html lang="de">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="request.js"></script>
                <link rel="stylesheet" href="style.css">
                <title>$title</title>
            </head>
            <body>
        HTML;
    }

    /**
	 * @return void
     */
    protected function generatePageFooter():void
    {
        echo <<< HTML
            </body>
            </html>
        HTML;
    }

    /**
	 * @return void
     */
    protected function processReceivedData():void
    {

    }
}