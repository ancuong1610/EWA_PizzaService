<?php
/**
 * Demonstrates problems caused by missing isset()
 *
 * @author Ralf Hahn <ralf.hahn@h-da.de>
 */

// UTF-8 marker äöüÄÖÜß€

// MIME-Type der Antwort definieren (*vor* allem HTML):
header("Content-type: text/html; charset=UTF-8");

error_reporting(E_ALL);

echo <<<EOT
<!DOCTYPE html>
<html lang="de">  
  <head>
    <meta charset="UTF-8" />
    <title>isset()-Tests</title>
	<style>
	  * {margin: 0.3em;}
	  div {border: 0.1em solid black;}
	</style>
  </head>
  <body>
  <h1>Demo zur Notwendigkeit von isset()</h1>
  <h2>Die folgenden Fehlermeldungen <em>sollen</em> auftreten!</h2>
  <p>Die Variable \$NotExisting existiert nicht!</p>
EOT;

unset($NotExisting);

//*************************************************************************
echo '<div>';
echo '<pre>';
	echo 'if (!isset($NotExisting)){...} funktioniert';
echo '</pre>';
if (!isset($NotExisting)) {
    echo '<p>So funktioniert es! </p>';
}
echo '</div>';

//*************************************************************************
echo '<div>';
echo '<pre>';
	echo 'if ($NotExisting) {...} wirft eine Warnung...';
echo '</pre>';
if ($NotExisting) {
    echo '<p>Direkter Zugriff auf $NotExisting wirft eine Warnung</p>';
}
echo '<p>führt den Then-Zweig NICHT aus</p>';
echo '<p>...und macht weiter!</p>';
echo '</div>';

//*************************************************************************
echo '<div>';
echo '<pre>';
	echo 'try {
    if ($NotExisting) {...} 
catch (...){...} wirft eine Warnung (auch in Try/Catch)';
echo '</pre>';

try {
    if ($NotExisting) {
        echo '<p>führt den Then-Zweig nicht aus</p>';
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
echo '<p>führt den Then-Zweig NICHT aus</p>';
echo '<p>...und macht weiter!</p>';
echo '</div>';


//*************************************************************************
echo '<div>';
echo '<pre>';
	echo 'if (!$NotExisting) {...} wirft auch einen Fehler';
echo '</pre>';
if (!$NotExisting) {
    echo '<p>...führt den Then-Zweig aus...</p>';
}
echo '<p>...und macht weiter!</p>';
echo '</div>';

//*************************************************************************
echo '<div>';
echo '<pre>';
	echo 'if (@$NotExisting) {...} Mit dem Fehlerkontrolloperator @ vor der Bedingung';
echo '</pre>';
if (@$NotExisting) {
    echo '<p>Then-Zweig wird nicht ausgeführt</p>';
} else {
    echo '<p>wird der Fehler unterdrückt und FALSE geliefert</p>';
}
echo '<p>...und macht weiter!</p>';
echo '</div>';


echo '<p>Die PHP-Ausführung läuft weiter, weil es "nur" Warnungen sind!?</p>';

echo <<<EOT
</body>
</html> 
EOT;
