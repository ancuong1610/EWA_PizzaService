<?php
if (isset($_GET["command"])){
  $command=$_GET["command"];
  //echo "$command\n";

  
  // List of supported commands - mapping to Linux commands
  $whitelist = array();
  
  $whitelist["PHPUnit"]="cd Demos/PHP/PHPunit; phpunit --cache-result-file /tmp/phpunitCache --colors=auto --include-path ./src ./tests CalcTest.php";
  $whitelist["CodeSniffer"]="cd Demos/PHP/Flughafen_Seitenklassen; phpcs --standard=zend Result.php";
  //$whitelist["PHPdoc"]="cd Klausuren/20SS; phpdoc -d . -n --force --title=Klausur_SS20 --cache-folder /tmp/ --sourcecode -t /tmp/generated/phpdoc";
  $whitelist["PHPdoc"]="cd Demos/PHP/Seitenklassen; phpdoc -d . -n --force --title=EWA --cache-folder /tmp/ --sourcecode -t /tmp/generated/phpdoc";
  $whitelist["testdox"]="cd Demos/PHP/PHPunit; phpunit --cache-result-file /tmp/phpunitCache --colors=auto --testdox --include-path ./src ./tests CalcTest.php";
  $whitelist["testdoxHTML"]="cd Demos/PHP/PHPunit; phpunit --cache-result-file /tmp/phpunitCache --testdox-html /tmp/generated/CalcTest.html --include-path ./src ./tests CalcTest.php >/dev/null; cat /tmp/generated/CalcTest.html";
  $whitelist["Coverage"]="cd Demos/PHP/PHPunit; phpunit --cache-result-file /tmp/phpunitCache --coverage-html /tmp/generated/coverage --coverage-filter src --include-path ./src ./tests CalcTest.php";
  
  if (array_key_exists($command,$whitelist)) {
	  $linuxcommand = $whitelist[$command];
	  $linuxcommand = "cd /var/www/html; ".$linuxcommand;
	  $out = shell_exec($linuxcommand);
  } else {
	 $out = "<h1>Sorry, no such command found! Please check whitelist for available commands in shellexec.php<h1>";
  }

insertHTMLHeader();
  echo $out;
insertHTMLFooter();
}

function insertHTMLHeader(){
	if (!isset($_GET["noheader"])){
echo<<<EOT
		<!DOCTYPE html>
		<html lang="de">
		<head>
			<meta charset="UTF-8"/>
			<title>Commands in Docker Container</title>
			<style>
			 * {font: 1em Consolas, monospace; }
			 body { color: green; background-color: black;
			</style>
		</head>
		<body>

		<pre>
EOT;
	}
}

function insertHTMLFooter(){
	if (!isset($_GET["noheader"])){
echo<<<EOT
		</pre>

		</body>
		</html>
EOT;
	}
}