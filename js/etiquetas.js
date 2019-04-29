const etiqueta_rap = document.getElementById("rap");
const etiqueta_pop = document.getElementById("pop");
const etiqueta_fest = document.getElementById("fest");
var etiqueta_activa = null;

etiqueta_rap.addEventListener("click", function(){filtrar_por_etiqueta('rap')});
etiqueta_pop.addEventListener("click", function(){filtrar_por_etiqueta('pop')});
etiqueta_fest.addEventListener("click", function(){filtrar_por_etiqueta('fest')});


function filtrar_por_etiqueta(filtro){
    let etiquetas = document.getElementsByClassName('etiqueta');
    let etiqueta_actual = document.getElementById(filtro);

    if(etiqueta_actual == etiqueta_activa){
        console.log("etiqueta actual seleccionada");    

        etiqueta_actual.style.backgroundColor = "#ffaa56";
        etiqueta_actual.style.color = "white";
        etiqueta_activa = null;

        filtro = 'all';
    }
    else{
        Array.prototype.forEach.call(etiquetas, function(etiqueta){
            if(etiqueta.id == filtro){
                etiqueta.style.backgroundColor = "white";
                etiqueta.style.color = "#ff9933";
                etiqueta_activa = etiqueta;
            }
            else{
                etiqueta.style.backgroundColor = "#ffaa56";
                etiqueta.style.color = "white";
            }
        });    
    }


    let xhr = new XMLHttpRequest();
    xhr.open('GET','../index.php?dir=filtro&etiqueta=' + filtro,true);
    xhr.send();  

    xhr.onload = function(){
        document.getElementById('polaroids').innerHTML = xhr.response;
    }
}