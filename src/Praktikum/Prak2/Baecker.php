<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€
/**
 * Class PageTemplate for the exercises of the EWA lecture
 * Demonstrates use of PHP including class and OO.
 * Implements Zend coding standards.
 * Generate documentation with Doxygen or phpdoc
 *
 * PHP Version 7.4
 *
 * @file     PageTemplate.php
 * @package  Page Templates
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 * @version  3.1
 */

// to do: change name 'PageTemplate' throughout this file
require_once './Page.php';

/**
 * This is a template for top level classes, which represent
 * a complete web page and which are called directly by the user.
 * Usually there will only be a single instance of such a class.
 * The name of the template is supposed
 * to be replaced by the name of the specific HTML page e.g. baker.
 * The order of methods might correspond to the order of thinking
 * during implementation.
 * @author   Bernhard Kreling, <bernhard.kreling@h-da.de>
 * @author   Ralf Hahn, <ralf.hahn@h-da.de>
 */
class Baecker extends Page
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
        $sqlRequestCommand = "SELECT* FROM ordered_article";
        $recordSet = $this->database->query($sqlRequestCommand);
        if (!$recordSet) {
            throw new Exception("kein ordered_article table in der Datenbank");
        }
        $bestellung = array();

        // Benoetigte Eintraege für HTML-Ausgabe auslesen
        while ($record= $recordSet->fetch_assoc()) {
            $my_ordered_article_id = $record["ordered_article_id"];
            $my_ordering_id = $record["ordering_id"];
            $my_article_id = $record["article_id"];
            $my_status = $record["status"];

            //assign each row to an element of $bestellung array
            $bestellung[] = array(
                "ordered_article_id" => $my_ordered_article_id,
                "ordering_id" => $my_ordering_id,
                "article_id" => $my_article_id,
                "status" => $my_status
            );
        }

        $recordSet->free();

        return $bestellung;
    }
    protected function generateView():void
    {
        $sec = "10";
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: $sec; url = $page");
        $this->generatePageHeader('Bäcker');
        $bestellung = $this->getViewData();
        echo <<<HERE
        <h1>Bestellte Pizzen</h1>
HERE;

        if (!$bestellung) {
            echo "Keine Bestellungen!";
        }
        else {
            echo <<<HERE
        <form action="Baecker.php" id="BackerInfos" method="post" accept-charset="UTF-8">
        <table>
            <tr>
                <th></th>
                <th>bestellt</th>
                <th>im Ofen</th>
                <th>fertig</th>
            </tr>
HERE;

            foreach ($bestellung as $row_bestellung) {
                
                $idBestellt="bestellt" . "$row_bestellung[ordered_article_id]";
                $idOfen="ofen" . "$row_bestellung[ordered_article_id]";
                $idFertig="fertig" . "$row_bestellung[ordered_article_id]";

                $checkstatusarray = array(0 => "", 1 => "", 2 => "", 3=>"");

                if($row_bestellung['status'] == "0"){
                    $checkstatusarray[0] = "checked";
                }
                elseif ($row_bestellung['status'] == "1"){
                    $checkstatusarray[1] = "checked";
                }
                elseif ($row_bestellung['status'] == "2") {
                    $checkstatusarray[2] = "checked";
                }
                else{
                    $checkstatusarray[3] = "checked";
                }

                $article_array = array(1=>"Salami", 2=>"Vegeteria", 3=>"Spinat-Hünchen");

                if($row_bestellung['status'] == "3" || $row_bestellung['status'] == "4")
                {
                    continue;
                }

                echo <<<EOT
        <tr>
            <td>{$article_array[$row_bestellung['article_id']]} : Ordering ID: {$row_bestellung['ordering_id']} </td>
            <td><label> <input type="radio" id="$idBestellt" name="$row_bestellung[ordered_article_id]" value="bestellt" $checkstatusarray[0]></label></td>
            <td><label> <input type="radio" id="$idOfen" name="$row_bestellung[ordered_article_id]" value="im Ofen" $checkstatusarray[1]></label></td>
            <td><label> <input type="radio" id="$idFertig" name="$row_bestellung[ordered_article_id]" value="fertig" $checkstatusarray[2]></label></td>
        </tr>       
    EOT;
            };
            echo <<<EOT
            </table>
            <input type="submit" id="submit" value="Bestätigen">
            </form>
EOT;
        }


            $this->generatePageFooter();
    }

    protected function processReceivedData():void
    {
        parent::processReceivedData();
        $array = $this->getViewData();
        if (count($_POST)!=0) {
            if (isset($_POST[$array[0]["ordered_article_id"]])) {
                foreach ($array as  $article) {
                    $article_id = $article["ordered_article_id"];
                    $update_status_name = $_POST[$article_id];
                    switch ($update_status_name) {
                        case "bestellt":
                            $update_status_id = 0;
                            break;
                        case "im Ofen":
                            $update_status_id = 1;
                            break;
                        case "fertig":
                            $update_status_id = 2;
                            break;
                        case "unterwegs":
                            $update_status_id = 3;
                            break;
                    }
                    $sqlUpdateCommand = "UPDATE ordered_article SET status = $update_status_id WHERE ordered_article_id = $article_id";
                    $this->database->query($sqlUpdateCommand);
                }
            }
        }

    }

    public static function main():void
    {
        try {
            $pageBaecker = new Baecker();
            $pageBaecker->processReceivedData();
            $pageBaecker->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Baecker::main();