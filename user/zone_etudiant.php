<?php
if (isset($connect)) {
    setcookie("etudiant", serialize($etudiant));
    var_dump($etudiant);
}
if(isset($_COOKIE["etudiant"])){
    $_COOKIE["etudiant"]=$etudiant;
};
echo "<br/>";
echo "<br/>";
echo "<br/>";
var_dump($etudiant);
$a = $etudiant->nom;
$b = $etudiant->matricule;
echo "<p> Vous êtes conecté(e) en tant que $a Matricule: $b   </p>"
?>

<div>
    <p>connecter</p>
</div>