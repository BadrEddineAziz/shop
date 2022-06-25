<?php
	
	session_start();
	require("config/commandes.php");
	$Produits=afficherProduit();
$flag=0;
	if(isset($_GET["pdt"]) ) {
		$id = $_GET["pdt"];
		$prix=$_GET['prix'];
		if (isset($_GET['qte'])) {
			$qte=$_GET['qte'];
		}
		if (isset($_POST['qte'])) {
		 
		 $qte=$_POST['qte'];
		}
 if(empty($_SESSION['panier'])){
$n=0;
if($flag==0)
{
$_SESSION['panier'][$n]['idp']=$id;
foreach($Produits as $produit){ 
if($produit->idProduit == $id){ 
	$_SESSION['panier'][$n]['libelle']=$produit->libelle;
	}
}
$_SESSION['panier'][$n]['prix']=$prix;
$_SESSION['panier'][$n]['qte']=$qte;
}

}

elseif (isset($_SESSION['panier'])) 
{
$n=count($_SESSION['panier']);
// RECHERCHE SI LE PRODUIT EXISTE DEJA DANS LEPANIER
	
	for($i=0;$i<$n;$i++){
		if($_SESSION['panier'][$i]['idp']==$id)
		{
			$_SESSION['panier'][$i]['qte']+=$qte;
		$flag=1
		;break;
			}}
if ($flag==0){
	$_SESSION['panier'][$n]['idp']=$id;
foreach($Produits as $produit){ 
if($produit->idProduit == $id){ 
	$_SESSION['panier'][$n]['libelle']=$produit->libelle;
	}
$_SESSION['panier'][$n]['prix']=$prix;
$_SESSION['panier'][$n]['qte']=$qte;
}

}

}
}
header('location:ajouterPanier.php');