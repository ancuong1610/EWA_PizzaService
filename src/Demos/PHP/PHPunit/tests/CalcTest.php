<?php /** @noinspection PhpIncludeInspection */

use PHPUnit\Framework\TestCase;

// Zu testende Klasse inkludieren
require "Calc.php";

// Klassendeklaration
class CalcTest extends TestCase
{

    public function testSub()
    {
        $l = 5;
        $r = 3;
        // Ergebnis auf alternativem Weg berechnen
        $erg = $l - $r;
        $obj = new calc ($l, $r);
        $this->assertEquals($erg, $obj->sub());
    }
		/*
        // Auskommentieren um Testcoverage zu demonstrieren
        public function testMul()
        {
            $l = 5;
            $r = 3;
            // Ergebnis auf alternativem Weg berechnen
            $erg = $l * $r;
            $obj = new calc ($l, $r);
            $this->assertEquals($erg, $obj->mul());
        }
		*/
    public function testDiv()
    {
        $l = 1;
        $r = 40;
        // Ergebnis auf alternativem Weg berechnen
        $erg = 0.025;
        $obj = new calc ($l, $r);
        $this->assertEquals($erg, $obj->div());
    }

    public function testDivByZero()
    {
        $l = 5;
        $r = 0;
        // Ergebnis auf alternativem Weg berechnen
        $obj = new calc ($l, $r);
        $this->assertFalse($obj->div(), 'Fehler bei Division durch 0');
    }

    public function testDivByZeroThrowsException()
    {
        $l = 5;
        $r = 0;
        // Ergebnis auf alternativem Weg berechnen
        $obj = new calc ($l, $r);
        try {
            $obj->div(true);
        } catch (DivException $e) {
            $this->assertEquals('Division durch null!', $e->getMessage(), 'Falsche Message in Exception');
            return;
        }
        $this->fail("Keine Exception erzeugt!");
    }

    public function testClassDivException()
    {
        $obj = new DivException;
        $this->assertNotNull($obj);
    }

    // Eigenschaft, in der das Objekt abgelegt wird
    private $calc;

    // setUp-Methode, die vor jedem Test aufgerufen wird
    protected function setUp(): void
    {
        // setUp des Frameworks aufrufen
        parent::setUp();
        // Objekt instantiieren und speichern
        $this->calc = new calc(2, 6);
    }

    // Methode, die nach jedem Test ausgeführt wird
    protected function tearDown(): void
    {
        // "benutztes" Objekt entfernen
        $this->calc = null;
        // tearDown der Elternklasse aufrufen
        parent::tearDown();
    }
}