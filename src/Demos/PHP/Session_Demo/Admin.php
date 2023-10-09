<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
/**
 * Class Admin for the demo of sessions in the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 *
 * PHP Version 7.4
 *
 * @file     Admin.php
 * @author   Ute Trapp, <ute.trapp@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 * @version  3.0
 */

require_once './Page.php';

/**
 * This page should be called with a session and role admin.
 * It shows a list of options for admins and access denied else.
 * @author   Ute Trapp, <ute.trapp@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 */
class Admin extends Page
{
    protected bool $accessAllowed = false;

    /**
     * Instantiates members (to be defined above).
     * Calls the constructor of the parent i.e. page class.
     * So, the database connection is established.
     * @throws Exception
     */
    protected function __construct()
    {
        parent::__construct();

    }

    /**
     * Cleans up whatever is needed.
     * Calls the destructor of the parent i.e. page class.
     * So, the database connection is closed.
     */
    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * Fetch all data that is necessary for later output.
     * Data is returned in an array e.g. as associative array.
     * @return array An array containing the requested data.
     * This may be a normal array, an empty array or an associative array.
     */
    protected function getViewData(): array
    {
        return array();
    }

    /**
     * First the required data is fetched and then the HTML is
     * assembled for output. i.e. the header is generated, the content
     * of the page ("view") is inserted and -if available- the content of
     * all views contained is generated.
     * Finally, the footer is added.
     * @return void
     */
    protected function generateView(): void
    {
        $data = $this->getViewData(); // NOSONAR ignore unused $data
        $this->generatePageHeader('Admin', "", true);
        $this->printSessionDebugInfo();
        if ($this->accessAllowed) {
            echo <<<HERE
                <main>
                <h1>Admin</h1>
                <ul><li>organize users</li></ul>
                <form action="Admin.php" method="post" accept-charset="UTF-8">
                    <input type="submit" value="logout" name="logout"/>
                </form>
                </main>
            HERE;
        } else {
            echo "<p> access denied </p>";
        }
        $this->generatePageFooter();
    }

    /**
     * Processes the data that comes via GET or POST.
     * If this page is supposed to do something with submitted
     * data do it here.
     * @return void
     */
    protected function processReceivedData(): void
    {
        parent::processReceivedData();
        session_start(); //if there is no session, a session will be started
        if (isset($_POST["logout"])) {
            session_destroy();
            // PRG - Pattern - redirect to login
            header("HTTP/1.1 303 See Other");
            header("Location: Login.php");
            die();
        }
        if (isset($_SESSION[self::SESSION_ROLE_KEY]) && $_SESSION[self::SESSION_ROLE_KEY] === self::ROLE_ADMIN){
            $this->accessAllowed = true;
        }
    }

    /**
     * This main-function has the only purpose to create an instance
     * of the class and to get all the things going.
     * I.e. the operations of the class are called to produce
     * the output of the HTML-file.
     * The name "main" is no keyword for php. It is just used to
     * indicate that function as the central starting point.
     * To make it simpler this is a static function. That is you can simply
     * call it without first creating an instance of the class.
     * @return void
     */
    public static function main(): void
    {
        try {
            $page = new Admin();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

// This call is starting the creation of the page. 
// That is input is processed and output is created.
Admin::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >