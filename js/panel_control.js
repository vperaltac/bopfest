const btnEventos = document.getElementById("btnEventos");
const btnComentarios = document.getElementById("btnComentarios");
const btnUsuarios = document.getElementById("btnUsuarios");
const btnAddE = document.getElementById("btnAddEventos");
const listaEventos = document.getElementById("lista-eventos");
const listaComentarios = document.getElementById("lista-comentarios");
const listaUsuarios = document.getElementById("lista-usuarios");
const busquedaE = document.getElementById("busquedaE");
const busquedaC = document.getElementById("busquedaC");
const busquedaU = document.getElementById("busquedaU");
const formEvento = document.getElementById("formEvento");
const guardarEvento = document.getElementById("guardarEvento");
const tituloImg1    = document.getElementById("tituloImg1");
const tituloImg2    = document.getElementById("tituloImg2");
const creditosImg1    = document.getElementById("credImg1");
const creditosImg2    = document.getElementById("credImg2");

const imagenPrincipal = document.getElementById('imgPrincipal');
const imagen1 = document.getElementById('img1');
const imagen2 = document.getElementById('img2');


console.log(tituloImg1);
console.log(tituloImg2);
console.log(creditosImg1);
console.log(creditosImg2);

if(btnEventos){
  btnEventos.onclick = function() {
    listaEventos.style.display = "block";
    listaComentarios.style.display = "none";
    listaUsuarios.style.display  = "none";
    formEvento.style.display = "none";
}
}

if(btnComentarios){
  btnComentarios.onclick = function() {
    listaEventos.style.display = "none";
    listaComentarios.style.display = "block";
    listaUsuarios.style.display  = "none";
    formEvento.style.display = "none";
}
}

if(btnUsuarios){
  btnUsuarios.onclick = function() {
    listaEventos.style.display = "none";
    listaComentarios.style.display = "none";
    listaUsuarios.style.display  = "block";
    formEvento.style.display = "none";
}
}

if(btnAddE){
  btnAddE.onclick = function() {
    listaEventos.style.display = "none";
    listaComentarios.style.display = "none";
    listaUsuarios.style.display  = "none";
    formEvento.style.display = "block";
  }
}


busquedaE.onkeyup = function() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("busquedaE");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablaE");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

if(busquedaC){
  busquedaC.onkeyup = function() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("busquedaC");
    filter = input.value.toUpperCase();
    table = document.getElementById("tablaC");
    tr = table.getElementsByTagName("tr");
  
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
}

if(busquedaU){
  busquedaU.onkeyup = function() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("busquedaU");
    filter = input.value.toUpperCase();
    table = document.getElementById("tablaU");
    tr = table.getElementsByTagName("tr");
  
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
}

if(guardarEvento){
  guardarEvento.onclick = function() {
    addEvento();
  }
}

// AÑADIR EVENTO
function addEvento() {
  let titulo      = document.getElementById("tituloE").value;
  let organizador = document.getElementById("organizadorE").value;
  let fecha       = document.getElementById("fechaE").value;
  let descripcion = document.getElementById("descripcionE").value;
  let titulo_imagen1   = tituloImg1.value;
  let titulo_imagen2   = tituloImg2.value;
  let creditos_imagen1 = creditosImg1.value;
  let creditos_imagen2 = creditosImg2.value;

  var imgP = imagenPrincipal.files[0];
  var img1 = imagen1.files[0];
  var img2 = imagen2.files[0];

  var formData = new FormData();
  formData.append('imgPrincipal',imgP);
  let enviarImgP = new XMLHttpRequest();
  enviarImgP.open('POST',"subir-imagen/imgPrincipal");
  enviarImgP.send(formData);
  enviarImgP.onload = function(){
    var dir_imgP = enviarImgP.response;

    var formImg1 = new FormData();
    formImg1.append('img1',img1);
    let enviarImg1 = new XMLHttpRequest();
    enviarImg1.open('POST',"subir-imagen/img1");
    enviarImg1.send(formImg1);
    enviarImg1.onload = function(){
      var dir_img1 = enviarImg1.response;

      var formImg2 = new FormData();
      formImg2.append('img2',img2);
      let enviarImg2 = new XMLHttpRequest();
      enviarImg2.open('POST',"subir-imagen/img2");
      enviarImg2.send(formImg2);
      enviarImg2.onload = function(){
        var dir_img2 = enviarImg2.response;

        let request = new XMLHttpRequest();
        request.open('POST',"eventos");
        request.setRequestHeader("Content-Type","application/json;charset=UTF-8");
        request.send(JSON.stringify({
                                    "titulo"           : titulo,
                                    "organizador"      : organizador,
                                    "fecha"            : fecha,
                                    "descripcion"      : descripcion,
                                    "titulo_imagen1"   : titulo_imagen1,
                                    "titulo_imagen2"   : titulo_imagen2,
                                    "creditos_imagen1" : creditos_imagen1,
                                    "creditos_imagen2" : creditos_imagen2,
                                    "dir_imagenP"      : dir_imgP,
                                    "dir_imagen1"      : dir_img1,
                                    "dir_imagen2"      : dir_img2,
                                }));
        request.onload = function(){
              console.log(request.response);
        }
    
      }
    }
  }
  


}