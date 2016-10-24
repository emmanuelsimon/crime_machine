<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evenement
 *
 * @author manu
 */
class Evenement {
    var $id_eve;
    var $type_eve_id;
    var $label_eve;
    var $detail;
    var $date_debut;
    var $date_fin;
    
    function __construct($id_eve, $type_eve_id, $label_eve, $detail, $date_debut, $date_fin) {
        $this->id_eve = $id_eve;
        $this->type_eve_id = $type_eve_id;
        $this->label_eve = $label_eve;
        $this->detail = $detail;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }
    
    function getType_eve_id() {
        return $this->type_eve_id;
    }

    function getLabel_eve() {
        return $this->label_eve;
    }

    function getDetail() {
        return $this->detail;
    }

    function getDate_debut() {
        return $this->date_debut;
    }

    function getDate_fin() {
        return $this->date_fin;
    }



}
