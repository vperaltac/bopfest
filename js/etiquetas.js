document.getElementById('etiqueta_rap').addEventListener('click',filtrar_por_etiqueta);

function filtrar_por_etiqueta(){
    let xhr = new XMLHttpRequest();
    xhr.open('POST','../index.php?dir=etiqueta',true);
    xhr.send();

    xhr.onload = function(){
        document.getElementById('polaroids').innerHTML = xhr.response;
    }
}