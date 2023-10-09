<!DOCTYPE html>
<html lang="de">
<head>
	<style>
	.left {float: left; width:49%; height:100vh;}
	.flexcontainer {
		width:50%;	
		display: flex;
		flex-wrap:wrap;
		justify-content: flex-start;
	}
	.flexitem {width:98%;height:33vh;}
	
	</style>
    <meta charset="UTF-8"/>

    <title>XSS-Demo</title>
</head>
<body>
<iframe class="left" src="XSS_Demo_Order.php" title="Order"></iframe>
<div class=flexcontainer>
	<iframe class="flexitem" src="XSS_Demo_pdf_Wrapper.html" title="PDF"></iframe>
	<iframe class="flexitem" src="XSS_Demo_Driver.php" title="Driver Secure"></iframe>
	<iframe class="flexitem" src="XSS_Demo_Driver.php?Safe=1" title="Driver Insecure"></iframe>
</div>
</body>
</html>