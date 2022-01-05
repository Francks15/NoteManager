<html>
<head>
<meta charset="utf-8">
<title>liste de notes d'apprenants enregistres</title>
<link rel="stylesheet" type="text/css" href="listenote.css">
<link rel="stylesheet" type="text/css" href="http://winsft.online/decornote.css">
</head>
<body class="show">
<div id="ic">
</div>
<div id="titre">

<div id="histo">
<a href="historique.html"><h1>WINSOFT</h1></a>
</div>
<div id="lon">
<p>situe à 100m de la pharmacie de la grace</p>
</div>
<div id="ima" align="right">
<h4><img src="http://winsft.online/logo\LogoSfomteu.jpg" alt="icon"></h4>
</div>

</div>
<!--menu deroulant-->
<div class="menu1">
<ul id="show">
<li><a href="http://winsft.online/home.html">HOME</li></a>
</ul>
<ul id="redo">
<li><a href="http://winsft.online/administrateur/administrateur.php">Administrateur</a>
<ul>
<li><a href="http://winsft.online/administrateur/inscriptionadmin.php">creer un compte</a>
<li><a href="http://winsft.online/administrateur/gestion.html">Gestion</a>
</li>
</ul>
</ul>
<ul id="bleu">
<li><a href="http://winsft.online/formateur.php">Formateur</a>
<ul>
<li><a href="http://winsft.online/inscriptionformateur.html">Enregistrement</a>
</li>
</ul>
</ul>
<ul id="blu">
<li><a href="http://winsft.online/formation.html">Formation</a>
<ul>
<li><a href="http://winsft.online/typeformation\formtnormal.html">formation-normale</a>
<li><a href="http://winsft.online/typeformation\formatvacance.html">formation-vacance</a>
<li><a href="http://winsft.online/inscriptionelev.html">inscription eleve</a>
</li>
</ul>
</ul>
<ul id="gren">
<li><a href="http://winsft.online/contact.html">Contact</a>
</ul>
<ul id="bow">
<li><a href="http://winsft.online/postformation.html">Post-fomation</a>
<ul>
<li><a href="postvacan.html">Post-vacance</a>
<li><a href="postnorm.html">Post-normale</a>
</div>

<div id="imag1" >
<form method="post" action="#">

<input name="search" id="s" type="text">
<button type="submit" class="searc"><img src="http://winsft.online/logo\search.jpg"   name="seatogo" class="dec"></button>
<img src="http://winsft.online/logo\cone.jpg" alt="icon" class="dec" >
<img src="http://winsft.online/logo\connect.jpg" alt="icon" class="dec s" >


</form>
</div>
<div class="adonm">
<h3>Liste de notes d'apprenants enregistrés</h3>

<?php
//connexion au serveur
$bdd=@mysqli_connect('localhost', 'root','franjo','winsoft');

//affichage d'un message en cas d'erreurs

if(!$bdd){
	echo "<script type=text/javascript";
	echo "alert('connexion impossible a la base $base')</script>";
}
$requete='select*from releverdenote';
$resultat=@mysqli_query($bdd,$requete);
$resultat2=@mysqli_query($bdd,$requete);
if(!$resultat && !$resultat2){
	echo "lecture impossible";
}
else{
	if(isset($_POST['seatogo'])){
	
	$valuesearch=$_POST['search'];
	$requete="SELECT * FROM releverdenote WHERE CONCAT('id_apprenant','matricule','nom') LIKE'%".$valuesearch."%' ";
	
	while($ligne=mysqli_fetch_array($requete)){
		foreach($ligne as $valeur){
			echo"<tr>";
			echo"<td>$valeur</td>";
		}
		echo"</tr>";
	}
	}
	else{
		
	$nbart=mysqli_num_rows($resultat);
	echo "<div class=\"containe\">";
	echo "<h2> la liste de notes d'apprenants enregistres </h2>";
	echo "<h5> Il y a <span>$nbart</span> eleves dans la base de donnees </h5>";
	echo "<table border=\"1\" id=\"tableu\" align=\"center\"><tbody>";
	echo "<tr><th>Nom apprenants</th><th>coefficient</th><th>bureautique</th><th>Pratique secretariat</th><th>edition diaspo</th>
	<th>Francais</th><th>OTC</th><th>INP</th><th>Soutenance</th><th>moyenne</th><th>rang</th><th>Decision</th><th>changer formation</th><th>identifiant Note</th><th>Modifier note</th></tr>";
	
	// search

	echo "</div>";
	
	while($ligne=mysqli_fetch_assoc($resultat)){
		echo "<tr>"; 
		foreach($ligne as $valeur){
			echo "<td> $valeur </td>";
			
			
		}
		
		
		echo "<td> <a href=\"http://winsft.online/administrateur/modif_de_note.php/?ren=".$ligne['id_note']." input type=\"submit\" value=\"modifier\" class=\"mod\">modifier </a></td>";
		echo "<td> <a href=\"http://winsft.online/administrateur/formdelete.php/?ren=".$ligne['id_apprenant']." input type=\"submit\" value=\"modifier\" class=\"mod\">supprimer </a></td>";
		/*$requet2="UPDATE releverdenote SET Nomapprenants='$nomapp' coefficient='$coefficient' bureautique='$bureau' 
		Pratique_secretariat='$Prasecret' editiondiaspo='$edidipo' Francais='$francais' OTC='$otc' Soutenance='$Sout'
		 moyenne='$moyenne' rang='$rang' Decision='$decision' chargerformation='$charform' WHERE id_note='$id_note' ";
		 
		 	$req="DELETE FROM nomtable WHERE pass='valeur'";
		$res= mysql_query($req,$idcon) or die();
		echo "suppression reussie avec succes"
		 */
		echo "</tr>";
		echo "<br>";
	}
	echo "<input type=\"submit\" name=\"imprimer\" value=\"imprimer\" onclick=\"print()\">";
	echo "</tbody></table>";
	}
}
    mysqli_free_result($resultat);
	
	// search
	
?>
</body>
</html>