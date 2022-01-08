<?php
require "class.php";
$connect = false;
$etudiant = null;

if (!empty($_POST['matricule'])) {
    [$connect, $etudiant] = Etudiant::authentifier($_POST['matricule']);
    if (empty($_COOKIE["etudiant"]) && $connect) {
        setcookie("etudiant", serialize($etudiant));
    }
    if (!empty($_COOKIE["etudiant"] && $etudiant)) {
        setcookie("etudiant", serialize($etudiant));
        $user = $_COOKIE["etudiant"];
    }
}
?>
<?php require "header.php" ?>

<?php if (!$connect) : ?>
    <div class="container">
        <div class="d-flex justify-content-center p-5">
            <div class="d-flex flex-column text-center border border-primary px-5">
                <h1 class="py-2">ETUDIANT</h1>
                <h2>FORMULAIRE D'ENREGISTREMENT</h2>
                <form action="index.php" method="post">
                    <div>
                        <table class="mx-auto my-5">
                            <tr>
                                <td>MATRICULE: </td>
                                <td><input type="text" name="matricule" id="matricule" size="7"></td>
                            </tr>
                        </table>
                    </div>
                    <button class="btn btn-primary mb-4">soumettre</button>
                    <?php if (isset($_POST["matricule"]) && !$connect) : ?>
                        <div class="alert alert-danger" role="alert">
                            Echec Connexion
                        </div>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
<?php else : ?>
    <?php require "zone_etudiant.php" ?>
<?php endif ?>

<?php require "footer.php" ?>