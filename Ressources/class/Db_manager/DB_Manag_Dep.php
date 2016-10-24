<?php
require_once './dbConn.php';
require_once './Departement.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_Manag_Dep
 *
 * @author manu
 */
class DB_Manag_Dep extends Departement {
    
        public static function getAllDep(){   
        $arrayDep[]="" ;
        try
        {
            $req="select * from departement order by num_dep";
            $connec= dbConn::getConnection();
            $stmt= $connec->prepare($req);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $decomp){
                $id_departement=$decomp[0];
                $lbl_departement=$decomp[1];
                $num_departement= $decomp[2];
                $departement=new Departement($id_departement,$lbl_departement,$num_departement);
                array_push($arrayDep, $departement);
            }
            return($arrayDep);
            } catch (Exception $ex) {
                echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
            }

    }
    
        public static function getDepById($idDep){
        $arrayDep[]="" ;
        try
        {
            $req="select * from departement where id_dep=:idd";
            $connec= dbConn::getConnection();
            $stmt= $connec->prepare($req);
            $stmt->bindValue('idd',$idDep , PDO::PARAM_INT);
            $stmt->execute();
            $retour=$stmt->fetchAll();
            foreach ($retour as $decomp){
                $id=$decomp[0];
                $nomdep=$decomp[1];
                $numDep= $decomp[1];
                $dep=new Departement($id,$nomdep,$numDep);
            }
            return($dep);   
        } catch (Exception $ex) 
        {
            echo "<h2>Erreur dans la requète : </h2>".$ex->getMessage();
        }

    }
}
