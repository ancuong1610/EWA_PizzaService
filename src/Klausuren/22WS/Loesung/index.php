<?php declare(strict_types=1);

require_once './Page.php';

class Lecture extends Page
{
    /**
     * @throws Exception
     */
    protected function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    /**
	 * @return array
     */
    protected function getViewData():array
    {
        $sql = "SELECT question, answer FROM interaction";

        $recordset = $this->_database->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->_database->error);
        }
        
        $result = array();
        $record = $recordset->fetch_assoc();
        while ($record) {
            $result[] = $record;
            $record = $recordset->fetch_assoc();
        }
    
        $recordset->free();
        return $result;
    }

    /**
	 * @return void
     */
    protected function generateView():void
    {
        $data = $this->getViewData();
        $this->generatePageHeader('HDA_Chatbot');
        echo <<< HTML
            <div class="container">
                <header class="header">
                    <h1>HDA_Chatbot</h1>
                </header>
                <hr>
                <nav class="navigation">
                    <a href="#">Home</a>
                    <a href="#">Impressum</a>
                    <a href="#">Datenschutz</a>
                </nav>
                <hr>
                <section>
                    <h2>Folgendes kann man mich fragen</h2>
                    <ol>
        HTML;

        foreach($data as $item) {
            echo '<li>';
            echo $item['question'];
            echo '</li>';
        }

        echo <<< HTML
                </ol>
            </section>
        HTML;

        echo <<< HTML
                <section>
                    <h2>Chatausgabe</h2>
                    <div id="chatbox" class="chatbox">
                    </div>
                    <div class="flex-container">
                        <input type="text" value="" id="question" placeholder="Meine Frage ..." class="flex-input">
                        <button onclick="requestData()" class="flex-button">Frage abschicken</button>
                    </div>
                </section>
                <hr class="separator">
                <footer class="footer">
                    Copyright © Thomas Hofmann
                </footer>
            </div>
        HTML;

        $this->generatePageFooter();
    }

    /**
	 * @return void
     */
    protected function processReceivedData():void
    {
        parent::processReceivedData();
    }

    /**
	 * @return void
     */
    public static function main():void
    {
        try {
            $page = new Lecture();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

Lecture::main();