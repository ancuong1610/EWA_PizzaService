<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
/**
 * Class Login for the demo of sessions in the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 *
 * PHP Version 7.4
 *
 * @file     PageTemplate.php
 * @author   Ute Trapp, <ute.trapp@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 * @version  3.0
 */

// to do: change name 'PageTemplate' throughout this file
require_once './Page.php';

/**
 * This is a simple login page -- no database access included
 * @author   Ute Trapp, <ute.trapp@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 */
class Login extends Page
{
    const INPUT_FIELD_USER = 'username';
    const INPUT_FIELD_PASSWORD = 'password';
    private bool $providedWrongCredentials = false;

    /**
     * Instantiates members (to be defined above).
     * Calls the constructor of the parent i.e. page class.
     * So, the database connection is established.
     * @throws Exception
     */
    protected function __construct()
    {
        parent::__construct();
        // to do: instantiate members representing substructures/blocks
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
        $this->generatePageHeader('Login - Demo Session');
        $this->printSessionDebugInfo();
        echo <<<HERE
            <main class="login-page">
            <h1>Login</h1>
        HERE;
        $this->generateLoginForm();
        echo "</main>";
        $this->generatePageFooter();
    }

    private function generateLoginForm(): void
    {
        $msg = "";
        if ($this->providedWrongCredentials) {
            $msg = "<p>wrong credentials!</p>";
        }
        $userField = self::INPUT_FIELD_USER;
        $pwdField = self::INPUT_FIELD_PASSWORD;
        //accessiblity and input elements @see https://webaim.org/techniques/forms/advanced
        echo <<<HERE
		$msg
		<form action="Login.php" method="post" class="login-form">
          <input type="text" value="" placeholder="username" name="{$userField}" aria-label="Username" />
          <input type="password" value="" placeholder="password" name="{$pwdField}" aria-label="Password" />
          <input type="submit" value="login" />
        </form>
HERE;
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
        if (isset($_POST[self::INPUT_FIELD_USER]) && isset($_POST[self::INPUT_FIELD_PASSWORD])) {
            $user = $_POST[self::INPUT_FIELD_USER];
            $pwd = $_POST[self::INPUT_FIELD_PASSWORD];
            if ($this->validateCredentials($user, $pwd)) {
                $role = $this->getRole($user);
                if ($role === self::ROLE_ADMIN) {
                    session_start();
                    $_SESSION[self::SESSION_ROLE_KEY] = self::ROLE_ADMIN;
                    //PRG-Pattern
                    header("HTTP/1.1 303 See Other");
                    header("Location: Admin.php");
                    die();
                }
            } else {
                $this->providedWrongCredentials = true;
            }
        }
    }

    private function validateCredentials(string $user, string $pwd): bool //NOSONAR ignore unused parameters
    {
        //@todo execute sql query to validate credentials -- simplified for demo //NOSONAR ignore todo
        return true;
    }

    private function getRole(string $user): string //NOSONAR ignore unused parameter
    {
        //@todo execute sql query to fetch associated role -- simplified for demo //NOSONAR ignore todo
        return self::ROLE_ADMIN;
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
            $page = new Login();
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
Login::main();

// Zend standard does not like closing php-tag!
// PHP doesn't require the closing tag (it is assumed when the file ends). 
// Not specifying the closing ? >  helps to prevent accidents 
// like additional whitespace which will cause session 
// initialization to fail ("headers already sent"). 
//? >