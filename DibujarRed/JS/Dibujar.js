
var nodes = null;
var edges = null;
var network = null;
var idD = [];
var nomD = [] ;
var tipoD = [];
var idUsuD = [];
var tamD=null;
var tamE=null;
var d1 = [];
var d2 = [];
function p(dispositivos,enlaces){
    for(var i=0;i<dispositivos.length;i++){
        idD.push(parseInt(dispositivos[i].idDispositivo,10));
        nomD.push(dispositivos[i].nombreD);
        tipoD.push(dispositivos[i].tipo);
        idUsuD.push(parseInt(dispositivos[i].Usuario_idusuario,10));
    }
    for(var i=0;i<enlaces.length;i++){
        d1.push(parseInt(enlaces[i].Interface_idinterface,10));
        d2.push(parseInt(enlaces[i].Interface_idinterface1,10));
    }
    console.log("Valores");
    console.log(idD);
    console.log(nomD);
    console.log(tipoD);
    console.log(idUsuD);
    console.log(d1);
    console.log(d2);
    tamD=dispositivos.length;
    tamE=enlaces.length;
    console.log(tamD);
    console.log(tamE);
    console.log("fin de valores");

    //alert(dispositivos.length);
}
// Se llama cuando se carga la API de visualización.
function draw() {
    // Crear nodos.
    var DIR = 'IMAGEN/';
    console.log(tamD);
    nodes = [{
        id: 1,
        shape: 'circularImage',
        image: DIR + tipoD[0]+'.png',
        label: nomD[0]
    }];
    for (var i = 1; i < tamD; i++) {
        nodes.push({
            id: idD[i],
            shape: 'circularImage',
            image: DIR + tipoD[i]+ '.png',
            label: nomD[i]
        });
    }
    // Crear conexión entre nodos
    console.log(tamE);
    edges = [];

    for (var i = 0; i < tamE; i++) {
        console.log( 'dispositivo 1: '+d1[i]+ ' dispositivo 2: '+d2[i]);
        //console.log( d2[i]);
        edges.push({
            from: d1[i],
            to: d2[i]
        });
    }
    var container = document.getElementById('mynetwork');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {
        nodes: {
            size: 40,
            color: {
                background: '#006400'
            },
            font: {
                color: '#eeeeee',
                "size": 10
            },
        },
    };
    network = new vis.Network(container, data, options);
}
