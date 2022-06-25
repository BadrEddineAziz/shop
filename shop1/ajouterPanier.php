<?php
ob_start();
	session_start();
	require ("config/connexion.php");
	require("config/commandes.php");
	

$Produits=afficherProduit();
$Photos=afficherPhotos();
	?>
	    <div class="container cart">
	    	<h1>Votre Panier</h1> 
<table cellpadding="10" cellspacing="1" >
<tbody>
<tr>
<td colspan="6" style="text-align:right;"><a href='supprimerPanier.php?action=suppPanier' onclick='return confirm("Vous êtes sûr de vouloir supprimer ce panier")' class="addCart"><input type="button" name="b1" value="VIDER PANIER" class="btn btn-Danger" style="width: 80px; height: 30px; margin: -6;"></a></td>
</tr>
<tr>
<th style="text-align:left;"><strong>Produit</strong></th>
<th style="text-align:left;"><strong>Libelle</strong></th>
<th style="text-align:left;"><strong>Prix</strong></th>
<th style="text-align:left;"><strong>Quantite</strong></th>
<th style="text-align:left;"><strong>Montant</strong></th>
<th style="text-align:right;"><strong>Action</strong></th>
</tr>

<?php
$total = 0;
if (isset($_SESSION["panier"])) {
    
$nb =count($_SESSION["panier"]) ;
						for($i=0; $i<$nb; $i++) {
							if ($_SESSION["panier"][$i]["qte"]!=0) {
								
									foreach($Photos as $pic){ 
                         if($pic->idProduit == $_SESSION["panier"][$i]["idp"]){ 
                          if ($pic->mainPhoto == 1) {
                           foreach($Produits as $produit){ 
                           if($produit->idProduit == $_SESSION["panier"][$i]["idp"]){
                        echo "<tr><td><a href='produit.php?pdt= $produit->idProduit'> <img src=' $pic->photo' style='width:64px;'></a></td>";  
  
                                }}} }}
						    echo "<td>" . $_SESSION["panier"][$i]["libelle"] . "</td>";
							echo "<td>". $_SESSION["panier"][$i]["prix"] . "</td>";
							echo "<td>" . $_SESSION["panier"][$i]["qte"]. "</td>";
							echo "<td>" . $_SESSION["panier"][$i]["qte"]*$_SESSION["panier"][$i]["prix"] . "</td>";
							echo "<td><a href='supprimerPanier.php?pdt={$_SESSION["panier"][$i]["idp"]}&action=suppPro' onclick='return confirm(\"Vous êtes sûr de vouloir supprimer ce produit\")'><i class='bx bx-trash bx-md'></i></a></td>";
							
							echo "</tr>";
							
								}
								
						
							$total+=$_SESSION["panier"][$i]["qte"]*$_SESSION["panier"][$i]["prix"];
							$_SESSION['total']=$total;
						}
                } 
						?>
</tr>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo  $total." "."DH"; ?></td>
</tr>
<tr>
	<td colspan="5" align=right><a href='validerCommande.php' onclick='return confirm("Vous êtes sûr de vouloir valider ce panier")' class="addCart"><input type="button" value="VALIDER" class="btn btn-Success" style="width: 80px; height: 30px; margin: -6;"></a></td>
</tr>
</tbody>
</table>

 
</div>
<?php
$_SESSION['total']=$total;
$content=ob_get_clean();
require('template.php');
?>