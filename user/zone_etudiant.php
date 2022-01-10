<?php
require_once 'class.php';
if(!isset($_SESSION)){
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

if(empty($_SESSION["etudiant"])){
    header('Location: connexion.php?user=etudiant');
}

$etudiant = $_SESSION['etudiant'];
$a = $etudiant->nom;
$b = $etudiant->matricule;


?>

<?php require 'header.php' ?>

<?php if (!empty($_SESSION['etudiant'])) : ?>
    <div class="container">
        <div class="text-center">
            <h1 class="fst-italic">Vous êtes connecté(e) comme étudiant(e)</h1>
            <h2 class=" fst-italic fw-normal"><?php echo strtoupper($a) ?></h2>
            <h2 class=" fst-italic fw-normal">MATRICULE: <?php echo $b ?></h2>
        </div>
        <div>
            <table class=" table text-center">
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
                    $bdd = new PDO('mysql:dbname=datamanager;host=127.0.0.1:3307', 'junior', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                    $reponse = $bdd->query('SELECT  professeur.nom, module_code, note FROM evaluer
                    INNER JOIN module ON module.code=module_code
                    INNER JOIN professeur ON professeur.id= professeur_id
                    WHERE etudiant_matricule="' . $b . '"
                    ;');
                    $i = 1;
                    while ($donnes = $reponse->fetch()) :
                    ?>
                        <tr>
                            <th><?php echo $i ?></th>
                            <?php foreach ($donnes as $k => $val) : ?>
                                <?php if (is_int($k)) : ?>
                                    <td><?php echo $val ? $val : " /" ?></td>
                            <?php endif;
                            endforeach;
                            $i++; ?>
                            <td><a href="mailto:tabuguiafrank@gmail.com">Envoyer requette</a></td>
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