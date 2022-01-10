<?php require 'header.php' ?>

<div class="container">
    <div class="text-center">
        <h1>BIENVENUE DANS LE SITE DE GESTION DE NOTE DE L'UNIVERSITE DE YAOUNDE I</h1>
        <h2 class="fst-italic">Vous êtes</h2>
        <div class="mygrid">
            <div class="p-2">
                <div class=" border rounded-3 border-primary p-2 ">
                    <h3>Etudiant</h3>
                    <p>Vous êtes evalué(e) par vos professeurs dans différents UE et vous decider de consulter vos notes</p>
                    <form action="connexion.php" method="get">
                        <input type="text" name="user" value="etudiant" class="d-none">
                        <button class="btn btn-primary">Poursuivre...</button>
                    </form>
                </div>
            </div>
            <div class="p-2">
                <div class=" border rounded-3 border-primary p-2">
                    <h3>Professeur</h3>
                    <p>Vous êtes charger de gerer la notes des etudiants suivant les matières que vous enseigner</p>
                    <form action="connexion.php" method="get">
                        <input type="text" name="user" value="professeur" class="d-none">
                        <button class="btn btn-primary">Poursuivre...</button>
                    </form>
                </div>
            </div>
            <div class="p-2">
                <div class=" border rounded-3 border-primary p-2 h-100">
                    <h3>Adminitrateur</h3>
                    <p>Vous êtes charger de controler les etudiants et professeurs</p>
                    <form action="connexion.php" method="get">
                        <input type="text" name="user" value="professeur" class="d-none">
                        <button class="btn btn-primary">Poursuivre...</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'footer.php' ?>