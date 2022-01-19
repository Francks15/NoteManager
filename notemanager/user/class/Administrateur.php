<?php

class Administrateur extends Personne
{
    public $id;
    public $code;
    public Suppression $supp;
    public Modification $modif;

    public function creerProf()
    {
    }

    public function creerEtudiant()
    {
    }

    public static function authentifier($identifiant)
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=datamanager', 'root', 'frank10');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query('SELECT * FROM administrateur');
        while ($donnes = $reponse->fetch()) {
        }
    }
}
