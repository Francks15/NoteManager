<?php
require_once 'class.php';
if (!isset($_SESSION)) {
    session_start();
}
// if (isset($connect)) {
//     // session_start();
//     $_SESSION['etudiant']= serialize($etudiant);
//     // setcookie("etudiant", serialize($etudiant));
// }
// if (isset($_SESSION["etudiant"])) {
//     $_SESSION["etudiant"] = serialize($etudiant);
// };
if (isset($_POST['deconnecter'])) {
    unset($_SESSION['etudiant']);
}

if (empty($_SESSION["etudiant"])) {
    header('Location: connexion.php?user=etudiant');
}

$etudiant = $_SESSION['etudiant'];
$a = $etudiant->nom;
$b = $etudiant->matricule;


?>

<?php require 'header.php' ?>

<?php if (!empty($_SESSION['etudiant'])) : ?>
    <div class="container mb-4">
        <div class="m-3">
            <form action="zone_etudiant.php" method="post">
                <div class=" d-flex justify-content-around">
                    <a href="index.php" class=" btn btn-primary">Accueil</a>
                    <button type="submit" name="deconnecter" class="btn btn-primary">Deconnexion</button>
                </div>
            </form>
        </div>
        <div class="text-center">
            <h1 class="fst-italic">Vous êtes connecté(e) comme étudiant(e)</h1>
            <h2 class=" fst-italic fw-normal"><?php echo strtoupper($a) ?></h2>
            <h2 class=" fst-italic fw-normal fw-bold text-decoration-underline ">MATRICULE: <?php echo $b ?></h2>
        </div>
        <div class="border border-primary rounded">
            <table class=" table text-center table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Professeur</th>
                        <th>Module</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $reponse = $etudiant->consulterNote();
                    $i = 1;
                    while ($donnes = $reponse->fetch()) :
                    ?>
                        <tr class=" align-baseline">
                            <th><?php echo $i ?></th>
                            <td><?php echo $donnes['title'] ?></td>
                            <td ><?php echo $donnes['module_code'] ?></td>
                            <td ><?php echo $donnes['note'] ?></td>
                            <?php $i++; ?>
                            <td >
                                <?php echo $etudiant->envoyerRequette($donnes['email']) ?>
                            </td>
                        </tr>
                    <?php endwhile;
                    $reponse->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif ?>
<?php require 'footer.php' ?>