<?php // UTF-8 marker äöüÄÖÜß€
class XssDemoPdf
{
    protected MySQLi $database;

    protected function __construct()
    {
// activate full error checking
        error_reporting(E_ALL);
        $host = "localhost";
        /********************************************/
// This code switches from the the local installation (XAMPP) to the docker installation
        if (gethostbyname('mariadb') != "mariadb") { // mariadb is known?
            $host = "mariadb";
        }
        $database = "XSS_Demo";
        $user = "public";
        $pwd = "public"; //NOSONAR ignore inline password for demo
// open database
        $this->database = new MySQLi($host, $user, $pwd, $database);
// check connection to database
        if ($this->database->connect_errno) {
            throw new Exception("Connect failed: " . $this->database->connect_errno);
        }
// set character encoding to UTF-8
        if (!$this->database->set_charset("utf8")) {
            throw new Exception("Fehler beim Laden des Zeichensatzes UTF-8: " . $this->database->error);
        }
    }

    public static function main()
    {
        try {
            $page = new XssDemoPdf();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }

    protected function processReceivedData():void
    {
    }

    protected function generateView():void
    {	
        $data = $this->getViewData();

        $NameEscaped="";
        $addressUnmodified="";

        if (count($data)){
            $NameEscaped=$data["NameUnmodified"];
            $addressUnmodified=$data["AddressUnmodified"];
        }

		$Text = "So sieht es aus, wenn man HTMLSpecialChars oder HTMLEntities VOR dem Speichern in die Datenbank aufruft und dann mit diesen Daten z.B. ein PDF-Dokument statt HTML erzeugt!";

		require('../../PHP/fpdf/fpdf.php');

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Helvetica', 'B', 14);
		$pdf->Cell(100, 10, $NameEscaped,0,1,'L');
		
		$pdf->SetFont('Helvetica', 'B', 12);
		$pdf->Cell(100,10, $addressUnmodified,0, 1,'L');
		
		$pdf->SetFont('Helvetica', 'B', 10);	
		$pdf->Cell(100, 20, "",0,1,'L');		
		$pdf->MultiCell(180,8, $Text);
		$pdf->Output();
    }

    protected function getViewData(): array
    {
        $sql = "SELECT * FROM attack";
        $recordset = $this->database->query($sql);
        if (!$recordset) {
            throw new Exception("Abfrage fehlgeschlagen: " . $this->database->error);
        }
        $data = $recordset->fetch_assoc();
        $recordset->free();

        if ($data){
            return $data;
        }else{
            return array();
        }
    }

    public function __destruct()
    {
        $this->database->close();
    }
}

XssDemoPdf::main();
				