<div class="container">
    <?php 
        $etudiant = unserialize($_COOKIE["etudiant"]);
        $a=$etudiant->nom;
        $b=$etudiant->matricule;
        
        echo "<p> Vous êtes conecté(e) en tant que $a Matricule: $b   </p>"

    ?>
</div>