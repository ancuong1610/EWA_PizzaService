<?php

class DivException extends Exception
{
}

class Calc
{
    private $l; // enthaelt den linken Operanden 
    private $r; // enthaelt den rechten Operanden

    public function __construct($l, $r) // Konstruktor
    {
        $this->l = $l;
        $this->r = $r;
    }

    // gibt das Ergebnis der Subtraktion zurueck
    public function sub()
    { // Hier muesste anstelle eines + ein ... stehen!?
        return $this->l + $this->r;
    }

    // Gibt das Ergebnis der Multiplikation zurueck
    public function mul()
    {
        return $this->l * $this->r;
    }
    // Gibt das Ergebnis der Division zurueck;
    // bei Division durch 0 gibt die Methode false zurueck
    // oder generiert eine Exception
    public function div($throwException = false)
    {
        if (0 == $this->r) {
            if (true === $throwException) {
                throw new DivException('Division durch null!');
            } else {
                return false;
            }
        }
        return $this->l / $this->r;
    }
}