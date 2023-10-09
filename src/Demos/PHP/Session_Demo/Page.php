<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
/**
 * Class Page for the exercises of the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 *
 * PHP Version 7.4
 *
 * @file     Page.php
 * @package  Page Templates
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 * @version  3.0
 */

/**
 * This abstract class is a common base class for all
 * HTML-pages to be created.
 * It manages access to the database and provides operations
 * for outputting header and footer of a page.
 * Specific pages have to inherit from that class.
 * Each derived class can use these operations for accessing the database
 * and for creating the generic parts of a HTML-page.
 *
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 */
abstract class Page
{
    // --- ATTRIBUTES ---

    /**
     * Reference to the MySQLi-Database that can be used
     * by all operations of the class or inherited classes.
     */
    protected MySQLi $_database;
    const SESSION_ROLE_KEY = 'role';
    const ROLE_ADMIN = 'admin';

    // --- OPERATIONS ---

    /**
     * Connects to DB and stores
     * the connection in member $_database.
     * Needs name of DB, user, password.
     */
    protected function __construct()
    {
        error_reporting(E_ALL);
        //@todo add database connection // NOSONAR ignore hint for students
        // Attention: never store passwords as plain text in a db, use hashes only!!!
    }

    /**
     * Closes the DB connection and cleans up
     */
    public function __destruct()
    {

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
    <link rel="stylesheet" href="style.css"/>
    $js
    $refresh
</head>
<body>

EOT;
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
     * Processes the data that comes in via GET or POST.
     * If every derived page is supposed to do something common
     * with submitted data do it here.
     * E.g. checking the settings of PHP that
     * influence passing the parameters (e.g. magic_quotes).
     * @return void
     */
    protected function processReceivedData(): void
    {

    }

    protected function printSessionDebugInfo(): void
    {
        $sessionstatus = session_status();
        $sessionid = session_id();
        echo <<<HERE
        <pre>
        **Debug-Infos**
        session_status(): $sessionstatus     (DISABLED = 0, NONE = 1, ACTIVE = 2)
        session_id(): $sessionid
        \$_SESSION:
        HERE;
        if (session_status() === PHP_SESSION_ACTIVE) {
            var_dump($_SESSION);
        }
        echo "</pre>";
    }
} // end of class

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >