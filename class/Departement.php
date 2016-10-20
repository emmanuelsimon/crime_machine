<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Departement
 *
 * @author manu
 */
class Departement{
    var $id_dep;
    var $label_deb;
    var $num_dep;

    
    function __construct($id_dep, $label_deb, $num_dep) {
        $this->id_dep = $id_dep;
        $this->label_deb = $label_deb;
        $this->num_dep = $num_dep;
    }
    
    function getLabel_deb() {
        return $this->label_deb;
    }

    function getNum_dep() {
        return $this->num_dep;
    }

    function getId_dep() {
        return $this->id_dep;
    }


    
}//fin de class
