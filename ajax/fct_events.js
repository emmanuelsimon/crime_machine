/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function recupTypeEvent(){
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
         {  
            html="<select id='TypeEven' size='1'>"; 
            retour=this.responseText; 
            console.log(retour);
            html+="<option value=0 selected='selected'>Type évènement</option>";
            retour=JSON.parse(retour);
            for(i=1;i<retour.length;i++){
                op="<option value='"+retour[i]['id_type_eve']+"'>"+retour[i]['label_type_eve']+"</option>";    
                html+=op;
            }
            document.getElementById('listTypeEven').innerHTML=html;	
         }	
         else	
         {
            document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
         }	
      } 
   }; 
   req.open("GET", "./controller/controller_evenement.php?mode=1", true); 
   req.send(null); 
}


function recupEvent(){
    idTyp=document.getElementById("TypeEven");
    idTyp=idTyp.options[idTyp.selectedIndex].value;
    console.log(idTyp);
   var req = createInstance();
   req.onreadystatechange = function()
   { 
      if(req.readyState == 4)
      {
         if(req.status == 200)
         {  
            html="<select id='listEven' size='1'>"; 
            retour=this.responseText; 
            console.log(retour);
            html+="<option value=0 selected='selected'>Evénements</option>";
            retour=JSON.parse(retour);
            for(i=1;i<retour.length;i++){
                op="<option value='"+retour[i]['id_eve']+"'>"+retour[i]['label_eve']+"</option>";    
                html+=op;
            }
            document.getElementById('listEven').innerHTML=html;	
         }	
         else	
         {
            document.ajax.dyn.value="Error: returned status code " + req.status + " " + req.statusText;
         }	
      } 
   }; 
   req.open("GET", "./controller/controller_evenement.php?mode=2&id="+idTyp, true); 
   req.send(null); 
}