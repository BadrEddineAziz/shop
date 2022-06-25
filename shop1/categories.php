<?php
ob_start();
require("config/commandes.php");
$Produits=afficheCatElements();

if(isset($_GET['idC'])){
	$idc = $_GET['idC'];
    ?>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <?php
     foreach($Produits as $produit){
    if($produit->idCategorie == $idc){ ?> 
  <div class="col">
          <div class="" >
            <div class="product-center">
        <div class="product-item">
          <div class="overlay">
            <img src="<?= $produit->photo ?>" class="img-thumbnail">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center" >
        <div><s style="font-weight: bold;color: #FA4805;"><small class="text" style="font-weight: bold;color: #FA4805;"><?= $produit->prixProduit ?>€</small></s></div>

     <div> <?php $prixPromo= $produit->prixProduit-$produit->prixProduit*$produit->promo/100  ?>
      <small class="text" style="font-weight: bold;"><?= $prixPromo ?>€</small></div>
              </div>

            </div>

          </div>
           <ul class="icons">
           <a href="produit.php?pdt=<?= $produit->idProduit ?>&prix=<?= $prixPromo ?>"> <li><i class="bx bx-show" ></i></li></a>
            <a href="panier.php?pdt=<?= $produit->idProduit ?>&prix=<?= $prixPromo ?>&qte=1"> <li><i class="bx bx-cart"></i></li></a>
          </ul>
           </div>
 </div>
 </div>

        </div>
  <?php } ?>


     

<?php

} ?>
 </div>
    </div>
  </div>
  <?php
}
$content=ob_get_clean();
require('template.php');
?>



