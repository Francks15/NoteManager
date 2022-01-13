<?php
require_once 'class.php';
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

?>

<?php require 'header.php' ?>

<div class="container mb-4 ">
    <div class="m-3">
        <form action="zone_prof.php" method="post">
            <div class=" d-flex justify-content-around">
                <a href="index.php" class=" btn btn-primary">Accueil</a>
                <button type="submit" name="deconnecter" class="btn btn-primary">Deconnexion</button>
            </div>
        </form>
    </div>
</div>

<?php if (!empty($_SESSION['prof']) && empty($_GET['filiere'])) : ?>
    <div class="container mb-4 ">
        <div class=" text-center">
            <h1 class=" fst-italic">Vous êtes connecté(e) comme enseignant(e)</h1>
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
        <div class="container mb-4 ">
            <div class=" text-center">
                <h1 class=" fst-italic">Vous êtes connecté(e) comme enseignant(e)</h1>
                <h2 class=" fw-normal"><?php echo $a ?></h2>
                <a href="zone_prof.php" class="btn btn-danger text-light mb-3 ">&larr;Retour</a>
                <div class=" border rounded border-primary">
                    <h2 class=" fst-italic">Filiere: <?php echo $filiere ?></h2>
                    <h2 class=" text-decoration-underline ">Unité d'enseignement</h2>
                    <hr>
                    <table class="table table-hover">
                        <thead>
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
        <div class="container mb-4 ">
            <div class=" text-center">
                <h1 class=" fst-italic">Vous êtes connecté(e) comme enseignant(e)</h1>
                <h2 class=" fw-normal"><?php echo $a ?></h2>
                <a href=<?php echo "zone_prof.php?filiere=" . $filiere ?> class="btn btn-danger text-light mb-3 ">&larr;Retour</a>
                <div class=" border rounded border-primary">
                    <h2 class=" fst-italic">Filiere: <?php echo $filiere ?></h2>
                    <h2 class=" text-decoration-underline">Module : <?php echo $code_mod ?></h2>
                    <hr>
                    <div>
                        <div class="d-flex justify-content-center">
                            <form>
                                <table>
                                    <tr>
                                        <td><input type="text" name="my-search" id="my-search" placeholder="Recherche..." maxlength="7" size="10" class="form-control"></td>
                                        <td><button class="btn btn-secondary rechercher">Rechercher</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <hr>
                        <form action=<?php echo "zone_prof.php?filiere=$filiere&module=$code_mod" ?> method="post">
                            <table class=" table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Matricule</th>
                                        <th>Nom Complet</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="body-rech">
                                    <?php
                                    $i = 0;
                                    if (isset($_POST)) {
                                        [$etudiant, $evaluer] = $prof->consulterNote($code_mod, $filiere);
                                        foreach ($evaluer as $matiere) {

                                            $matri = $matiere->etudiant->matricule;
                                            $notation = $matiere->note;
                                            foreach ($_POST as $key => $val) {
                                                if ($val == "el" || $val == "EL" || $val == "elim" || $val == "ELIM") {
                                                    $val = -1;
                                                } elseif ($val == "/" or $val == "-") {
                                                    $val = null;
                                                } elseif ($val == "vierge") {
                                                    $val == "vierge";
                                                } else {
                                                    $val = floatval($val);
                                                    if ($val < 0) {
                                                        $val = 0;
                                                    }
                                                }
                                                if (($val >= 0 && $val <= 100) || $val == -1 || $val == null) {
                                                    if ($matri == $key && $val != $notation) {
                                                        $prof->enregistrerNote($matri, $code_mod, $filiere, $val);
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    [$etudiant, $evaluer] = $prof->consulterNote($code_mod, $filiere);
                                    foreach ($evaluer as $matiere) :
                                        $i++;
                                    ?>
                                        <tr class=" align-baseline ligne">
                                            <th><?php echo $i ?></th>
                                            <th class="ligne-matri"><?php echo $matiere->etudiant->matricule ?></th>
                                            <td><?php echo strtoupper($matiere->etudiant->nom) ?></td>
                                            <td <?php echo "class='mod$i '" ?>><?php
                                                                                if (!isset($matiere->note)) {
                                                                                    echo "/";
                                                                                } elseif ($matiere->note < 0) {
                                                                                    echo "EL";
                                                                                } else {
                                                                                    echo $matiere->note;
                                                                                }
                                                                                ?></td>
                                            <td <?php echo "class='d-none mod$i'" ?>>
                                                <input type="text" class="form-control larg text-center" value="vierge" size="2" maxlength="5" name=<?php echo $matiere->etudiant->matricule ?>>
                                            </td>
                                            <td>
                                                <span class="prof-modifier text-center btn btn-warning" id=<?php echo "mod$i" ?>>Modifier</span>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php echo $prof->modifierNote() ?>
                                </tbody>
                            </table>
                            <div class="pb-2 d-flex justify-content-around">
                                <button type="submit" class="soumettre btn btn-success">Enregistrer</button>
                                <a href=<?php echo "zone_prof.php?filiere=$filiere&module=$code_mod" ?> class="btn btn-danger">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php endif ?>

<?php require 'footer.php' ?>