<?php
header("Content-type: text/html");
$title = "Hello World";
?>
<!DOCTYPE html>
<html lang="de">
<?php
echo <<<EOT
<!-- Hier steht der ganz normale HTML-Code -->
<head>
  <meta charset="UTF-8" />
  <title>$title</title>
</head>
EOT;
?>
<body>
<?php
for ($i = 0; $i < 5; $i++) {
    echo "<p>" . $i . "-ter Absatz </p>\n";
}
?>
</body>
</html>
