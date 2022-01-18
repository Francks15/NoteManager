<?php

class Etudiant extends Utilisateur
{
    public $matricule;
    public $filiere;
    public function __construct($matricule, $nom, $sexe, $reference = "Etudiant")
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->reference = $reference;
        $this->sexe = $sexe;
    }

    public function envoyerRequette($email)
    {
        if (!empty($email)) {
            $balise = '<a href="mailto:' . $email . '"><button class="btn btn-warning"><span class=" d-none d-sm-inline" >Envoyer requette</span> <i class="bi bi-envelope-fill"></i></button></a>';
        } else {
            $balise = "/";
        }
        return $balise;
    }

    public function consulterNote($code = null, $filiere = null)
    {
        $bdd = new PDO('mysql:dbname=notemanager;host=127.0.0.1', 'root', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $reponse = $bdd->query('SELECT professeurs.email, module_code, note_cc, note_tp, note_ee, module.tp FROM evaluer
        INNER JOIN module ON module.codeu=module_code
        INNER JOIN professeurs ON professeurs.id= professeur_id
        WHERE etudiant_matricule="' . $this->matricule . '";');
        return $reponse;
    }

    public static function authentifier($identifiant): array
    {
        $connect = false;
        $etudiant = null;
        $bdd = new PDO('mysql:dbname=notemanager;host=127.0.0.1', 'root', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $reponse = $bdd->query('SELECT etudiant.*, module.filiere FROM evaluer
        INNER JOIN module ON module.codeu=module_code
        INNER JOIN etudiant ON etudiant_matricule=etudiant.matricule
        WHERE etudiant.matricule="' . $identifiant . '"');
        while ($donnes = $reponse->fetch()) {
            if ($donnes['matricule'] == $identifiant) {
                $connect = true;
                $etudiant = new Etudiant($donnes['matricule'], $donnes["nom"], $donnes["sexe"]);
                $etudiant->filiere = $donnes['filiere'];
                $reponse->closeCursor();
                return [$connect, $etudiant];
            }
        }
        $reponse->closeCursor();
        return [$connect, $etudiant];
    }
}