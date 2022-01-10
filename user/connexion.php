<?php
session_start();
require "class.php";
$connect = false;
$etudiant = null;
$prof = null;
$user = null;
if (isset($_GET['user'])) {
    $user = $_GET['user'];
}

if (!empty($_POST['matricule'])) {
    [$connect, $etudiant] = Etudiant::authentifier($_POST['matricule']);
    if ($connect) {
        $_SESSION['etudiant'] = $etudiant;
        $_SESSION['connect'] = $connect;
    }
}

if (!empty($_POST['identifiant']) and !empty($_POST['code'])) {
    [$connect, $prof] = Professeur::authentifier($_POST);
    if ($connect) {
        $_SESSION['prof'] = $prof;
        $_SESSION['connect'] = $connect;
    }
}

if (!empty($_SESSION["etudiant"]) && $user == "etudiant") {
    header('Location: zone_etudiant.php');
}
if (!empty($_SESSION["prof"]) && $user == "professeur") {
    header('Location: zone_prof.php');
}
?>
<?php require "header.php" ?>

<?php if (!$connect) : ?>
    <div class="container">
        <div class=" d-flex justify-content-center p-sm-5 p-3">
            <div>
                <div class="mb-3 text-center border rounded border-primary px-sm-5 p-3">
                    <?php if (isset($_GET['user'])) : ?>
                        <h1 class="py-2"><?php echo strtoupper($user) ?></h1>
                        <h2>FORMULAIRE DE CONNEXION</h2>
                        <?php if ($_GET['user'] == "etudiant") : ?>
                            <form action="connexion.php?user=etudiant" method="post">
                                <div>
                                    <table class=" table mx-auto my-5">
                                        <tr class=" align-baseline">
                                            <td>MATRICULE : </td>
                                            <td><input class=" form-control" type="text" name="matricule" id="matricule" size="7"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class=" d-flex justify-content-between align-items-start">
                                    <a href="index.php" class=" btn btn-primary">Accueil</a>
                                    <button class="btn btn-primary mb-4">Se Connecter</button>
                                </div>
                            </form>
                        <?php elseif ($_GET['user'] == "professeur") : ?>
                            <form action="connexion.php?user=professeur" method="post">
                                <div>
                                    <table class=" table mx-auto my-5">
                                        <tr class="text-start align-baseline">
                                            <td>IDENTIFIANT</td>
                                            <td><input class=" form-control" type="text" name="identifiant" id="identifiant" size="7"></td>
                                        </tr>
                                        <tr class="text-start align-baseline">
                                            <td>CODE </td>
                                            <td><input class=" form-control" type="password" name="code"></td>
                                        </tr>
                                    </table>
                                    <div class=" d-flex justify-content-between align-items-start">
                                        <a href="index.php" class=" btn btn-primary">Accueil</a>
                                        <button class="btn btn-primary mb-4">Se Connecter</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif ?>
                    <?php else : ?>
                        <p>Vous vous êtes mal pris</p>
                    <?php endif ?>
                </div>

                <?php if ($user == "etudiant") : ?>
                    <?php if (isset($_POST["matricule"]) && !$connect) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Echec Connexion
                        </div>
                    <?php endif ?>
                <?php elseif ($user == "professeur") : ?>
                    <?php if (isset($_POST["identifiant"]) && !$connect) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Echec Connexion
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php elseif ($connect && $etudiant) : ?>
    <?php
    header('Location: zone_etudiant.php');
    exit;
    ?>
<?php elseif ($connect && $prof) : ?>
    <?php header('Location: zone_prof.php');
    exit;
    ?>
<?php endif ?>

<?php require "footer.php" ?>