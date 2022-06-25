<?php
ob_start();

require("config/commandes.php");

$Produits=afficherProduit();
$Photos=afficherPhotos();
$Descreption=afficherDescriptions();

if(isset($_GET['pdt'])){
    
    if(!empty($_GET['pdt']) OR is_numeric($_GET['pdt']))
    {
        $id = $_GET['pdt'];

    }
}

?>


<body>

    <section class="section product-detail">
      <div class="details container">
        <div class="left image-container">
          <div class="main">
 <?php
foreach($Photos as $pic){ 
    if($pic->idProduit == $id){ 
        if ($pic->mainPhoto == 1) { ?> 
          
           <img src="<?= $pic->photo ?>" style="">

      
    
<?php }}} ?>
          </div>
        </div>
        <div class="right">
          <h1> <?php        
            foreach($Produits as $produit){ 
if($produit->idProduit == $id){ ?> 
    <div class="right">
    <h3 ><?= $produit->libelle ?></h3>
<?php }} ?></h1>
          <div class="price">
            <?php
     foreach($Produits as $produit){ 
if($produit->idProduit == $id){ ?> 
      <div> <?php $prixPromo= $produit->prixProduit-$produit->prixProduit*$produit->promo/100  ?>
      <small class="text" style="font-weight: bold;"><?= $prixPromo ?>€</small></div>
 <?php }}  ?></div>
         
          <form method="post" class="form" action="panier.php?pdt=<?= $id ?>&prix=<?=$prixPromo?>" >
            <input type="number" value="1" name="qte" style="width: 70px;">
            <input type="submit" name="ok" value="VALIDER" class="btn btn-outline-dark" style="width: 100px;">
          </form>
          <h3>Product Detail</h3>
          <p>
            <?php
           foreach($Descreption as $des){ 
    if($des->idProduit == $id){ ?> 
       
            <p><?= $des->item ?> : <?= $des->details ?></p>
        
 <?php }} ?>
          </p>
        </div>
      </div>
    </section>
</body>
</html>
<?php
$content=ob_get_clean();
require('template.php');
?>