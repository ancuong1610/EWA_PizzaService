<?php
$myString = "ääääh?";
echo "Text: $myString<br>";
echo "strlen: " . strlen($myString) . "<br>";
echo "mb_strlen: " . mb_strlen($myString, 'utf8');