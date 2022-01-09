<?php
if (isset($connect)) {
    setcookie("etudiant", serialize($etudiant));
}
if (isset($_COOKIE["etudiant"])) {
    $_COOKIE["etudiant"] = serialize($etudiant);
};

$etudiant = unserialize($_COOKIE['etudiant']);
$a = $etudiant->nom;
$b = $etudiant->matricule;
echo "<p> Vous êtes conecté(e) en tant que $a Matricule: $b   </p>"
?>

<div class="container">
    <div class="text-center">
        <h1 class="fst-italic">SALUT</h1>
        <h2 class=" fst-italic fw-normal"><?php echo $a ?></h2>
        <h2 class=" fst-italic fw-normal">MATRICULE: <?php echo $b ?></h2>
    </div>
</div>