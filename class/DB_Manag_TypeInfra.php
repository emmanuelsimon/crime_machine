<?php
require_once 'dbConn.php';
require_once 'Type_infraction.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Manag_TypeInfra
 *
 * @author manu
 */
class DB_Manag_TypeInfra extends Type_infraction{
    
    public static function getAllTypeInfra(){
        $arrayAllTypeInfra[]="";
        try
        {
            $req="select * from type_infraction";
            $connec= dbConn::getConnection();
            $stmt=$connec->prepare($req);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $decomp){
                $id=$decomp[0];
                $type=$decomp[1];
                $uniteid= $decomp[2];
                $typeInfra=new Type_infraction($id, $type, $uniteid);
                array_push($arrayAllTypeInfra, $typeInfra);
            }
            return($arrayAllTypeInfra);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }
    }
    
    public static function getTypeInfraById($idTyp){
        try
        {
            $req="select * from type_infraction where id_type=:idt";
            $connec= dbConn::getConnection();
            $stmt=$connec->prepare($req);
            $stmt->bindValue('idt',$idTyp , PDO::PARAM_INT);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $decomp){
                $id=$decomp[0];
                $type=$decomp[1];
                $uniteid= $decomp[2];
                $typeInfra=new Type_infraction($id, $type, $uniteid);
            }
            return($typeInfra);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }
    }
}

