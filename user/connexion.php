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

<nav class=" navbar sticky-top-md">
    <div class="container px-sm-5 px-3 d-flex">
        <a href="index.php" class=" text-light fw-bold text-decoration-none logo" ><img src="logo2.png" alt="logo" width="30" height="35"> UNIVERSITE UY1</a>
        <div>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav_link" aria-current="page" href="index.php"><i class="bi bi-house-fill" ></i>ACCUEIL</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php if (!$connect) : ?>
    <div class="container my_container">
        <div class=" d-flex justify-content-center p-sm-5 p-3 mt-2">
            <div>
                <div class="mb-3 text-center border rounded border-primary px-sm-3 p-1">
                    <?php if ($user == "etudiant") : ?>
                        <?php if (isset($_POST["matricule"]) && !$connect) : ?>
                            <div class="alert alert-danger text-center p-2 m-2" role="alert">
                                Echec Connexion
                            </div>
                        <?php endif ?>
                    <?php elseif ($user == "professeur") : ?>
                        <?php if (isset($_POST["identifiant"]) && !$connect) : ?>
                            <div class="alert alert-danger text-center p-2 m-2" role="alert">
                                Echec Connexion
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <?php if (isset($_GET['user'])) : ?>
                        <h1 class="py-2 fst-italic "><?php echo strtoupper($user) ?></h1>
                        <h2>FORMULAIRE DE CONNEXION</h2>
                        <hr>
                        <?php if ($_GET['user'] == "etudiant") : ?>
                            <form action="connexion.php?user=etudiant" method="post">
                                <div>
                                    <table class=" table mx-auto my-5 table-hover">
                                        <tr class=" align-baseline">
                                            <td><label for="matricule">MATRICULE</label></td>
                                            <td><input class=" form-control" type="text" placeholder="Entrer le Matricule" name="matricule" id="matricule" size="7" required></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class=" d-flex justify-content-center">
                                    <button class="btn btn-primary mb-4">Se Connecter</button>
                                </div>
                            </form>
                        <?php elseif ($_GET['user'] == "professeur") : ?>
                            <form action="connexion.php?user=professeur" method="post">
                                <div>
                                    <table class=" table mx-auto my-5 table-hover">
                                        <tr class="text-start align-baseline">
                                            <td><label for="identifiant">Email</label></td>
                                            <td><input class=" form-control" type="email" placeholder="Votre email" name="identifiant" id="identifiant" size="7" required></td>
                                        </tr>
                                        <tr class="text-start align-baseline">
                                            <td><label for="password">Code</label></td>
                                            <td><input class=" form-control" id="password" placeholder="Votre code(Mot de passe)" type="password" name="code" required></td>
                                        </tr>
                                    </table>
                                    <div class=" d-flex justify-content-center">
                                        <button class="btn btn-primary mb-4">Se Connecter</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif ?>
                    <?php else : ?>
                        <p>Vous vous êtes mal pris</p>
                    <?php endif ?>
                </div>
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