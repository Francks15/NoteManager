<?php

abstract class Personne
{
    public $nom;
    public $reference;
    public $sexe;

    abstract public static function authentifier($identifiant);
}

abstract class Suppression
{
    public function supprimerProf()
    {
    }

    public function supprimerEtudiant()
    {
    }
}

abstract class Modification
{
    public function modifierProf()
    {
    }
    public function modifierEtudiant()
    {
    }
}

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
            $bdd = new PDO('mysql:host=localhost;dbname=datamanager', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query('SELECT * FROM administrateur');
        while ($donnes = $reponse->fetch()) {
        }
    }
}

abstract class Utilisateur extends Personne
{
    public Administrateur $admin;
    abstract public function lireNote();
}

class Etudiant extends Utilisateur
{
    public $matricule;
    public $filiere;

    public function __construct($matricule, $nom, $sexe, $filiere, $reference = "Etudiant")
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->filiere = $filiere;
        $this->reference = $reference;
        $this->sexe= $sexe;
    }


    public function envoyerRequete()
    {
    }

    public function lireNote()
    {
    }

    public static function authentifier($identifiant): array
    {
        $connect = false;
        $etudiant=null;
        $bdd = new PDO('mysql:dbname=datamanager;host=127.0.0.1:3307', 'junior', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        // try {
        // } catch (Exception $e) {
        //     die('Erreur : ' . $e->getMessage());
        // }
        $reponse = $bdd->query('SELECT * FROM etudiant');
        while ($donnes = $reponse->fetch()) {
            if ($donnes['matricule'] == $identifiant) {
                $connect = true;
                $etudiant = new Etudiant($donnes['matricule'], $donnes["nom"], $donnes["sexe"], $donnes['filiere']);
                $reponse->closeCursor();
                return [$connect, $etudiant];
            }
        }
        $reponse->closeCursor();
        return [$connect, $etudiant];
    }
}

class Professeur extends Utilisateur
{
    public $id;
    public $code;

    public function modifierNote()
    {
    }

    public function publierNote()
    {
    }

    public function enregistrerNote()
    {
    }

    public function lireNote()
    {
    }

    public static function authentifier($identifiant)
    {
    }
}

class Module
{
    public $code;
    public $nom;
    public Professeur $prof;
}

class Evaluer
{
    public $note;
    public Etudiant $etudiant;
    public Module $module;
}

?>