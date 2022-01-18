<?php
require_once '../require/class.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['deconnecter'])) {
    unset($_SESSION['prof']);
}

if (empty($_SESSION["prof"])) {
    header('Location: connexion.php?user=professeur');
}

$prof = $_SESSION['prof'];
$a = $prof->nom;
$title_page = "Professeur UY1";


?>

<?php require_once '../require/header.php' ?>

<nav class=" navbar navbar-dark navbar-expand-md sticky-md-top">
    <div class="container px-md-5 px-1 d-flex">
        <a href="../../index.php" class=" text-light fw-bold text-decoration-none logo"><img src="../img/logo2.png" alt="logo" width="30" height="35"> UNIVERSITE UY1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarToggleExternalContent">
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-center ms-auto">
                <li class="nav-item me-2">
                    <a class="nav_link" aria-current="page" href="../../index.php"> <i class="bi bi-house-fill"></i>ACCUEIL</a>
                </li>
                <li class=" nav-item">
                    <form action="zone_prof.php" method="post">
                        <div>
                            <button type="submit" name="deconnecter" class="btn btn-primary fw-bold"><i class="bi bi-box-arrow-left"></i> Deconnexion</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php if (!empty($_SESSION['prof']) && empty($_GET['filiere'])) : ?>
    <div class="container pb-4 my_container ">
        <div class=" text-center">
            <h1 class=" fst-italic">Vous êtes connecté(e) comme enseignant(e)</h1>
            <hr>
            <h2 class=" fw-normal"><?php echo $a ?></h2>
            <div class=" d-flex justify-content-center">
                <div class=" border border-primary rounded p-3">
                    <h2 class=" fst-italic">Filière(s) d'enseignement</h2>
                    <hr>
                    <?php
                    $modules = $prof->module;
                    foreach ($modules as $module) :
                    ?>
                        <form action=<?php $val = $module->filiere;
                                        echo 'zone_prof.php?filiere=' . $val; ?> method="get">
                            <input type="text" name="filiere" class=" d-none" value="<?php echo $val ?>">
                            <table class=" table align-baseline table-hover">
                                <tr>
                                    <td><?php echo $val ?></td>
                                    <td><button type="submit" class=" btn btn-warning">Selectionner</button></td>
                                </tr>
                            </table>
                        </form>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (!empty($_GET['filiere']) && !empty($_SESSION['prof']) && empty($_GET['module'])) : ?>
    <?php
    $trouve = false;
    foreach ($prof->module as $module) {
        if ($module->filiere == $_GET['filiere']) {
            $trouve = true;
            $filiere = $_GET['filiere'];
            break;
        }
    }
    if ($trouve) :
    ?>
        <div class="container pb-4 my_container ">
            <div class=" text-center">
                <h1 class=" fst-italic">Vous êtes connecté(e) comme enseignant(e)</h1>
                <hr>
                <h2 class=" fw-normal"><?php echo $a ?></h2>
                <a href="zone_prof.php" class="btn btn-danger text-light mb-3 fw-bold" title="Voir vos filières d'enseignement"> <i class="bi bi-arrow-bar-left"></i> Retour</a>
                <div class=" border rounded border-primary">
                    <h2 class=" fst-italic">Filiere: <?php echo $filiere ?></h2>
                    <h2 class=" text-decoration-underline ">Unité d'enseignement</h2>
                    <hr>
                    <div class=" table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class=" table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Institulé</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $modules = $prof->module;
                                $i = 1;
                                foreach ($modules as $module) :
                                    if ($module->filiere == $filiere) :
                                ?>
                                        <?php $code_mod = $module->code ?>
                                        <tr class=" align-baseline">
                                            <th><?php echo $i ?></th>
                                            <td><?php echo $code_mod ?></td>
                                            <td><?php echo strtoupper($module->nom) ?></td>
                                            <td>
                                                <a href=<?php echo "zone_prof.php?filiere=$filiere&module=$code_mod" ?>>
                                                    <button type="submit" class=" btn btn-warning">Consulter</button>
                                                </a>
                                            </td>

                                        </tr>
                                <?php $i++;
                                    endif;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php endif ?>
<?php endif ?>

<?php if (!empty($_GET['filiere']) && !empty($_SESSION['prof']) && !empty($_GET['module'])) : ?>
    <?php
    $trouve = false;
    $filiere = $_GET['filiere'];
    $code_mod = $_GET['module'];
    foreach ($prof->module as $module) {
        if ($module->filiere == $filiere && $module->code == $code_mod) {
            $trouve = true;
            break;
        }
    }
    if ($trouve) :
    ?>
        <div class="container pb-4 my_container ">
            <div class=" text-center">
                <h1 class=" fst-italic">Vous êtes connecté(e) comme enseignant(e)</h1>
                <hr>
                <h2 class=" fw-normal"><?php echo $a ?></h2>
                <a href=<?php echo "zone_prof.php?filiere=" . $filiere ?> class="btn btn-danger text-light mb-3 fw-bold" <?php echo "title= 'Voir vos modules cours, Filiere:$filiere'" ?>> <i class="bi bi-arrow-bar-left"></i> Retour</a>
                <div class=" border rounded border-primary">
                    <h2 class=" fst-italic">Filiere: <?php echo $filiere ?></h2>
                    <h2 class=" text-decoration-underline">Module : <?php echo $code_mod ?></h2>
                    <hr>
                    <div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <div class=" input-group flex-nowrap">
                                    <span class=" input-group-text" id="addon-wrapping"><i class=" bi bi-search"></i></span>
                                    <input type="text" name="my-search" id="my-search" placeholder="Matricule" maxlength="7" size="10" class="form-control text-uppercase">
                                </div>
                                <small class="form-text text-muted">Chercher Matricule</small>
                            </div>
                        </div>
                        <hr>
                        <form action=<?php echo "zone_prof.php?filiere=$filiere&module=$code_mod" ?> method="post">
                            <div class=" table-responsive">
                                <table class=" table table-hover table-bordered">
                                    <thead class=" table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Matricule</th>
                                            <th>Nom Complet</th>
                                            <th>CC</th>
                                            <th>TP</th>
                                            <th>EE</th>
                                            <th>TOTAL</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="body-rech">
                                        <?php
                                        $i = 0;
                                        if (isset($_POST)) {
                                            [$etudiant, $evaluer] = $prof->consulterNote($code_mod, $filiere);
                                            foreach ($evaluer as $matiere) {

                                                $matri = $matiere->etudiant->matricule;
                                                $notation_cc = $matiere->note_cc;
                                                $notation_tp = $matiere->note_tp;
                                                $notation_ee = $matiere->note_ee;
                                                $istp = (int) $matiere->module->istp;
                                                foreach ($_POST as $key => $vals) {
                                                    $enregistrer = false;
                                                    foreach ($vals as $key_val => $val) {
                                                        if ($val == "el" || $val == "EL" || $val == "elimi" || $val == "ELIMI") {
                                                            $val = -1;
                                                        } elseif ($val == "/" or $val == "-") {
                                                            $val = null;
                                                        } else {
                                                            $val = floatval($val);
                                                            if ($val < 0) {
                                                                $val = " ";
                                                            }
                                                        }
                                                        if (($val >= 0 && $val <= 70) || $val == -1 || $val == null) {
                                                            if ($matri == $key && $val != $notation_cc && $key_val == 0) {
                                                                if (($val <= 30 && $istp == 0) || ($val <= 20 && $istp != 0)) {
                                                                    $enregistrer = true;
                                                                    $prof->enregistrerNote($matri, $code_mod, $filiere, $val, $key_val);
                                                                }
                                                            } elseif ($matri == $key && $val != $notation_tp && $key_val == 1 && $istp != 0) {
                                                                if ($val <= 30) {
                                                                    $enregistrer = true;
                                                                    $prof->enregistrerNote($matri, $code_mod, $filiere, $val, $key_val);
                                                                }
                                                            } elseif ($matri == $key && $val != $notation_ee &&  ($key_val == 2 || ($key_val == 1 && $istp == 0))) {
                                                                if (($val <= 70 && $istp == 0) || ($val <= 50 && $istp != 0)) {
                                                                    $key_val = 2;
                                                                    $enregistrer = true;
                                                                    $prof->enregistrerNote($matri, $code_mod, $filiere, $val, $key_val);
                                                                }
                                                            }
                                                        }
                                                    }
                                                    if ($enregistrer) {
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        [$etudiant, $evaluer] = $prof->consulterNote($code_mod, $filiere);
                                        foreach ($evaluer as $matiere) :
                                            $i++;
                                            // echo '<pre>';
                                            // print_r($matiere);
                                            // echo '</pre>';
                                        ?>
                                            <tr class=" align-middle ligne">
                                                <th><?php echo $i ?></th>
                                                <th class="ligne-matri"><?php echo $matiere->etudiant->matricule ?></th>
                                                <td class=" text-md-start ps-md-5" ><?php echo strtoupper($matiere->etudiant->nom) ?></td>
                                                <td <?php echo "class='modcc$i parent_larg p-0'" ?>>
                                                    <input type="text" class="form-control larg text-center cel" id=<?php echo "modcc$i" ?> value=<?php echo Cellule::afficheNote($matiere->note_cc); ?> size="2" maxlength="5" name=<?php echo "{$matiere->etudiant->matricule}[]" ?>>
                                                </td>
                                                <td <?php echo "class='modtp$i parent_larg p-0'" ?>>
                                                    <?php if ($matiere->module->istp != 0) : ?>
                                                        <input type="text" class="form-control larg text-center cel" id=<?php echo "modtp$i" ?> value=<?php echo Cellule::afficheNote($matiere->note_tp); ?> size="2" maxlength="5" name=<?php echo "{$matiere->etudiant->matricule}[]" ?>>
                                                    <?php else : ?>
                                                        <span class="larg"></span>
                                                        <span class=" fst-italic cel">not-Tp</span>
                                                    <?php endif ?>
                                                </td>
                                                <td <?php echo "class='modee$i parent_larg p-0'" ?>>
                                                    <input type="text" class="form-control larg text-center cel" id=<?php echo "modee$i" ?> value=<?php echo Cellule::afficheNote($matiere->note_ee); ?> size="2" maxlength="5" name=<?php echo "{$matiere->etudiant->matricule}[]" ?>>
                                                </td>
                                                <td>
                                                    <span class=" total fw-bold">
                                                        <?php
                                                        $cc = (float) $matiere->note_cc;
                                                        if ($matiere->module->istp != 0) {
                                                            $tp = (float) $matiere->note_tp;
                                                        } else {
                                                            $tp = 0;
                                                        };
                                                        $ee = (float) $matiere->note_ee;
                                                        if ($cc < 0 or $tp < 0 or $ee < 0) {
                                                            echo 'EL';
                                                        } else {
                                                            echo round($cc + $tp + $ee, 2);
                                                        }
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pb-2 d-flex justify-content-around">
                                <button type="submit" class="soumettre btn btn-success fw-bold">Enregistrer <i class="bi bi-save"></i> </button>
                                <a href=<?php echo "zone_prof.php?filiere=$filiere&module=$code_mod" ?> class="btn btn-danger">Reset <i class=" bi bi-arrow-clockwise"></i></a>
                            </div>
                            <?php echo $prof->modifierNote() ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php endif ?>

<?php require '../require/footer.php' ?>