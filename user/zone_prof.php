<?php
if (isset($connect)) {
    setcookie("prof", serialize($prof));
}
if (isset($_COOKIE["etudiant"])) {
    $_COOKIE["prof"] = serialize($prof);
};

$prof = unserialize($_COOKIE['prof']);
$a = $prof->nom;

?>

<div class="container">
    <div class=" text-center">
        <h1>Vous êtes connecté(e) en tant que <?php echo $a ?></h1>
    </div>
</div>