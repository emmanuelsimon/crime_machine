
var jsonEvenement;

function recupTypeEvent(){
   var req = createInstance();
   req.onreadystatechange = function()
   { 
        if(req.readyState == 4 && req.status == 200)
        {
           
            var retour=this.responseText;
            retour=JSON.parse(retour);
            
            html="<select id='list_type_Even' size='1' onchange=\"recupEvent()\">"; 
            html+="<option value=0 selected='selected'>Type évènement</option>";
            
            for(i=1;i<retour.length;i++){
                op="<option value='"+retour[i]['id_type_eve']+"'>"+retour[i]['label_type_eve']+"</option>";    
                html+=op;
            }
            document.getElementById('Typ_event').innerHTML=html;	
        }	
        else	
        {
           //document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
        }	
       
   }; 
   req.open("GET", "./controller/controller_evenement.php?mode=1", true); 
   req.send(null); 
}
function infoEvenement(){
    var id_even=document.getElementById("list_even");
    id_even=id_even.option[id_even.selected].value;
    
    
}

function recupEvent(){
    idTyp=document.getElementById("list_type_Even");
    idTyp=idTyp.options[idTyp.selectedIndex].value;
   var req = createInstance();
   req.onreadystatechange = function()
   { 
        if(req.readyState == 4 && req.status == 200)
        {
          
            var retour=this.responseText; 
            retour=JSON.parse(retour);
            
            html="<select id='list_type_Even' size='1'>"; 
            html+="<option value=0 selected='selected'>Evénements</option>";
            
            for(i=1;i<retour.length;i++){
                op="<option value='"+retour[i]['id_eve']+"'>"+retour[i]['label_eve']+"</option>";    
                html+=op;
            }
            document.getElementById('listEven').innerHTML=html;	
        }	
        else	
        {
           //document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
        }	
       
   }; 
   req.open("GET", "./controller/controller_evenement.php?mode=2&id="+idTyp, true); 
   req.send(null); 
}

function jsonEvenementAjax(id)
{
    
    var req = createInstance();
    req.onreadystatechange = function()
    { 
        if(req.readyState == 4 && req.status == 200)
        {
            jsonEvenement =  JSON.parse(this.responseText); 
        }	
        else	
        {
           //document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
        }	

    }; 
    req.open("GET", "./controller/controller_evenement.php?mode=2&id="+id, true); 
    req.send(null); 
}