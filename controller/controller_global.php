<?php
require_once '../class/DB_Manag_TypeInfra.php';
require_once '../class/DB_Manag_Dep.php';
require_once '../class/DB_Manag_UCompte.php';
require_once '../class/DB_Manag_En_Infra.php';
require_once '../class/Departement.php';
require_once '../class/Ensembe_infraction.php';
require_once '../class/Type_infraction.php';
require_once '../class/Unite_de_compte.php';

//VERIFICATION DE LA VARIABLE GLOBAL $_GET
if(isset($_GET['mode'])&!empty($_GET['mode']))
{
    switch ($_GET['mode'])
    {
        case 1:
            genererAllDepJSON();
            break;
        case 2:
            genererAllTypeInfraJSON();
            break;
        case 3:
            genererSingleUniteJSON();
            break;
        case 4:
            genererSingleEnsembleInfraction();
            break;
        default;
            echo("Erreur Switch: Valeur GET invalide");
            break;
    }
}
else
{
    //VERSION DEBUG
    if(!isset($_GET['mode']))echo("La variable global GET n'existe pas");
    if(empty($_GET['mode']))echo("La variable global GET est vide");
}
//=======================================\\
//FONCTIONS D'ENCODAGE DES ARRAYS EN JSON\\
//=======================================\\

//DEPARTEMENTS
function genererAllDepJSON()
{
    $arrayAllDep = DB_Manag_Dep::getAllDep();
    echo (json_encode($arrayAllDep));
}

//TYPE INFRACTIONS
function genererAllTypeInfraJSON()
{
    $arrayAllTypeInfra = DB_Manag_TypeInfra::getAllTypeInfra();
    echo (json_encode($arrayAllTypeInfra));
}

//UNITES DE COMPTE
function genererSingleUniteJSON()
{
    $typ=$_GET['idType'];
    $arraySingleUnite = DB_Manag_UCompte::getUcompById($typ);
    echo (json_encode($arraySingleUnite));
}

//ENSEMBLE INFRACTIONS
function genererSingleEnsembleInfraction()
{
    if(isset($_GET['date_debut']) & isset($_GET['date_fin']) & isset($_GET['idDep']) & isset($_GET['idTypeInfra'])
    & !empty($_GET['date_debut']) & !empty($_GET['date_fin']) & !empty($_GET['idDep']) & !empty($_GET['idTypeInfra']))
    {
       // if(verifDate($_GET['date_debut'])& verifDate($_GET['date_fin']))
       // {
            $idDep =intval($_GET['idDep']);
            $dateDebut = $_GET['date_debut'];
            $dateFin = $_GET['date_fin'];
            $idTypeInfra =intval($_GET['idTypeInfra']);
            $arraySingleInfra = DB_Manag_En_Infra::recup_infraction($idDep, $idTypeInfra, $dateDebut,$dateFin);
            
            echo (json_encode($arraySingleInfra));
        //}
       // else
       // {
        //    echo ("Le format de date est erroné");
        //}
    }
    else
    {
        echo ("Une variable est vide ou inexistante");
    }
}

//VERIFICATION DATE
function verifDate($date)
{
    $isValid = false;
    $arrayDate = explode("_",$date);
    if(strlen($date)>10)
    {
        $isValid = false;
    }
    if(strlen($arrayDate[0])== 2 & strlen($arrayDate[1])== 2 & strlen($arrayDate[2])== 4)
    {
        $isValid = true;
    }
    return $isValid;
}