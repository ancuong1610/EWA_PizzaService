<?php
// MIME-Type der Antwort definieren (*vor* allem HTML):
header("Content-type: text/html");
// alle möglichen Fehlermeldungen aktivieren:
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Formular Echo</title>
</head>
<body>
<h2>Formular Echo</h2>
<h3>Namentlich bekannte Elemente aus dem Formular</h3>
<?php

//phpinfo();

// Variante 1 (unsicher):
echo "<h4>unsicher via register_globals</h4>";
// wenn der Name eines Formularelements bekannt ist, 
// kann man direkt darauf zugreifen.
// PHP legt eine gleichnamige Variable an wenn 
// "register_globals = On" in php.ini gesetzt ist.
// Sicherheitsrisiko durch Umsetzung eines 
// evtl. fehlerhaften Elementnamens in eine Variable.
echo "<pre>";
if (isset($Anwendername)) {    // prüft, ob die Variable existiert
    echo "Anwendername=$Anwendername\n";
}
if (isset($KommentarText)) {
    echo "KommentarText=$KommentarText\n";
}
echo "</pre>";


// Variante 2 (sicher mit "register_globals = Off"):
echo "<h4>sicher via assoziative Arrays</h4>";
// die assoziativen Arrays $_GET bzw. $_POST werden von PHP 
// mit Namen und Werten aller Formularelemente gefüllt.
// Man kann direkt darauf zugreifen oder sie auch
// mit foreach abarbeiten:

foreach ($_GET as $key => $value) {
    if (!is_array($value)) {
        echo "$key=$value\n";
    } else {
        print "$key";
        print ": ";
        print_r($value);
    }
}
echo "<h4>Ende der Ausgabe über assoziative Arrays</h4>";
echo "<pre>";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $Params = $_GET;
    echo "(mit GET übermittelt)\n";
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Params = $_POST;
    echo "(mit POST übermittelt)\n";
}
if (isset($Params["Anwendername"])) {
    echo "Anwendername=" . $Params["Anwendername"] . "\n";
}
if (isset($Params["KommentarText"])) {
    echo "KommentarText=" . $Params["KommentarText"] . "\n";
}
echo "</pre>";
?>
<h3>Alle Elemente aus dem Formular</h3>
<pre>
<?php
foreach ($Params as $key => $value) {
    if (!is_array($value)) {
        echo "$key=$value\n";
    } else {
        print_r($Params);
    }
}

?>
		</pre>
</body>
</html>
