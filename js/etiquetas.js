document.getElementById('etiqueta_rap').addEventListener('click',function(){filtrar_por_etiqueta('rap')});
document.getElementById('etiqueta_pop').addEventListener('click',function(){filtrar_por_etiqueta('pop')});
document.getElementById('etiqueta_fest').addEventListener('click',function(){filtrar_por_etiqueta('festival')});

function filtrar_por_etiqueta(filtro){
    let xhr = new XMLHttpRequest();
    xhr.open('GET','../index.php?dir=filtro&etiqueta=' + filtro,true);
    xhr.send();

    xhr.onload = function(){
        document.getElementById('polaroids').innerHTML = xhr.response;
    }
}