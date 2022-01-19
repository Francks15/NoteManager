<?php

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
        $script = '<script src="../js/index.js"></script>';
        return $script;
    }

    public function enregistrerNote($matricule, $code, $filiere, $note, $key_note)
    {
        switch ($key_note) {
            case 0:
                $bdd = new PDO('mysql:dbname=notemanager;host=127.0.0.1', 'root', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $reponse = $bdd->prepare('UPDATE notemanager.evaluer SET note_cc = :note WHERE (etudiant_matricule = :matricule) and (module_code = :code) and (module_filiere = :filiere)');
                $reponse->execute([
                    'note' => $note,
                    'matricule' => $matricule,
                    'code' => $code,
                    'filiere' => $filiere
                ]);
                break;
            case 1:
                $bdd = new PDO('mysql:dbname=notemanager;host=127.0.0.1', 'root', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $reponse = $bdd->prepare('UPDATE notemanager.evaluer SET note_tp = :note WHERE (etudiant_matricule = :matricule) and (module_code = :code) and (module_filiere = :filiere)');
                $reponse->execute([
                    'note' => $note,
                    'matricule' => $matricule,
                    'code' => $code,
                    'filiere' => $filiere
                ]);
                break;
            case 2:
                $bdd = new PDO('mysql:dbname=notemanager;host=127.0.0.1', 'root', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $reponse = $bdd->prepare('UPDATE notemanager.evaluer SET note_ee = :note WHERE (etudiant_matricule = :matricule) and (module_code = :code) and (module_filiere = :filiere)');
                $reponse->execute([
                    'note' => $note,
                    'matricule' => $matricule,
                    'code' => $code,
                    'filiere' => $filiere
                ]);
                break;
            default:
                echo "Erreur lors de l'enregistrement des notes";
                break;
        }
    }

    public function consulterNote($code = null, $filiere = null): array
    {
        foreach ($this->module as $module) {
            $module_code = $module->code;
            $module_filiere = $module->filiere;
            if ($code == $module_code && $filiere == $module_filiere) {
                $j = $module;
                break;
            }
        }
        $bdd = new PDO('mysql:dbname=notemanager;host=127.0.0.1', 'root', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $etudiant = [];
        $evaluer = [];
        $reponse = $bdd->query('SELECT etudiant.*, note_cc, note_tp, note_ee FROM evaluer
        INNER JOIN etudiant ON etudiant.matricule=etudiant_matricule
        INNER JOIN module ON module_code=module.codeu
        WHERE module.codeu="' . $code . '" AND filiere="' . $filiere . '" ORDER BY etudiant.nom');
        $i = 0;
        while ($donnes = $reponse->fetch()) {
            $etudiant[] = new Etudiant($donnes['matricule'], $donnes['nom'], $donnes['sexe'], $donnes['reference']);
            $evaluer[] = new Evaluer($donnes['note_cc'], $donnes['note_tp'], $donnes['note_ee'], $etudiant[$i], $j);
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
        $bdd = new PDO('mysql:dbname=notemanager;host=127.0.0.1:3306', 'root', 'frank10', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        // try {
        // } catch (Exception $e) {
        //     die('Erreur : ' . $e->getMessage());
        // }
        $reponse = $bdd->query('SELECT * FROM professeurs');
        while ($donnes = $reponse->fetch()) {
            if ($donnes['email'] == $identifiant['identifiant'] and $donnes['codep'] == $identifiant["code"]) {
                $connect = true;
                $prof = new Professeur($donnes['id'], $donnes["title"], $donnes["sexe"], $donnes['codep']);
                $reponse->closeCursor();
                break;
            }
        }
        $reponse->closeCursor();
        if ($connect and isset($prof)) {
            $reponse = $bdd->query('SELECT * FROM module WHERE professeur_id=' . $prof->id . ' ORDER BY module.filiere');
            while ($donnes = $reponse->fetch()) {
                $module_prof[] = new Module($donnes['codeu'], $donnes['name'], $donnes["filiere"], $donnes['level'], $donnes['tp'], $prof);
                $prof->module = $module_prof;
            }
            $reponse->closeCursor();
        }
        return [$connect, $prof];
    }
}
