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

    // si la etiqueta ya está activa, modificar sólo esa y actualizar la página sin filtros
    if(etiqueta_actual == etiqueta_activa){
        etiqueta_actual.style.backgroundColor = "#ffaa56";
        etiqueta_actual.style.color = "white";
        etiqueta_activa = null;

        filtro = 'all';
    }
    else{
        // recorrer todas las etiquetas para modificar la apariencia 
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

    // petición AJAX asíncrona 
    let xhr = new XMLHttpRequest();
    xhr.open('GET','principal/filtro/' + filtro,true);
    xhr.send();  

    // cuando se reciba la respuesta, modificar polaroids con el filtro
    xhr.onload = function(){
        document.getElementById('polaroids').innerHTML = xhr.response;
    }
}