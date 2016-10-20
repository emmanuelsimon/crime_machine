<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Type_evenement
 *
 * @author manu
 */
class Type_evenement {
    var $id_type_eve;
    var $label_type_eve;
    
    function __construct($id_type_eve, $label_type_eve) {
        $this->id_type_eve = $id_type_eve;
        $this->label_type_eve = $label_type_eve;
    }
    
    function getLabel_type_infra() {
        return $this->label_type_eve;
    }
}
