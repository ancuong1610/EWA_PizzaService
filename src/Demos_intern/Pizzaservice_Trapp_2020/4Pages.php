<?php declare(strict_types=1);
// UTF-8 marker äöüÄÖÜß€

$Pages = array("Order","Customer","Baker","Driver");

if (isset($_GET["Page"])){
	$Page=(int)($_GET["Page"]);
}else {
	$Page=0;
}

$NextPage = ($Page+1) % count($Pages);
$PreviousPage = ($Page-1+ count($Pages)) % count($Pages);
$Title=$Pages[$Page];


echo <<<EOT

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>$Title</title>
</head>
	<body>
	  <h1>Sorry, Hier gibt es keinen echten Code und Sie müssen die Praktikumsaufgabe selbst lösen! </br>
	  Aber zum Trost gibt es hier Snapshots zum Thema, die man durchblättern kann...</h1>
	  <p>	  
	  	<button onclick="window.location.replace('4Pages.php?Page={$PreviousPage}')">Zurück</button>
		<button onclick="window.location.replace('4Pages.php?Page={$NextPage}')">Weiter</button>
	  </p>
	  <img src="{$Title}.JPG" alt="Snapshot vom Pizzaservice. Sorry, Sie müssen die Praktikumsaufgabe selbst lösen!" onclick="window.location.replace('4Pages.php?Page={$NextPage}')" />
	</body>
</html>
EOT;