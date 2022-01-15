<?php require 'header.php' ?>
<nav class=" navbar bg-secondary sticky-top-md">
    <div class="container px-sm-5 px-3 d-flex">
        <a href="index.php" class=" text-light fw-bold text-decoration-none logo"><img src="logo2.png" alt="logo" width="30" height="35"> UNIVERSITE UY1</a>
        <div>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav_link" aria-current="page" href="index.php"><i class="bi bi-house-fill" ></i>ACCUEIL</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container my_container">
    <div class="text-center">
        <h1 class=" pt-md-5 pt-2" >BIENVENUE DANS LE SITE DE GESTION DE NOTE DE L'UNIVERSITE DE YAOUNDE I</h1>
        <hr>
        <h2 class="fst-italic">Vous êtes</h2>
        <div class="mygrid">
            <div class="p-2 p-sm-4">
                <div class=" border-2 border p-2 user position-relative h-100 shadow">
                    <h3>Etudiant</h3>
                    <hr>
                    <p>Vous êtes evalué(e) par vos professeurs dans différents UE et vous decider de consulter vos notes</p>
                    <form action="connexion.php" method="get">
                        <input type="text" name="user" value="etudiant" class="d-none">
                        <button class="btn btn-primary position-absolute bottom-0 start-50 translate-middle">Poursuivre  <i class=" bi bi-box-arrow-in-right" ></i></button>
                    </form>
                </div>
            </div>
            <div class="p-2 p-sm-4">
                <div class=" border-2 border p-2 user position-relative h-100 shadow">
                    <h3>Professeur</h3>
                    <hr>
                    <p>Vous êtes charger de gerer la notes des etudiants suivant les matières que vous enseigner</p>
                    <form action="connexion.php" method="get">
                        <input type="text" name="user" value="professeur" class="d-none">
                        <button class="btn btn-primary position-absolute bottom-0 start-50 translate-middle">Poursuivre <i class=" bi bi-box-arrow-in-right" ></i></button>
                    </form>
                </div>
            </div>
            <div class="p-2 p-sm-4">
                <div class=" border-2 border p-2 user position-relative h-100 shadow">
                    <h3>Adminitrateur</h3>
                    <hr>
                    <p>Vous êtes charger de controler les etudiants et professeurs</p>
                    <form action="admin/login.php" method="post">
                        <input type="text" name="user" value="professeur" class="d-none">
                        <button class="btn btn-primary position-absolute bottom-0 start-50 translate-middle">Poursuivre  <i class=" bi bi-box-arrow-in-right" ></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'footer.php' ?>