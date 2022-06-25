<?php
ob_start();
require("config/commandes.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="container cart">
<table style="width: 600px;" height="350px" cellpadding="10" cellpadding="5" >
	<tr>
		<th style="width: 100px;text-align: center;">VOTRE COMMANDES EST VALIDE MERCI  VOTRE ACHAT<br><br>
			<a href="index (1).php" ><button style="width: 100px;"class="btn btn-outline-dark" >OK</button></a></th>	

	</tr>
	

	
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
$content=ob_get_clean();
require('template.php');

?>