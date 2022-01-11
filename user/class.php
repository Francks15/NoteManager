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
    abstract public function consulterNote($code, $filiere);
}

class Etudiant extends Utilisateur
{
    public $matricule;

    public function __construct($matricule, $nom, $sexe, $reference = "Etudiant")
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->reference = $reference;
        $this->sexe = $sexe;
    }


    public function envoyerRequete()
    {
    }

    public function consulterNote($code, $filiere)
    {
    }

    public static function authentifier($identifiant): array
    {
        $connect = false;
        $etudiant = null;
        $bdd = new PDO('mysql:dbname=datamanager;host=127.0.0.1:3307', 'junior', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        // try {
        // } catch (Exception $e) {
        //     die('Erreur : ' . $e->getMessage());
        // }
        $reponse = $bdd->query('SELECT * FROM etudiant');
        while ($donnes = $reponse->fetch()) {
            if ($donnes['matricule'] == $identifiant) {
                $connect = true;
                $etudiant = new Etudiant($donnes['matricule'], $donnes["nom"], $donnes["sexe"]);
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
    public $module;
    public $etudiant;
    public function __construct($id, $nom, $sexe, $code, $reference = "professeur")
    {
        $this->id = $id;
        $this->sexe = $sexe;
        $this->nom = $nom;
        $this->code = sha1($code);
        $this->reference = $reference;
    }
    public function modifierNote()
    {
    }

    public function publierNote()
    {
    }

    public function enregistrerNote()
    {
    }

    public function consulterNote($code, $filiere): array
    {
        foreach ($this->module as $module) {
            $module_code = $module->code;
            $module_filiere = $module->filiere;
            if ($code == $module_code && $filiere == $module_filiere) {
                $j = $module;
                break;
            }
        }
        $bdd = new PDO('mysql:dbname=datamanager;host=127.0.0.1:3307', 'junior', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $etudiant = [];
        $evaluer = [];
        $reponse = $bdd->query('SELECT etudiant.*, note FROM evaluer
        INNER JOIN etudiant ON etudiant.matricule=etudiant_matricule
        INNER JOIN module ON module_code=module.code
        WHERE module.code="' . $code . '" AND filiere="' . $filiere . '"');
        $i = 0;
        while ($donnes = $reponse->fetch()) {
            $etudiant[] = new Etudiant($donnes['matricule'], $donnes['nom'], $donnes['sexe'], $donnes['reference']);
            $evaluer[] = new Evaluer($donnes['note'], $etudiant[$i], $j);
            $i++;
        }
        $reponse->closeCursor();
        return [$etudiant, $evaluer];
    }

    public static function authentifier($identifiant): array
    {
        $connect = false;
        $prof = null;
        $module_prof = [];
        $bdd = new PDO('mysql:dbname=datamanager;host=127.0.0.1:3307', 'junior', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        // try {
        // } catch (Exception $e) {
        //     die('Erreur : ' . $e->getMessage());
        // }
        $reponse = $bdd->query('SELECT * FROM professeur');
        while ($donnes = $reponse->fetch()) {
            if ($donnes['id'] == $identifiant['identifiant'] and $donnes['code'] == $identifiant["code"]) {
                $connect = true;
                $prof = new Professeur($donnes['id'], $donnes["nom"], $donnes["sexe"], $donnes['code']);
                $reponse->closeCursor();
                break;
            }
        }
        $reponse->closeCursor();
        if ($connect and isset($prof)) {
            $reponse = $bdd->query('SELECT * FROM module WHERE professeur_id=' . $prof->id);
            while ($donnes = $reponse->fetch()) {
                $module_prof[] = new Module($donnes['code'], $donnes['nom'], $donnes["filiere"], $donnes['niveau'], $prof);
                $prof->module = $module_prof;
            }
            $reponse->closeCursor();
        }
        return [$connect, $prof];
    }
}

class Module
{
    public $code;
    public $nom;
    public $filiere;
    public $niveau;
    public Professeur $prof;
    public function __construct($code, $nom, $filiere, $niveau, $prof)
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->filiere = $filiere;
        $this->niveau = $niveau;
        $this->prof = $prof;
    }
}

class Evaluer
{
    public $note;
    public Etudiant $etudiant;
    public Module $module;

    public function __construct($note, $etudiant, $module)
    {
        $this->note = $note;
        $this->etudiant = $etudiant;
        $this->module = $module;
    }
}
