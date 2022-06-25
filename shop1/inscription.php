<?php
ob_start();
require("config/connexion.php");
require("config/commandes.php");
?>
<body>
	<div align="center" class="album py-5 bg-light" style="text-align: left;">
    <div class="container">
    	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="width: 1000px;">
    	 <div class="col"style="width: 800px; ">
      	<div class="product-center"style="width: 800px;">
        <div class="product-item" style="width: 800px;">
<table style="width: 600px;text-align: center;" height="450px" cellpadding="10" cellpadding="5" >
	<form method="post">
	<div class="col-auto">
		<tr>
		<td><strong>NOM: &nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="nm" style="width: 300px;text-align:center;"  required></td>
	</tr>
	<tr>
		<td><strong>PRENOM:</strong><input type="text" name="pr" style="width: 300px;text-align:center;"  required></td>
	</tr>
	<tr>
		<td><strong>DATE NAISSANCE:</strong>&nbsp;&nbsp;<input type="date" name="date" style="width: 150px;text-align:center;" required>&nbsp;&nbsp;
		<strong>PAYS:</strong>&nbsp;&nbsp;<select name="pay" required>
			   <option>...</option>
			   <option>Maroc</option>
            <option>France</option>
            <option>ZAZA2IR</option>
            <option>MALI</option>
            <option>GHANA</option>
            <option>ZAMBAIE</option>
		</select></td>
	</tr>
	<tr><td><strong>ADRESS &nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="ad" style="width: 300px;text-align:center;"  required></td></tr>
	<tr>
		<td><strong>EMAIL:</strong>&nbsp;<input type="email" name="em" style="width: 160px;"  required>&nbsp;&nbsp;
		<strong>PASSWORD:</strong>&nbsp; <input type="password" name="pass" style="width: 160px;" required></td>
	</tr>
	<tr>
		<td colspan="4" style="text-align:center;"> <input type="submit" name="ok" value="ENREGISTRER" class="btn btn-outline-dark" style="width: 200px;text-align:center;"  required><br><a href="login.php" style="margin: 100;">login?</a> </td>
	</tr></div>
	</form>

<?php 

   if (isset($_POST['ok'])) {
   if (isset($_POST['nm'])) {
   	 $nom=$_POST['nm'];
   }
  if (isset($_POST['pr'])) {
  	$prenom=$_POST['pr'];
  }

  if (isset($_POST['date'])) {
  	 $date=$_POST['date'];
  }
  if (isset($_POST['pay'])) {
    $pays=$_POST['pay'];
      }
   if (isset($_POST['ad'])) {
   	$ads=$_POST['ad'];
   }
   if (isset($_POST['em'])) {
       $em=$_POST['em'];  
        }
   if (isset($_POST['pass'])) {
    $pw=$_POST['pass'];
   }
    $c="SELECT email FROM clients WHERE email='$em'";
  $l=$con->query($c);
  $lo=$l->rowCount($l);
  if ($lo>0) {
           echo '<tr><td style="text-align:center;color: white;background-color: darkred; colspan="4" align="center" >ce client existe deja</td></tr>';
            }
            else{
  ajouterClient($nom,$prenom,$em,$pw,$date,$pays,$ads);
   
  ?>
<tr>
    <td colspan="4" style="text-align:center;color: white; background: green;">WELECOM <?= $nom ?></td>
  </tr>
   <?php
}}
  ?>
  
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<?php
$content=ob_get_clean();
require('template.php');
 ?>
   