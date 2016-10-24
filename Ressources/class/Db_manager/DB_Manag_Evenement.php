<?php
require_once './dbConn.php';
require_once './Evenement.php';
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
        $req="select * from evenement where type_eve_id=:id_typ_event";
        $connec= dbConn::getConnection();
        $stmt=$connec->prepare($req);
        $stmt->bindValue('id_typ_event',$idtype , PDO::PARAM_INT);
        $stmt->execute();
        $retour=$stmt->fetchAll();
        foreach ($retour as $decomp){
            $id_event=$decomp[0];
            $type_event_id=$decomp[1];
            $lbl_event=$decomp[2];
            $detail_event=$decomp[3];
            $date_debut_event=$decomp[4];
            $date_fin_event=$decomp[5];
            $Event=new Evenement($id_event, $type_event_id,$lbl_event,$detail_event,$date_debut_event,$date_fin_event);
            array_push($arrayAllEve, $Event);
        }
        return($arrayAllEve);
        } catch (Exception $ex) {
            echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
        }
    }
    
    public static function getInfosEvenById($id_event){
        $arrayInfosEvent[]="";
        try
        {  
            $req="select * from evenement vhere id_eve=:id_event";
            $connec= dbConn::getConnection();
            $stmt=$connec->prepare($req);
            $stmt->bindValue('id_eve', $id_event, PDO::PARAM_STR);
            $stmt->execute();
            $retour=$stmt->fetchAmm();
            foreach ($retour as $decomp){
                $id_event=$decomp[0];
                $type_event_id=$decomp[1];
                $lbl_event=$decomp[2];
                $detail_event=$decomp[3];
                $date_debut_event=$decomp[4];
                $date_fin_event=$decomp[5];
                $Event=new Evenement($id_event, $type_event_id,$lbl_event,$detail_event,$date_debut_event,$date_fin_event);
                array_push($arrayAllEve, $Event);
            }
        } catch (Exception $ex) {
            echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();

        }
    }
    
}
