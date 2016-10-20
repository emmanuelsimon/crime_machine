<?php
require_once 'dbConn.php';
require_once 'Ensembe_infraction.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Manag_En_Infra
 *
 * @author manu
 */
class DB_Manag_En_Infra extends Ensembe_infraction{
    
    public static function recup_infraction($idDep, $idInfra, $dateDeb, $dateFin){
        $arrayInfra[]="";
        try
        {
            $req="select * from ensemble_infraction where dep_id=:iddep and type_id=:typid and date_infra between :dtdeb and :dtfin;";
            $connec= dbConn::getConnection();
            $stmt=$connec->prepare($req);
            $stmt->bindValue('iddep',$idDep , PDO::PARAM_INT);
            $stmt->bindValue('typid',$idInfra, PDO::PARAM_INT);
            $stmt->bindValue('dtdeb', $dateDeb,PDO::PARAM_STR);
            $stmt->bindValue('dtfin', $dateFin, PDO::PARAM_STR);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $decomp){
                $id=$decomp[0];
                $type=$decomp[1];
                $val= $decomp[2];
                $dt=$decomp[3];
                $typeInfra=new Ensembe_infraction($id, $type, $val,$dt);
                array_push($arrayInfra, $typeInfra);
            }
            return($arrayInfra);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }
    }
}
