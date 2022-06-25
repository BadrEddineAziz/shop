<?php
ob_start();
session_start();
require("config/commandes.php");
require("config/connexion.php");
$login=login();
$Produits=afficherProduit();

?>
<div align="center" class="album py-5 bg-light" style="text-align: left;">
    <div class="container">
    	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="width: 1000px;">
    	 <div class="col"style="width: 800px; ">
      	<div class="product-center"style="width: 800px;">
        <div class="product-item" style="width: 800px;">
        	<table style="width: 600px;text-align: center;" height="350px" cellpadding="10" cellpadding="5" >
<form method="post">
<tr>
		<td><strong>EMAIL:</strong>&nbsp;<input type="email" name="em" style="width: 160px;text-align:center;"  required>&nbsp;&nbsp;
		<strong>PASSWORD:</strong>&nbsp; <input type="password" name="pass" style="width: 160px;text-align:center;" required></td>
	</tr>
	<tr>
		<td colspan="4" style="text-align:center;"> <input type="submit" name="ok" value="CONNECTER" class="btn btn-outline-dark" style="width: 200px;text-align:center;"  required><br><a href="inscription.php" style="margin: 100;">inscrire?</a> </td>
	</tr>
	</form>
	<?php 
	if (isset($_POST['ok'])) {
	if (isset($_POST['em'])) {
       $em=$_POST['em'];  
        }
   if (isset($_POST['pass'])) {
    $pw=$_POST['pass'];
   }
   foreach ($login as $client) {
   	if ($client->email==$em and $client->password==$pw ) {
   		if (isset($_SESSION["panier"])) {
   			$nb =count($_SESSION["panier"]) ;
						for($i=0; $i<$nb; $i++) { 
							 $date=date("y.m.d");
							 $client=$client->idClient;
                             validerCommandes($date,$client);
                             $c="SELECT * FROM commandes";
                             $l=$con->query($c);
                              while ($row = $l->fetch()) {
                                     $com=$row['idCommande'];
                              }
                              foreach ($Produits as $p) {
                              	$pro=$p->idProduit;
                              }
							 $prix=$_SESSION["panier"][$i]["prix"]; 
							 $qte=$_SESSION["panier"][$i]["qte"];
							lignComaande($qte,$prix,$pro,$com);
							session_destroy();
							header("location:msg.php");
							
						}
   			
   		}
   		else{
   			echo ' <tr><td style="text-align:center;color: white;background-color: darkred"; colspan="4" align="center" >le panier est vide</td></tr> ';
   			break;
   		}
   	}
   	elseif ($client->email!=$em or $client->password!=$pw ){
   		 ?>
   		  <tr><td style="text-align:center;color: white;background-color: darkred"; colspan="4" align="center" >Email ou mot de pass incorrecte</td></tr> 
   		  <?php
   		  break;
   	}
   }
   } 
?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
$content=ob_get_clean();
require('template.php');

?>