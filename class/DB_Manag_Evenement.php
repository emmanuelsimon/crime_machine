<?php
require_once 'dbConn.php';
require_once 'Evenement.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Manag_Evenement
 *
 * @author manu
 */
class DB_Manag_Evenement extends Evenement{
    
    public static function getEveByType($idtype){
    $arrayAllEve[]="";
    try
    {
        $req="select * from evenement where type_eve_id=:idtypeve";
        $connec= dbConn::getConnection();
        $stmt=$connec->prepare($req);
        $stmt->bindValue('idtypeve',$idtype , PDO::PARAM_INT);
        $stmt->execute();
        $retour=$stmt->fetchAll();
        foreach ($retour as $decomp){
            $id=$decomp[0];
            $type=$decomp[1];
            $lbl=$decomp[2];
            $det=$decomp[3];
            $ddeb=$decomp[4];
            $dfin=$decomp[5];
            $typeEve=new Evenement($id, $type,$lbl,$det,$ddeb,$dfin);
            array_push($arrayAllEve, $typeEve);
        }
        return($arrayAllEve);
        } catch (Exception $ex) {
            echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
        }
    }   
    
}
