<?php
header("Content-type: text/html");

$Prak="";
$PrakInfo="";
if (is_dir("Praktikum")) {
    $PrakInfo="<li>Work on your lab exercises in the folder <b>Praktikum</b>.</li>";
    $Prak = "<a class=\"flex-item\" href=\"./Praktikum\">Praktikum</a>";
}

$Exam="";
$ExamInfo="";
if (is_dir("Exam")) {
    $ExamInfo="<li><strong>Use the folder Exam (located in src/Exam) for your solution of the examination. Do not use any other folder!</strong></li>";
    $Exam = "<a class=\"flex-item flex-item--warning\" href=\"./Exam\">Klausur</a>";
}

echo <<<HTML
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EWA Repository</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<header>
    <h1>EWA Repository</h1>
</header>
<main>
    <ul>
        <li>This is the content of the file 'index.php' in the folder <b>'src'</b>!</li>
        <li>For older examinations you may have a look in the <b>Klausuren</b> folder</li>
        <li>Many good examples are located in <b>Demos</b></li>
        <li>Play around in the <b>Playground</b> folder</li>
        $PrakInfo
        <li>Use the <b>Exam_Probe</b> folder for our exam test run</li>
        $ExamInfo
    </ul>
    <h2>Navigation</h2>
    <div class="flex-container">
        <a href="./Demos" class="flex-item">Demos</a>
        <a href="./Klausuren" class="flex-item">Altklausuren</a>
    </div>
    <div class="flex-container">
        $Prak
        <a href="./Playground" class="flex-item">Spielwiese</a>
    </div>
    <div class="flex-container">
        <a href="./Exam_Probe" class="flex-item">Probeklausur</a>
        $Exam
    </div>
</main>
</body>
</html>
HTML;