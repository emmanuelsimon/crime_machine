<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Unite_de_compte
 *
 * @author manu
 */
class Unite_de_compte {
    var $id_unite;
    var $label_unite;
    
    function __construct($id_unite, $label_unite) {
        $this->id_unite = $id_unite;
        $this->label_unite = $label_unite;
    }

    function getLabel_unite() {
        return $this->label_unite;
    }


}// fin de class
