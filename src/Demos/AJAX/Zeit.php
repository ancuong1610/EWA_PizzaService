<?php
sleep(3);

header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 01 Jul 2000 06:00:00 GMT"); // Datum in der Vergangenheit
header("Cache-Control: post-check=0, pre-check=0", false); // fuer IE
header("Pragma: no-cache");
session_cache_limiter('nocache'); // VOR session_start()!
session_cache_expire(0);

echo date("d.m.Y H:i:s");