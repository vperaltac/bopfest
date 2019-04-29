const etiqueta_rap = document.getElementById("rap");
const etiqueta_pop = document.getElementById("pop");
const etiqueta_fest = document.getElementById("fest");

etiqueta_rap.addEventListener("click", function(){filtrar_por_etiqueta('rap')});
etiqueta_pop.addEventListener("click", function(){filtrar_por_etiqueta('pop')});
etiqueta_fest.addEventListener("click", function(){filtrar_por_etiqueta('fest')});


function filtrar_por_etiqueta(filtro){
    let xhr = new XMLHttpRequest();
    xhr.open('GET','../index.php?dir=filtro&etiqueta=' + filtro,true);
    xhr.send();  

    xhr.onload = function(){
        document.getElementById('polaroids').innerHTML = xhr.response;
    }

    let etiquetas = document.getElementsByClassName('etiqueta');
    
    Array.prototype.forEach.call(etiquetas, function(etiqueta){
        if(etiqueta.id == filtro){
            etiqueta.style.backgroundColor = "white";
            etiqueta.style.color = "#ff9933";
        }
    });
}