<?php

abstract class Page
{
    protected $db;

    protected function __construct()
    {
        $this->db = new MySQLi("mariadb", "public", "public", "MEISTER"); //NOSONAR ignore hardcoded password
        if ($this->db->connect_errno) {
            throw new Exception("Connect failed: " . $this->db->connect_errno);
        }
        if (!$this->db->set_charset("utf8")) {
            throw new Exception($this->db->error);
        }
    }

    public function __destruct()
    {
        $this->db->close();
    }

    protected function generatePageHeader($headline = "")
    {
        header("Content-type: text/html; charset=UTF-8");
        $headline = htmlspecialchars($headline);
        echo <<<EOT
<!DOCTYPE html>
<html lang="de" >
<head>
<meta charset="UTF-8" />
<title>$headline</title>
<link rel="stylesheet" type="text/css" href="MEISTER.css"/>
	<script type="text/javascript" src="MEISTER.js"></script>
</head>
<body onload="start();">
EOT;
    }

    protected function generatePageFooter()
    {
        echo <<<EOT
	</body>
	</html>
EOT;
    }

    protected function processReceivedData()
    {
    }
} 
