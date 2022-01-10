<?php
if (isset($connect)) {
    setcookie("prof", serialize($prof));
}
if (isset($_COOKIE["etudiant"])) {
    $_COOKIE["prof"] = serialize($prof);
};

$prof = unserialize($_COOKIE['prof']);
$a = $prof->nom;
var_dump($prof->module);
?>

<div class="container">
    <div class=" text-center">
        <h1>Vous êtes connecté(e) en tant que <?php echo $a ?></h1>
        <div class=" border border-primary rounded p-3" >
            <h2 class=" fst-italic" >Filière(s) d'enseignement</h2>
            <?php 
            $modules = $prof->module;
            foreach($modules as $module):
            ?>
            <form action="zone_prof?filiere=<?php echo $module['filiere']; ?>" method="get">
            <input type="text" name="filiere" class=" d-none" value="<?php echo $module['filiere'] ?>">
            <table class=" table" >
                <tr>
                    <td><?php echo $module['filiere'] ?></td>
                    <td><button type="submit" class=" btn btn-warning" >Selectionner</button></td>
                </tr>
            </table>
        </form>
        <?php endforeach ?>
        </div>
    </div>
</div>