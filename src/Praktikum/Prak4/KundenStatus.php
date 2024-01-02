<?php declare(strict_types=1);
require_once './Page.php';

class Kunde extends Page
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
        $ordering_List = array();
        session_start();
        if ($_SESSION) {
            $last_ordering_id = $_SESSION['last_ordering_id'];
            $sqlCommandToGroupUpOrderingID = "SELECT ordering_id, 
        GROUP_CONCAT(article_id) AS article_ids, GROUP_CONCAT(status) AS status_ids
        FROM ordered_article
        WHERE ordering_id = $last_ordering_id
        GROUP BY ordering_id;";

            $recordSet = $this->database->query($sqlCommandToGroupUpOrderingID);
            if (!$recordSet) {
                throw new Exception("keine Article in der Datenbank");
            }

            while ($record = $recordSet->fetch_assoc()) {
                $get_ordering_id_from_datenbank = $record["ordering_id"];
                $get_article_id_from_datenbank = $record["article_ids"];
                $get_article_status_from_datenbank = $record["status_ids"];

                $ordering_List[] = array(
                    "ordering_id" => $get_ordering_id_from_datenbank,
                    "article_id" => $get_article_id_from_datenbank,
                    "article_status" => $get_article_status_from_datenbank
                );
            }
            $recordSet->free();
        }

        return $ordering_List;
    }

    //Generate JSON File
    protected function generateView():void
    {
            $list = $this->getViewData();
            $jsonString = json_encode($list);
            echo $jsonString;

    }

    protected function processReceivedData():void
    {
        parent::processReceivedData();
    }
    public static function main():void
    {
        try {
            $page = new Kunde();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Kunde::main();