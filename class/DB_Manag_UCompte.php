<?php
require_once 'dbConn.php';
require_once 'Unite_de_compte.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Manag_UCompte
 *
 * @author manu
 */
class DB_Manag_UCompte extends Unite_de_compte{
    
    public static function getAllUcomp(){ 
        $arrayUcomp[]="" ;
        try
        {
            $req="select * from unite_compte";
            $connec= dbConn::getConnection();
            $stmt= $connec->prepare($req);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $ucompte){
                $id=$ucompte[0];
                $lblucomp=$ucompte[1];
                $uc=new Unite_de_compte($id,$lblucomp);
                array_push($arrayUcomp, $uc);
            }
            return($arrayUcomp);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }
    }  
    
        public static function getUcompById($iduc){ 
        try
        {
            $uc="";
            $req="select * from unite_compte where id_unite=(select unite_id from type_infraction where id_type=:iduc);";
            $connec= dbConn::getConnection();
            $stmt= $connec->prepare($req);
            $stmt->bindValue('iduc',$iduc,PDO::PARAM_INT);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $ucompte){
                $id=$ucompte[0];
                $lblucomp=$ucompte[1];
                $uc=new Unite_de_compte($id,$lblucomp);
            }
            return($uc);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }
    } 
}
