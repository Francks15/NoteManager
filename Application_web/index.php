<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user/css/bootstrap.min.css">
    <link rel="stylesheet" href="user/css/bootstrap-icons.css">
    <link rel="stylesheet" href="user/css/style.css">
    <title>Gestion des notes</title>
</head>

<body class=" position-relative">

    <div class="chargement">
        <!-- <div class="shapes-4"></div> -->
        <div class="classic-7"></div>
    </div>
    <div class="cover"></div>
    <div class="page v-none">

        <div class="container text-center">
            <a href="index.php">
                <img src="user/img/logo.png" alt="logo-UY1">
            </a>
        </div>
        <nav class=" navbar sticky-top-md">
            <div class="container px-sm-5 px-3 d-flex">
                <a href="index.php" class=" text-light fw-bold text-decoration-none logo"><img src="user/img/logo2.png" alt="logo" width="30" height="35"> UNIVERSITE UY1</a>
                <div>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav_link" aria-current="page" href="index.php"><i class="bi bi-house-fill"></i>ACCUEIL</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container my_container">
            <div class="text-center">
                <h1 class=" pt-md-5 pt-2">BIENVENUE DANS LE SITE DE GESTION DE NOTE DE L'UNIVERSITE DE YAOUNDE I</h1>
                <hr>
                <h2 class="fst-italic">Vous êtes</h2>
                <div class="mygrid">
                    <div class="p-2 p-sm-4">
                        <div class=" border-2 border p-2 user position-relative h-100 shadow">
                            <h3>Etudiant</h3>
                            <hr>
                            <p>Vous êtes evalué(e)s par vos professeurs dans différents UE et vous decidez de consulter vos notes</p>
                            <form action="user/pages/connexion.php" method="get">
                                <input type="text" name="user" value="etudiant" class="d-none">
                                <button class="btn btn-primary position-absolute bottom-0 start-50 translate-middle">Poursuivre <i class=" bi bi-box-arrow-in-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="p-2 p-sm-4">
                        <div class=" border-2 border p-2 user position-relative h-100 shadow">
                            <h3>Professeur</h3>
                            <hr>
                            <p>Vous êtes charger de gerer la notes des etudiants suivant les matières que vous enseignées</p>
                            <form action="user/pages/connexion.php" method="get">
                                <input type="text" name="user" value="professeur" class="d-none">
                                <button class="btn btn-primary position-absolute bottom-0 start-50 translate-middle">Poursuivre <i class=" bi bi-box-arrow-in-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="p-2 p-sm-4">
                        <div class=" border-2 border p-2 user position-relative h-100 shadow">
                            <h3>Adminitrateur</h3>
                            <hr>
                            <p>Vous êtes chargé(e)s de controler les professeurs et modules d'enseignement</p>
                            <form action="admin/login.php" method="post">
                                <input type="text" name="user" value="professeur" class="d-none">
                                <button class="btn btn-primary position-absolute bottom-0 start-50 translate-middle">Poursuivre <i class=" bi bi-box-arrow-in-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>
        <div class="footer"></div>
        <footer class="container-fluid text-center text-light bg-dark pt-2 footer position-absolute bottom-0 pb-2">
            <h4>GESTION DES NOTES DE L'UNIVERSITE DE YAOUNDE I</h4>
            <p class="lead text-center text-danger m-0 pt-5">NoteManager&copy; 2022 All rights reserved | CUTI UY1 |</p>
        </footer>
    </div>
    <script src="user/js/bootstrap.min.js"></script>
    <script>
        function height() {
            let h = window.innerHeight;
            document.body.style.minHeight = h + "px";
        }
        window.onload = function() {
            height();
            let chargement = document.querySelector('.chargement');
            let cover = document.querySelector('.cover');
            let page = document.querySelector('.page');
            chargement.classList.add("v-none");
            cover.classList.add("v-none");
            page.classList.remove('v-none');
        };
        window.onresize = function() {
            height();
        };
        let button = document.querySelectorAll('.btn');
        for (let i = 0; i < button.length; i++) {
            let cover = document.querySelector('.cover');
            let chargement = document.querySelector('.chargement');
            button[i].onclick = function() {
                chargement.classList.remove('v-none');
                cover.classList.remove('v-none');
                window.setTimeout(function() {
                    chargement.classList.add('v-none');
                    cover.classList.add('v-none');
                }, 2000);
            }
        }
    </script>
</body>

</html>