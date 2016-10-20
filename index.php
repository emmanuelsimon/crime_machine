<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Crime Machine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="src/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="css/metisMenu.min.css">-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/morris.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body onload="inipage()">
    <main>
        <section class='f_row' id="titre">
            <div id="logo">
                <img src="images/mariannes_logo_seul3-290x258.png" alt=""/>
            </div>
            <div id="infos">
                Le fichier ayant servi à ce programme provient du site : <br>
                <a href="http://www.data.gouv.fr/fr">data du gouvernement français</a><br>
                Il couvre la période allant de Janvier 1996 à Septembre 2016, et
                 concerne les crimes, délits et infraction par département.
            </div>
        </section>
        <section class="flx_disp_row">
            <div class="flx_disp_col">
                <div>Date de début</div>
                <input type="text" id="dtdeb" name="datepicker" value="<?php echo date('YYYY-MM-DD'); ?>" />
                
            </div>
            <div class="flx_disp_col">
                <div>Date de fin</div>
                <input type="date" id="dtfin" name="datepicker" value="<?php echo date('YYYY-MM-DD'); ?>" />
            </div>
            Evènements :<br>
            <div class="flx_disp_col">
                <div id="listTypeEven" onchange="recupEvent()">Type évènement</div>
                <div id="listEven"><select id="listEven" size='1'></select></div>
            </div>
        </section>
        <section>
            1er ligne de données dans le graphique :<br>
            <div class="flx_disp_row">
                <div id="departement1" onchange="selectDep('departement1')">Departement</div>
                <div id="listinfra1" onchange="selectListInfra('type_infra1','unitecpt1')">Liste infraction</div>
                <div id="unitecpt1">uc</div>
            </div>
        </section>
        <section>
            2ème ligne de données dans le graphique :<br>
            <div class="flx_disp_row">
                <div id="departement2" onchange="selectDep('departement2')">Departement</div>
                <div id="listinfra2" onchange="selectListInfra('type_infra2','unitecpt2')">Liste infraction</div>
                <div id="unitecpt2">uc</div>
            </div>
        </section>
        <section>

        </section>        
        
        
        <div id="morris-area-chart"></div>
    </main>
    <footer>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--<script src="js/metisMenu.min.js"></script>-->
        <script src="js/raphael.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="ajax/fonctionsDiverses.js"></script>*
        <script src="ajax/fct_events.js"></script>
        <script src="ajax/xhr.js"></script>
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <!--<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>-->
        <script type="text/javascript">
        $(document).ready(function(){ 
            $( "#dtdeb" ).datepicker({dateFormat: "yy-mm-dd"});
            $( "#dtfin" ).datepicker({dateFormat: "yy-mm-dd"});
        }); 
        </script>
    </footer>
</body>
</html>
