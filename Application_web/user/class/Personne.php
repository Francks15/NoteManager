<?php

abstract class Personne
{
    public $nom;
    public $reference;
    public $sexe;

    abstract public static function authentifier($identifiant);
}