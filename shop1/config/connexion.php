<?php

try {
		$con = new PDO('mysql:host=localhost;dbname=shop(1)','root','');

		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
	$e->getMessage();
}
?>
