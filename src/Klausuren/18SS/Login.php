<?php

// Diese Klasse muss nicht im Rahmen der Klausur geschrieben werden.
// Sie ist nur ein Provisorium zur Bereitstellung der $_SESSION-Variablen.

require_once 'Page.php';

class Login extends Page
{

    protected function __construct()
    {
        parent::__construct();
        session_start();
    }

    protected function generateView()
    {
        $this->generatePageHeader("Login zur PosterShop");
        header("Location: PosterShop.php");

        echo <<<EOT
			<h1>Provisorische Login-Seite</h1>
			<p>\$_SESSION['kunde']: {$_SESSION['kunde']}</p>
			<p>\$_SESSION['zimmer']: {$_SESSION['zimmer']}</p>

EOT;
        $this->generatePageFooter();
    }

    protected function processReceivedData()
    {
        if (!isset($_SESSION['kunde'])) {
            $_SESSION['kunde'] = 1;
        } else {
            $_SESSION['kunde'] = $_SESSION['kunde'] + 1;
        }
        $_SESSION['zimmer'] = 'Background.jpg';
    }

    public static function main()
    {
        try {
            $page = new Login();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/plain; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Login::main();
