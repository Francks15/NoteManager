<?php

abstract class Personne
{
    private $nom;
    private $reference;

    public function getNom()
    {
        return $this->nom;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
    public function setReference(string $reference)
    {
        $this->reference = $reference;
    }
    abstract public function authentifier();
}

abstract class Suppression{
    public function supprimerProf(){

    }

    public function supprimerEtudiant(){

    }
}

abstract class Modification{
    public function modifierProf(){

    }
    public function modifierEtudiant(){

    }
}

class Administrateur extends Personne {
    private $id;
    private $code;
    public Suppression $supp;
    public Modification $modif;

    public function getId(){return $this->id;}
    public function getCode(){return $this->code;}
    public function setId(int $id){$this->id=$id;}
    public function setCode(int $code){$this->code=$code;}

    public function creerProf(){

    }

    public function creerEtudiant(){

    }

    public function authentifier()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=datamanager', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query('SELECT * FROM administrateur');
        while ($donnes = $reponse->fetch()){
            
        }
    }
}

abstract class Utilisateur extends Personne{
    public Administrateur $admin;
    abstract public function lireNote();
}

class Etudiant extends Utilisateur{
    public $matricule;
    public $filiere;
    public function envoyerRequete(){

    }

    public function lireNote()
    {
        
    }

    public function authentifier()
    {
        
    }
}

class Professeur extends Utilisateur{
    public $id;
    public $code;

    public function modifierNote(){

    }

    public function publierNote(){

    }

    public function enregistrerNote(){

    }

    public function lireNote()
    {
        
    }

    public function authentifier()
    {
        
    }
}

class Module  {
    public $code;
    public $nom;
    public Professeur $prof;
}

class Evaluer{
    public $note;
    public Etudiant $etudiant;
    public Module $module;
}

