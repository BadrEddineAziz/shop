
<?php
function afficher()
{
	if(require("connexion.php"))
	{
		$req=$con->prepare("SELECT * FROM produits NATURAL JOIN photos WHERE promo>0 and mainPhoto=1 ORDER BY promo DESC ");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function afficherProduit()
{
	if(require("connexion.php"))
	{
		$result=$con->prepare("SELECT * FROM produits  ");

        $result->execute();

        $data = $result->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();

	}
}
function afficherPhotos()
{
	if(require("connexion.php"))
	{
		$result=$con->prepare("SELECT * FROM  photos ");

        $result->execute();

        $data = $result->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();

	}
}
function afficherDescriptions()
{
	if(require("connexion.php"))
	{
		$result=$con->prepare("SELECT * FROM  descriptions ");

        $result->execute();

        $data = $result->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();

	}
}


function afficheCat()
{
	if(require("connexion.php"))
	{
		$result=$con->prepare("SELECT * FROM  categories ");

        $result->execute();

        $data = $result->fetchAll(PDO::FETCH_OBJ);

        return $data;
        
        $req->closeCursor();
       
	}
}

function afficheCatElements()
{
	if(require("connexion.php"))
	{
		$result=$con->prepare("SELECT * FROM produits NATURAL JOIN photos WHERE mainPhoto=1 ORDER BY promo DESC ");

        $result->execute();

        $data = $result->fetchAll(PDO::FETCH_OBJ);

        return $data;
        
        $req->closeCursor();
       
	}
}
function ajouterClient($nom,$prenom,$em,$pw,$date,$pays,$ads)
{
	if(require("connexion.php"))
	{
  
  	
  $sql = "INSERT INTO clients VALUES (NULL,'$nom', '$prenom','$em','$pw','$date','$pays','$ads')";
   $re= $con->exec($sql);
   return $re;
 $req->closeCursor();

       
	}
}
function login()
{
	if(require("connexion.php"))
	{
		$result=$con->prepare("SELECT * FROM clients");

        $result->execute();

        $data = $result->fetchAll(PDO::FETCH_OBJ);

        return $data;
        
        $req->closeCursor();
       
	}
}
function validerCommandes($date,$client)
{
	if(require("connexion.php"))
	{
  
  	
  $sql = "INSERT INTO commandes VALUES (NULL,'$date',0,0,'$client')";
   $re= $con->exec($sql);
   return $re;
 $req->closeCursor();

       
	}
}
function lignComaande($qte,$prix,$pro,$com)
{
	if(require("connexion.php"))
	{
  
  	
  $sql = "INSERT INTO lignescommande VALUES (NULL,'$qte','$prix','$pro','$com')";
   $re= $con->exec($sql);
   return $re;
 $req->closeCursor();

       
	}
}
?>
