<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Crime Machine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Ressources/css/main.css">
    <link rel="stylesheet" href="Ressources/css/morris.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body onload="inipage()">
    <main>
        <section class='f_row' id="titre">
            <div id="logo">
                <img src="Ressources/images/mariannes_logo_seul3-290x258.png" alt="logo"/>
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
                <input type="text" id="input_date_debut" name="datepicker" value="<?php echo date('YYYY-MM-DD'); ?>" />
                
            </div>
            <div class="flx_disp_col">
                <div>Date de fin</div>
                <input type="date" id="input_date_fin" name="datepicker" value="<?php echo date('YYYY-MM-DD'); ?>" />
            </div>
            Evènements :<br>
            <div class="flx_disp_col">
                <div id="Typ_event">
                    <select id='list_type_Even' size='1' onchange="recupEvent()"></select>
                </div>
                <div>
                    <select id="listEven" size='1'>
                        <option>Evénement</option>
                    </select>
                    <span class="orange" >Légende : Trait vertical Orange</span>
                </div>
            </div>
            <div class="flx_disp_row" id="infosEvent"></div>
        </section>
        <section>
            1er ligne de données dans le graphique :<br>
            <div class="flx_disp_row">
                <div id="departement1">
                    <select id="list_departement1" size='1' onchange="recupDepartement()"></select>
                </div>
                <div id="infraction1">
                    <select id="list_infraction1" list size='1' onchange="selectListInfra('list_infraction1','unite_de_compte1')">
                    </select>
                </div>
                <div id="unite_de_compte1" class="bleue">uc</div>
            </div>
        </section>
        <section>
            2eme ligne de données dans le graphique :<br>
            <div class="flx_disp_row">
                <div class="flx_disp_row">
                <div id="departement2">
                    <select id="list_departement2" size='1' onchange="recupDepartement()"></select>
                </div>
                <div id="infraction2">
                    <select id="list_infraction2" list size='1' onchange="selectListInfra('list_infraction2','unite_de_compte2')">
                    </select>
                </div>
                <div id="unite_de_compte2" class="rouge"></div> 
                </div>
            </div>
        </section>
        <div id="morris-area-chart"></div>
    </main>
    <footer>
        <script src="Ressources/js/jquery.min.js"></script>
        <script src="Ressources/js/bootstrap.min.js"></script>
        <script src="Ressources/js/raphael.min.js"></script>
        <script src="Ressources/js/morris.min.js"></script>
        <script src="ajax/fonctionsDiverses.js"></script>
        <script src="ajax/ajax_evenement.js"></script>
        <script src="ajax/xhr.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){ 
            $( "#input_date_debut" ).datepicker({dateFormat: "yy-mm-dd"});
            $( "#input_date_fin" ).datepicker({dateFormat: "yy-mm-dd"});
        }); 
        </script>
    </footer>
</body>
</html>
