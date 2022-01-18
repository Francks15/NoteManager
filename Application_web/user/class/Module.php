<?php

class Module
{
    public $code;
    public $nom;
    public $filiere;
    public $niveau;
    public $istp;
    public Professeur $prof;
    public function __construct($code, $nom, $filiere, $niveau, $istp, $prof)
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->filiere = $filiere;
        $this->niveau = $niveau;
        $this->istp = $istp;
        $this->prof = $prof;
    }
}
