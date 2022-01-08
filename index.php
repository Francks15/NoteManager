<?php
if (!empty($_COOKIE["etudiant"])) {
    setcookie("etudiant", $_COOKIE["etudiant"]);
}
$connect = false;

if (!empty($_POST['matricule'])) {
    
}
?>
<?php require "header.php" ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="text-center">
            <h1>ETUDIANT</h1>
            <h2>FORMULAIRE D'ENREGISTREMENT</h2>
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <td>MATRICULE: </td>
                        <td><input type="text" name="matricule" id="matricule" size="7"></td>
                    </tr>
                </table>
                <button class="btn btn-primary">soumettre</button>
            </form>
        </div>
    </div>
</div>

<?php require "footer.php" ?>