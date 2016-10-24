<?php
require_once './dbConn.php';
require_once './Ensembe_infraction.php';
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
    
    public static function recup_infraction($id_departement, $id_Infraction, $date_Debut, $date_Fin){
        $arrayInfra[]="";
        try
        {
            $req="select * from ensemble_infraction where dep_id=:id_departement and type_id=:typ_infraction_id and date_infra between :date_debut and :date_fin;";
            $connec= dbConn::getConnection();
            $stmt=$connec->prepare($req);
            $stmt->bindValue('id_departement',$id_departement , PDO::PARAM_INT);
            $stmt->bindValue('typ_infraction_id',$id_Infraction, PDO::PARAM_INT);
            $stmt->bindValue('date_debut', $date_Debut,PDO::PARAM_STR);
            $stmt->bindValue('date_fin', $date_Fin, PDO::PARAM_STR);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $decomp){
                $id=$decomp[0];
                $type=$decomp[1];
                $val= $decomp[2];
                $dt=$decomp[3];
                $infraction=new Ensembe_infraction($id, $type, $val,$dt);
                array_push($arrayInfra, $infraction);
            }
            return($arrayInfra);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }
    }
}
