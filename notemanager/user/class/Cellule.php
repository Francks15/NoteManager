<?php

class Cellule
{

    public static function afficheNote($valeur)
    {
        if (!isset($valeur)) {
            return "/";
        } elseif ($valeur < 0) {
            return "EL";
        } else {
            return $valeur;
        }
    }
}
