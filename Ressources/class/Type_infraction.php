<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Type_infraction
 *
 * @author manu
 */
class Type_infraction {
    var $id_type;
    var $label_type_infra;
    var $unite_de_compte; // objet de la classe Unite_de_compte
    
    function __construct($id_type, $label_type_infra, $unite_de_compte) {
        $this->id_type = $id_type;
        $this->label_type_infra = $label_type_infra;
        $this->unite_de_compte = $unite_de_compte;
    }
    
    function getLabel_type_infra() {
        return $this->label_type_infra;
    }

    function getUnite_de_compte() {
        return $this->unite_de_compte;
    }



}// fin de class
