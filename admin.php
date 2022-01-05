<?php
if(!empty($_POST['nomadm']) && !empty($_POST['password']) && !empty($_POST['ident']) && !empty($_POST['email'])
	&& !empty($_POST['reference']) && !empty($_POST['date'])){
	    $nom=$_POST['nomadm'][0];
		$prenom=$_POST['nomadm'][1];
		$cny=$_POST['nomadm'][2];
		$number=$_POST['nomadm'][3];
		$password=$_POST['password'][0];
		$password=$_POST['password'][1];
		$ident=$_POST['ident'];
		$email=$_POST['email'];
		$reference=$_POST['reference'];
		$date=$_POST['date'];
		
			//Connexion au serveur & base e donnee
		$idcon=@mysqli_connect("localhost","root","franjo","winsoft") or die ('PROBLEME DE connexion');
		
		if($password[0]==$password[1]){
		$requete="INSERT INTO admistrateur values(NULL,'$nom','$prenom','$cny','$number','$password','$ident','$email','$reference','$date')";

		$result=@mysqli_query($idcon,$requete);
			if (!$result) {
				echo"<h2> Erreur d'insertion \n n°",mysqli_errno($idcon),":",mysqli_error($idcon)."</h2>";
			} 
			else {
				echo"you id number is".$idcon->insert_id;
                
		}  
			$idcon->close();
		}
		
		else{
			echo "<script language=\"JScript\">";
			echo "alert('veiller inserer le meme mot de passe')";
			echo "</script>";
		}
	}
	?>