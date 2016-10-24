<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ensembe_infraction
 *
 * @author manu
 */
class Ensembe_infraction {
    var $dep_id; // objet de la classe Departement
    var $type_id; // objet de la classe Type_infraction
    var $valeur_intra;
    var $date_infra;
    
    function __construct($dep_id, $type_id, $valeur_intra, $date_infra) {
        $this->dep_id = $dep_id;
        $this->type_id = $type_id;
        $this->valeur_intra = $valeur_intra;
        $this->date_infra = $date_infra;
    }
    
    function getType_id() {
        return $this->type_id;
    }

    function getValeur_intra() {
        return $this->valeur_intra;
    }

    function getDate_infra() {
        return $this->date_infra;
    }



}// fin de class
