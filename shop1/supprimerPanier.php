<?php
	session_start();
	if(isset($_GET["pdt"])) {
		$id=$_GET["pdt"];
		if ($_GET['action']=='suppPro') {
		
if (!empty($_SESSION['panier'])) {
	foreach($_SESSION["panier"] as $p =>$pro)
		{
			if($pro['idp'] == $id)
			{
				unset($_SESSION["panier"][$p]);
				$_SESSION["panier"][$p]--;
				$_SESSION['nb']--;
				header('location:ajouterPanier.php');

			}
		}
}

}

}
	elseif ($_GET['action']=="suppPanier") {
		
	
		session_destroy();
		header('location:ajouterPanier.php');
	}
	
		?>