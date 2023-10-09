<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Umgebungsvariablen</title>
</head>
<body>

<pre>
<?php
foreach ($_SERVER as $key => $value) {
    print "$key=$value\n";
}
?>
</pre>

</body>
</html>
