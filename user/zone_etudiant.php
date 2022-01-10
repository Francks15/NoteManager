<?php
if (isset($connect)) {
    setcookie("etudiant", serialize($etudiant));
}
if (isset($_COOKIE["etudiant"])) {
    $_COOKIE["etudiant"] = serialize($etudiant);
};

$etudiant = unserialize($_COOKIE['etudiant']);
$a = $etudiant->nom;
$b = $etudiant->matricule;
?>

<div class="container">
    <div class="text-center">
        <h1 class="fst-italic">SALUT</h1>
        <h2 class=" fst-italic fw-normal"><?php echo strtoupper($a) ?></h2>
        <h2 class=" fst-italic fw-normal">MATRICULE: <?php echo $b ?></h2>
    </div>
    <div>
        <table class=" table">
            <thead>
                <tr>
                    <th class="col">#</th>
                    <th class="col">Professeur</th>
                    <th class="col">Module</th>
                    <th class="col">Note</th>
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
                                <td><?php echo $val ?></td>
                        <?php endif;
                        endforeach;
                        $i++; ?>
                    </tr>
                <?php endwhile;
                $reponse->closeCursor();
                ?>
            </tbody>
        </table>
    </div>
</div>