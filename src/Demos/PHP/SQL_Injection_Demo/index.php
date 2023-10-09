<!DOCTYPE html>
<html lang="de">
<head>
	<style>
	.left {float: left; width:39%; height:100vh;}
	.flexcontainer {
		width:60%;	
		display: flex;
		flex-wrap:wrap;
		justify-content: flex-start;
	}
	.flexitem {width:98%;}
	
	.flexitembig {height:63vh;}
	.flexitemsmall {height:35vh;}
	
	</style>
    <meta charset="UTF-8"/>

    <title>SQL-Injection-Demo</title>
</head>
<body>
<iframe class="left" src="SQL_Injection_Login.php" title="SQL-Injection"></iframe>
<div class=flexcontainer>
	<!--<iframe class="flexitem" src="SQL_Injection_pdf_Wrapper.html" title="PDF"></iframe>-->
	<iframe class="flexitem flexitemsmall" src="SQL_Injection_Query.php?Safe=1" title="MySQLi Secure"></iframe>
	<iframe class="flexitem flexitembig" src="SQL_Injection_Query.php" title="MySQLi insecure"></iframe>
</div>
</body>
</html>