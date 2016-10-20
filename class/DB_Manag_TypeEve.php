<?php
require_once 'dbConn.php';
require_once 'Type_evenement.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Manag_TypeEve
 *
 * @author manu
 */
class DB_Manag_TypeEve extends Type_evenement {
    
    public static function getAllTypeEve(){
        $arrayAllTypeEve[]="";
        try
        {
            $req="select * from type_evenement";
            $connec= dbConn::getConnection();
            $stmt=$connec->prepare($req);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $decomp){
                $id=$decomp[0];
                $type=$decomp[1];
                $typeEve=new Type_evenement($id, $type);
                array_push($arrayAllTypeEve, $typeEve);
            }
            return($arrayAllTypeEve);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }
    }
}
