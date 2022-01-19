<?php

class Evaluer
{
    public $note_cc;
    public $note_tp;
    public $note_ee;
    public Etudiant $etudiant;
    public Module $module;

    public function __construct($note_cc, $note_tp, $note_ee, $etudiant, $module)
    {
        $this->note_cc = $note_cc;
        $this->note_tp = $note_tp;
        $this->note_ee = $note_ee;
        $this->etudiant = $etudiant;
        $this->module = $module;
    }
}
