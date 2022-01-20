<?php
require_once '../require/class.php';
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["prof"])) {
    header('Location: connexion.php?user=professeur');
}

$prof = $_SESSION['prof'];
$a = $prof->nom;

?>


<?php if (!empty($_GET['filiere']) && !empty($_SESSION['prof']) && !empty($_GET['module']) && !empty($_GET['impression'])) : ?>
    <?php
    $trouve = false;
    $filiere = $_GET['filiere'];
    $code_mod = $_GET['module'];
    $impression = $_GET['impression'];
    $istp = $_GET['istp'];
    $title_page = "Note_{$code_mod}_$filiere";

    foreach ($prof->module as $module) {
        if ($module->filiere == $filiere && $module->code == $code_mod) {
            $trouve = true;
            break;
        }
    }
    if ($trouve) :
    ?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/bootstrap-icons.css">
            <link rel="stylesheet" href="../css/style.css">
            <title><?php echo $title_page ? $title_page : "Gestion des Notes"; ?></title>
        </head>

        <body>


            <div class="container text-center">
                <a href="../../index.php">
                    <img src="../img/logo.png" alt="logo-UY1">
                </a>
            </div>

            <div class=" container text-center pt-4">
                <h2 class=" fst-italic">Filiere: <?php echo $filiere ?></h2>
                <h2 class=" text-decoration-underline">Module : <?php echo $code_mod ?></h2>
                <hr>
                <div class=" table-responsive">
                    <table class=" table table-bordered border-dark w-max" id="dow">
                        <thead class=" table-info border-dark">
                            <tr>
                                <th>#</th>
                                <th>Matricule</th>
                                <th>Nom Complet</th>
                                <th>CC</th>
                                <?php if (($impression == "tp" || $impression == "tout") && $istp) : ?>
                                    <th>TP</th>
                                <?php endif ?>
                                <?php if ($impression == "tout") : ?>
                                    <th>EE</th>
                                    <th>TOTAL</th>
                                <?php endif ?>

                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
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
                                    <td class=" text-start ps-md-5 ps-2">
                                        <div class=" nom_etudiant d-inline-block"><?php echo strtoupper($matiere->etudiant->nom) ?></div>
                                    </td>
                                    <td <?php echo "class='modcc$i parent_larg p-0'" ?>>
                                        <?php
                                        $note = Cellule::afficheNote($matiere->note_cc);
                                        echo $note == "/" ? " " : $note;
                                        ?>
                                    </td>
                                    <?php if (($impression == "tp" || $impression == "tout") && $istp) : ?>
                                        <td <?php echo "class='modtp$i parent_larg p-0'" ?>>
                                            <?php if ($matiere->module->istp != 0) : ?>
                                                <?php
                                                $note = Cellule::afficheNote($matiere->note_tp);
                                                echo $note == "/" ? " " : $note;
                                                ?>
                                            <?php else : ?>
                                                <span class="larg"></span>
                                                <span class=" fst-italic cel">not-Tp</span>
                                            <?php endif ?>
                                        </td>
                                    <?php endif ?>
                                    <?php if ($impression == "tout") : ?>
                                        <td <?php echo "class='modee$i parent_larg p-0'" ?>>
                                            <?php
                                            $note = Cellule::afficheNote($matiere->note_ee);
                                            echo $note == "/" ? " " : $note;
                                            ?>
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
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                window.print()
            </script>
        </body>

        </html>
    <?php endif ?>
<?php endif ?>