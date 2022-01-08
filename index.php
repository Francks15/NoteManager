<?php
require "class.php";
$connect = false;
if (!empty($_POST['matricule'])) {
    [$connect, $etudiant] = Etudiant::authentifier($_POST['matricule']);
    if (empty($_COOKIE["etudiant"]) && $connect) {
        setcookie("etudiant", $_POST["matricule"]);
    }
}
?>
<?php require "header.php" ?>

<div class="container">
    <div class="d-flex justify-content-center p-5">
        <div class="d-flex flex-column text-center border border-primary px-5">
            <h1 class="py-2" >ETUDIANT</h1>
            <h2>FORMULAIRE D'ENREGISTREMENT</h2>
            <form action="index.php" method="post">
                <div>
                    <table class="mx-auto my-5">
                        <tr>
                            <td>MATRICULE: </td>
                            <td><input type="text" name="matricule" id="matricule" size="7"></td>
                        </tr>
                    </table>
                </div>
                <button class="btn btn-primary mb-4">soumettre</button>
                <?php if ($connect && isset($_POST["matricule"])): ?>
                    <div class="alert alert-success" role="alert">
                        Connection Reussi
                        <pre>
                            <?php 
                                var_dump($etudiant)
                            ?>
                        </pre>
                    </div>
                <?php elseif(isset($_POST["matricule"])): ?>
                    <div class="alert alert-danger" role="alert">
                        Echec Connexion
                    </div>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>

<?php require "footer.php" ?>