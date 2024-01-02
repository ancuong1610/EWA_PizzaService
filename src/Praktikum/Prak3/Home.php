<?php declare(strict_types=1);

require_once './Page.php';

class Home extends Page
{
    protected function __construct()
    {
        parent::__construct();
    }
    public function __destruct()
    {
        parent::__destruct();
    }
    protected function getViewData(): array
    {
        $data = array();
        return $data;   
    }
    
    protected function generateView(): void
    {
        $data = $this->getViewData();

        $sec = "10";
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $sec; url=$page");

        $this->generatePageHeader('Home');

        echo <<<HERE
        <div class="navbar">
        <div class="brand">EWA</div>
        <nav>
          <a href="Home.php" class="nav-link">Home</a>
          <a href="Bestellung.php" class="nav-link">Menu</a>
          <a href="Kunde.php" class="nav-link">Customer</a>
          <a href="Fahrer.php" class="nav-link">Driver</a>
          <a href="Baecker.php" class="nav-link">Baker</a>
        </nav>
      </div>

        <div class="content">
    HERE;
    echo <<< HERE
        <style>
            h1 {
                font-family: Rubik Doodle Shadow; 
                font-size: 90px; 
                text-align: left; 
                position: fixed;
                top: 37%;
                transform: translateY(-40%);
                left: 90px; 
            }
            h2{
                font-family: Rubik Doodle Shadow; 
                font-size: 60px; 
                text-align: left; 
                position: fixed;
                top: 47%;
                transform: translateY(-40%);
                left: 90px; 
            }
        </style>
        <h1> BEST PIZZA </h1>
        <h2> IN TOWN </h2>
    HERE;


        $this->generatePageFooter();
    }


    public static function main(): void
    {
        try {
            $page = new Home();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Home::main();