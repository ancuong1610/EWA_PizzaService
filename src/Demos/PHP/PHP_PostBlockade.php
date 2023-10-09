<?php // UTF-8 marker äöüÄÖÜß€

class PostDemo
{
    private $POST_data="<p>Auswahl:</p>";
    
    protected function generateView()
    {
        echo<<<EOT
	<!DOCTYPE html>
	<html lang="de">  
	  <head>
		<meta charset="UTF-8" />
		<title>Post-Probleme</title>
	  </head>
	  <body >
	  	<p>Schicken Sie das Formular (mit POST) über einen Radiobutton ab und laden Sie die Seite neu, 
		um das Problem zu sehen!"</p>
		<header><h1>Bäcker*in</h1></header>		
		  <form method="post" accept-charset="UTF-8" action="PHP_PostBlockade.php" id="form45">
			<fieldset>
				<legend>Bestellung 17 - Pizza Spinat-Hühnchen</legend>
				<label><span class="labelradio">bestellt</span><input type="radio" name="pizza45" value="0"  
				  onclick="document.forms['form45'].submit();" /></label>
				<label><span class="labelradio">im Ofen</span><input type="radio" name="pizza45" value="1" 
				  onclick="document.forms['form45'].submit();" /></label>
				<label><span class="labelradio">fertig</span><input type="radio" name="pizza45" value="2" 
				  onclick="document.forms['form45'].submit();"  /></label>
				$this->POST_data
			</fieldset>

		<h2>Lesenswert:</h2>
<a href="https://www.theserverside.com/news/1365146/Redirect-After-Post">Redirect after POST</a></br>
<a href="https://en.wikipedia.org/wiki/Post/Redirect/Get">Post/Redirect/Get</a>
</body></html>
EOT;
    }

    protected function processReceivedData()
    {
        if (isset($_POST["pizza45"])) {
            $this->POST_data = "<p>Auswahl: ".$_POST["pizza45"]."! POST-Daten empfangen!</p>";
        }
    }


    public static function main()
    {
        try {
            $page = new PostDemo();
            $page->processReceivedData();
            $page->generateView();
        } catch (Exception $e) {
            //header("Content-type: text/plain; charset=UTF-8");
            header("Content-type: text/html; charset=UTF-8");
            echo $e->getMessage();
        }
    }
}

PostDemo::main();
