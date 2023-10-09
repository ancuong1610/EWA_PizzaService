<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

require_once './Page.php';

class Exam21 extends Page
{

    protected function __construct()
    {
        parent::__construct();
    }


    public function __destruct()
    {
        parent::__destruct();
    }

    protected function getViewData():array
    {

    }

    protected function generateView():void
    {

    }

    protected function processReceivedData():void
    {
        parent::processReceivedData();

    }

    public static function main():void
    {
        try {
            $page = new Exam21();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}


Exam21::main();

