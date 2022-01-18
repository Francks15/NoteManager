<?php
require_once '../require/class.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['deconnecter'])) {
    unset($_SESSION['etudiant']);
}

if (empty($_SESSION["etudiant"])) {
    header('Location: connexion.php?user=etudiant');
}

$etudiant = $_SESSION['etudiant'];
$a = $etudiant->nom;
$b = $etudiant->matricule;
$title_page="Etudiant UY1"
?>

<?php require_once '../require/header.php' ?>

<?php if (!empty($_SESSION['etudiant'])) : ?>
    <nav class=" navbar navbar-dark navbar-expand-md sticky-md-top">
        <div class="container px-md-5 px-1 d-flex">
            <a href="../../index.php" class=" text-light fw-bold text-decoration-none logo"><img src="../img/logo2.png" alt="logo" width="30" height="35"> UNIVERSITE UY1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbarToggleExternalContent">
                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center ms-auto">
                    <li class="nav-item me-2">
                        <a class="nav_link" aria-current="page" href="../../index.php"><i class="bi bi-house-fill"></i>ACCUEIL</a>
                    </li>
                    <li class=" nav-item">
                        <form action="zone_etudiant.php" method="post">
                            <div>
                                <button type="submit" name="deconnecter" class="btn btn-primary fw-bold"><i class="bi bi-box-arrow-left"></i> Deconnexion</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my_container pb-4">

        <div class="text-center">
            <h1 class="fst-italic pt-2">Vous êtes connecté(e) comme étudiant(e)</h1>
            <hr>
            <h2 class=" fst-italic fw-normal"><?php echo strtoupper($a) ?></h2>
            <h2 class=" fst-italic fw-normal">Filiere: <?php echo $etudiant->filiere ?></h2>
            <h2 class=" fst-italic fw-normal fw-bold text-decoration-underline ">MATRICULE: <?php echo $b ?></h2>
        </div>
        <div class="border border-primary rounded">
            <div class=" table-responsive">
                <table class=" table text-center table-hover table-bordered">
                    <thead class=" table-dark">
                        <tr>
                            <th>#</th>
                            <th>Module</th>
                            <th>CC</th>
                            <th>TP</th>
                            <th>EE</th>
                            <th>TOTAL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $reponse = $etudiant->consulterNote();
                        $i = 1;
                        while ($donnes = $reponse->fetch()) :
                        ?>
                            <tr class=" align-middle">
                                <th><?php echo $i ?></th>
                                <td class=" fw-bold"><?php echo $donnes['module_code'] ?></td>
                                <td><?php echo Cellule::afficheNote($donnes['note_cc']) ?></td>
                                <td>
                                    <?php if ($donnes['tp'] != 0) : ?>
                                        <?php echo Cellule::afficheNote($donnes['note_tp']) ?>
                                    <?php else : ?>
                                        <span class=" fst-italic">
                                            not-Tp
                                        </span>
                                    <?php endif ?>
                                </td>
                                <td><?php echo Cellule::afficheNote($donnes['note_ee']) ?></td>
                                <?php $i++; ?>
                                <td class=" fw-bold">
                                    <?php
                                    $cc = (float) $donnes['note_cc'];
                                    if ($donnes['tp'] != 0) {
                                        $tp = (float) $donnes['note_tp'];
                                    } else {
                                        $tp = 0;
                                    };
                                    $ee = (float) $donnes['note_ee'];
                                    if ($cc < 0 or $tp < 0 or $ee < 0) {
                                        echo 'EL';
                                    } else {
                                        echo round($cc + $tp + $ee, 2);
                                    }
                                    ?>
                                </td>
                                <td>
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
    </div>
<?php endif ?>
<?php require '../require/footer.php' ?>