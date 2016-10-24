/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function inipage(){
    recupDepartement(1);
    recupDepartement(2);
    recupTypeInfra(1);
    recupTypeInfra(2);
    document.getElementById('input_date_debut').value='1996-01-01';
    document.getElementById('input_date_fin').value='2016-09-01';
    recupTypeEvent();
    testInputGraph(1);

}

function testInputGraph(flag){
   var flg=flag;
   var iddep1;
   var idtyp1;
   var date_debut;
   var dtfin;
   if(flg==1){
       var iddep1=1;
       var idtyp1=11;
       var idtyp2=1;
       var iddep2=1;
       var date_debut="2010-01-01";
       var dtfin="2016-09-01";
       dataGraph(iddep1, idtyp1, date_debut, dtfin);
   }
   else
   {
      iddep1=document.getElementById("list_departement1");
      iddep1=iddep1.options[iddep1.selectedIndex].value;
      idtyp1=document.getElementById("list_infraction1");
      idtyp1=idtyp1.options[idtyp1.selectedIndex].value; 
      date_debut=document.getElementById("input_date_debut").value;
      dtfin=document.getElementById("input_date_fin").value;
      iddep2=document.getElementById("list_departement2");
      iddep2=iddep2.options[iddep2.selectedIndex].value;
      idtyp2=document.getElementById("list_infraction2");
      idtyp2=idtyp2.options[idtyp2.selectedIndex].value; 
      
      

        
      if((iddep2==0) && ((iddep1>0) && (idtyp1>0))){  
          dataGraph(iddep1, idtyp1, date_debut, dtfin);
      }
      else if((iddep2>0) && (iddep1>0) && (idtyp1>0) && (idtyp2>0)){
          alert("boucle 2 courbes a faire");
      }
      else{
          console.log("il manque des données");
      }
      
   }
}

//function controleDate(){
//    dd=document.getElementById('dtdeb').value;
//    df=document.getElementById('dtfin').value;
//    if(df<dd){
//        var temp=dd;
//        document.getElementById('input_date_debut').value=document.getElementById('dtfin').value;
//        document.getElementById('input_date_fin').value=dd;
//        alert("Inversion des dates !!");
//    }
//}


function selectDep(){
    jsonGraph;  
}

function selectListInfra(divmodif, divcatego){
    var divmod=divmodif;
    var divcat=divcatego;
    recupUniteCompte(divmod, divcat);
    testInputGraph();
}

function recupDepartement(id){
   var id=id;
   var iddiv="departement"+id;
   var idlist="list_departement"+id;
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
         {  
            html="<select id='"+idlist+"' size='1' onchange=\"selectDep()\">"; 
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
   req.open("GET", "../controller/controller_global.php?mode=1", true); 
   req.send(null); 
}



function recupTypeInfra(id){
   var id=id;
   var iddiv="infraction"+id;
   var idlist="list_infraction"+id;
   var id_div_unite_de_compte="unite_de_compte"+id;
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
         {  
            html="<select id='"+idlist+"' list size='1' onchange=\"selectListInfra('"+idlist+"','"+id_div_unite_de_compte+"')\">"
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

function dataGraph(dep, type, dd, df){
   var iddep1=dep;
   var idtyp1=type;
   var dtdeb=dd;
   var dtfin=df;   
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
            {
              //  html="";
                document.getElementById('morris-area-chart').innerHTML="";
                var array = new Array;
                retour=this.responseText;
                retour=JSON.parse(retour);
                for (i=1;i<retour.length;i++)
                {
                    date = retour[i]['date_infra'];
                    val = retour[i]['valeur_intra'];
                    objet = {period: date, toto: val};
                    array.push(objet);
                }
                Morris.Line({
                        element: 'morris-area-chart',
                        data: array,
                        xkey: 'period',
                        ykeys: ['toto'],
                        xLabels: "month",
                        labels: ['toto'],
                        pointSize: 2,
                        hideHover: 'auto',
                        resize: true
                    });
            }	
         else	
         {
            document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
         }	
      } 
   }; 
   data=iddep1+"&idTypeInfra="+idtyp1+"&date_debut="+dtdeb+"&date_fin="+dtfin;
   req.open("GET", "./controller/controller_global.php?mode=4&idDep="+data, true); 
   req.send(null); 
}
