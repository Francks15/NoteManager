<?php

abstract class Utilisateur extends Personne
{
    abstract public function consulterNote($code = null, $filiere = null);
}
