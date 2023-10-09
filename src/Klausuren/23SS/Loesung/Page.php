<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

abstract class Page
{
    /**
     * Reference to the MySQLi-Database that can be used
     * by all operations of the class or inherited classes.
     */
    protected MySQLi $database;

    /**
     * Connects to DB and stores the connection in member $database.
     * Needs name of DB, user, password.
     */
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

        $this->database = new MySQLi($host, "public", "public", "2023_NewsletterOPI"); //NOSONAR ignore hardcoded password

        if ($this->database->connect_errno) {
            throw new Exception("Connect failed: " . $this->database->connect_errno);
        }

        // set charset to UTF8!!
        if (!$this->database->set_charset("utf8")) {
            throw new Exception($this->database->error);
        }
    }

    /**
     * Closes the DB connection and cleans up
     */
    public function __destruct()
    {
        $this->database->close();
    }


    protected function processReceivedData():void
    {

    }
} // end of class

//? >
