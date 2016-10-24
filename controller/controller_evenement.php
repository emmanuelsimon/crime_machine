<?php
require_once '../class/DB_Manag_Evenement.php';
require_once '../class/DB_Manag_TypeEve.php';
require_once '../class/Type_evenement.php';
require_once '../class/Evenement.php';


//VERIFICATION DE LA VARIABLE GLOBAL $_GET
if(isset($_GET['mode'])&!empty($_GET['mode']))
{
    switch ($_GET['mode'])
    {
        case 1:
            genererTypeEvenJSON();
            break;
        case 2:
            genererEvenByTypeJSON();
            break;
        case 3:
            genererInfoEvent();
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

//type d'evenement
function genererTypeEvenJSON()
{
    $arrayAllTypeEven = DB_Manag_TypeEve::getAllTypeEve();
    echo (json_encode($arrayAllTypeEven));
}

//UNITES DE COMPTE
function genererEvenByTypeJSON()
{
    $typ=$_GET['id'];
    $arrayEvent = DB_Manag_Evenement::getEveByType($typ);
    echo (json_encode($arrayEvent));
}

function genererInfoEvent()
{
    $id_event=$_GET['id'];
    $arrayInfos= DB_Manag_Evenement::getInfosEvenById($id_event);
    echo (json_encode($arrayInfos));
}