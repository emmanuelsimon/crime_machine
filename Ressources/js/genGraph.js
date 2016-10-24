function getJsonAndParseForGraph()
{
    //pour les courbes
    
    var jsonData = [];
    var data = null;
    var ArrayElementsInf = document.getElementsByClassName('courbe');
    //foreach div qui defini une courbe
    for(var i = 0 ; i < ArrayElementsInf.length; i++)
    {
        //lit les elements
        /*var elementDep = ArrayElementsInf[i].getElementById("dep1");
        var dep = elementDep.options[elementDep.selectedIndex].value;
        
        var elementType=ArrayElementsInf[i].getElementById("type_infra1");
        var type = elementType.options[elementType.selectedIndex].value; 
        */
       
        var dateDebut = document.getElementById("dtdeb").value;
        var dateFin = document.getElementById("dtfin").value;
        
        var dep = 13;
        var type = 3;
        
        
        //verification a faire ici
        
        jsonGraph(dep, type, dateDebut, dateFin);
        jsonData.push(jsonInfraction); 
    } 
    if(jsonData[0] != null) data = createData(jsonData);
    
    //pour les evenements
    
    var jsonEvent = [];
    var event = null;
    var ArrayElementsEve = document.getElementsByClassName('event');
    //foreach div qui defini un event
    for(var i = 0 ; i < ArrayElementsEve.length; i++)
    {
        //lit les elements
        /*var elementEvent = ArrayElementsEve[i].getElementById('listEven');
        var id = elementEvent.options[elementEvent.selectedIndex].value;
        */
        
        
        //appel la fonction ajax qui recupere les evenements
        var id = 1;
        jsonEvenementAjax(id); 
        jsonEvent.push(jsonEvenement);
    }
    event = createEvent(jsonEvent);
       
    if(jsonData[0] != null)
    {
        createGraph(data, event);
        //createLegend(data, event);
    }
}


function createData(jsonData) //jsonData un array d'array
{
    var colors = ['blue', 'red', 'green', 'black'];
    
    var list = [];
    //var point = {period:null};//, courbe1:null, courbe2:null, courbe3:null};
    var label = [];
    var color = [];
    
    
    for(var i = 0; i < jsonData.length; i++)//pour chaque courbe
    {
        var tmpColor = colors[i%colors.length];
        color.push(tmpColor);//couleur de cette courbe
        label.push('courbe'+i);             //nom de cette courbe
    }
    
    
    for(var y = 0; y < jsonData[0].length; y++)// pour chaque point
    {
        var tmpPoint = new Object;
        tmpPoint['period'] = jsonData[0][y].date_infra; //on recupere la date des premiers données
        for(var i = 0; i < jsonData.length; i++)//pour chaque courbe
        {
            tmpPoint['courbe'+i] = jsonData[i][y].valeur_intra; 
            
        }
        
        if(tmpPoint.courbe0 != null)
        {
            list.push(tmpPoint);
        }
        
    }
    
    var data = {
        list:list,
        label:label,
        color:color
    };
    
    return data; // un object qui a des attributs qui sont des arrays
}

function createEvent(jsonEvent)//jsonEvent un array d'object
{
    var colors = ['orange', 'yellow', 'grey', 'black'];
    var list = [];
    var color = [];
    
    event = {
        list:list,
        color:color
    };
    
    if(jsonEvent[0] != null && jsonEvent[0][1] != null)
    {
        for(var i = 0; i < jsonEvent.length; i++)//pour chaque event
        {
            color.push(colors[i%colors.length]);//couleur de cette event
            list.push(jsonEvent[i][1].date_debut);
            if(jsonEvent[i][1].date_fin != null)//si cet event a une date de fin on l'affiche
            {
                color.push(colors[i%colors.length]);
                list.push(jsonEvent[i][1].date_fin);
            }
        }
    }
    
    return event;
}

function createGraph(data, event)
{
    document.getElementById('morris-area-chart').innerHTML="";
    
    Morris.Line({
        element: 'morris-area-chart',
        data: data.list,
        lineColors: data.color,
        xkey: 'period',
        ykeys: data.label,
        xLabels: "month",
        labels: data.label,
        events: event.list,
        eventLineColors: event.color,
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
}
