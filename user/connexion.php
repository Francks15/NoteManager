<?php
require "class.php";
$connect = false;
$etudiant = null;
$user = null;
if (isset($_GET['user'])) {
    $user = $_GET['user'];
}

if (!empty($_POST['matricule'])) {
    [$connect, $etudiant] = Etudiant::authentifier($_POST['matricule']);
    if ($connect) {
        setcookie("etudiant", serialize($etudiant));
    }
}
?>
<?php require "header.php" ?>

<?php if (!$connect) : ?>
    <div class="container">
        <div class="d-flex justify-content-center p-5">
            <div class="d-flex flex-column text-center border rounded border-primary px-5">
                <?php if (isset($_GET['user'])) : ?>
                    <h1 class="py-2"><?php echo strtoupper($user) ?></h1>
                    <h2>FORMULAIRE DE CONNEXION</h2>
                    <?php if ($_GET['user'] == "etudiant") : ?>
                        <form action="connexion.php?user=etudiant" method="post">
                            <div>
                                <table class="mx-auto my-5">
                                    <tr>
                                        <td>MATRICULE : </td>
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
                    <?php elseif ($_GET['user'] == "professeur") : ?>
                        <form action="connexion.php?user=professeur" method="post">
                            <div>
                                <table class="mx-auto my-5">
                                    <tr class="text-start">
                                        <td>IDENTIFIANT</td>
                                        <td><input type="text" name="identifiant" id="identifiant" size="7"></td>
                                    </tr>
                                    <tr class="text-start">
                                        <td>CODE </td>
                                        <td><input type="text" name="code"></td>
                                    </tr>
                                </table>
                                <button class="btn btn-primary mb-4">soumettre</button>
                            </div>
                        </form>
                    <?php endif ?>
                <?php else : ?>
                    <p>Vous vous êtes mal pris</p>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <?php require "zone_etudiant.php" ?>
<?php endif ?>

<?php require "footer.php" ?>