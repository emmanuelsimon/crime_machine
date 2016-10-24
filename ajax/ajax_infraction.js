
var jsonInfraction;

function jsonGraph(departement, type_infraction , date_de_debut, date_de_fin){
    var id_departement1=departement;
    var id_type_infraction1=type_infraction;
    var dateDebut=date_de_debut;
    var dateFin=date_de_fin;   
    var req = createInstance();
    req.onreadystatechange = function()
    { 
        if(req.readyState == 4 && req.status == 200)
        {
            jsonInfraction = JSON.parse(this.responseText);
            //console.log(jsonInfraction);
        } 	
        else	
        {
           //document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
           return null;
        }	

    }; 
    data=id_departement1+"&idTypeInfra="+id_type_infraction1+"&date_debut="+dateDebut+"&date_fin="+dateFin;
    req.open("GET", "./controller/controller_global.php?mode=4&idDep="+data, true); 
    req.send(null); 
    
    
}

function recupDep(id){
   var id=id;
   var iddiv="departement"+id;
   var idlist="dep"+id;
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
         {  
            html="<select id='"+idlist+"' size='1'>"; 
            retour=this.responseText; 
            html+="<option value=0 selected='selected'>Département</option>";
            retour=JSON.parse(retour);
            for(i=1;i<retour.length;i++){
                op="<option value='"+retour[i]['id_dep']+"'>"+retour[i]['num_dep']+"-"+retour[i]['label_deb']+"</option>";    
                html+=op;
            }
            document.getElementById(iddiv).innerHTML=html;	
         }	
         else	
         {
            document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
         }	
      } 
   }; 
   req.open("GET", "./controller/controller_global.php?mode=1", true); 
   req.send(null); 
}



function recupTypeInfra(id){
   var id=id;
   var iddiv="listinfra"+id;
   var idlist="type_infra"+id;
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
         {  
            html="<select id='"+idlist+"'  list size='1'>"; 
            html+="<option value=0 selected='selected'>Choisir le type de délits</option>";
            retour=this.responseText; 
            retour=JSON.parse(retour);
            for(i=1;i<retour.length;i++){
                op="<option value='"+retour[i]['id_type']+"'>"+retour[i]['label_type_infra']+"</option>";
                html+=op;
            }
            document.getElementById(iddiv).innerHTML=html;	
         }	
         else	
         {
            document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
         }	
      } 
   }; 
   req.open("GET", "./controller/controller_global.php?mode=2", true); 
   req.send(null); 
}

function recupUniteCompte(divmodif,divcat){
    var divmod=divmodif;
    
    var divcateg=divcat;
    idli=document.getElementById(divmod);
    idli=idli.options[idli.selectedIndex].value;
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
         {  
            html="Nombre de ";
            retour=this.responseText;
            retour=JSON.parse(retour); 
            uc=retour['label_unite'];
            html+=uc;
            document.getElementById(divcateg).innerHTML=html;	
         }	
         else	
         {
            document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
         }	
      } 
   }; 
   req.open("GET", "./controller/controller_global.php?mode=3&idType="+idli, true); 
   req.send(null);   
}