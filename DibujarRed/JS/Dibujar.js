
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
    var tamDis = dispositivos.length;
    for(var i=0;i<tamDis;i++){
        idD.push(parseInt(dispositivos[i].idDispositivo,10));
        nomD.push(dispositivos[i].nombreD);
        tipoD.push(dispositivos[i].tipo);
        idUsuD.push(parseInt(dispositivos[i].Usuario_idusuario,10));
    }
    for(var i=0;i<enlaces.length;i++){
      //disp1, disp2
        d1.push(parseInt(enlaces[i].disp1,10));
        d2.push(parseInt(enlaces[i].disp2,10));
    }
    tamD=dispositivos.length;
    tamE=enlaces.length;
}
// Se llama cuando se carga la API de visualización.
function draw() {
    // Crear nodos.
    var DIR = 'IMAGEN/';
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
    edges = [];
    for (var i = 0; i < tamE; i++) {
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
