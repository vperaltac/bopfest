const btnEventos = document.getElementById("btnEventos");
const btnComentarios = document.getElementById("btnComentarios");
const btnUsuarios = document.getElementById("btnUsuarios");
const listaEventos = document.getElementById("lista-eventos");
const listaComentarios = document.getElementById("lista-comentarios");
const listaUsuarios = document.getElementById("lista-usuarios");
const busquedaE = document.getElementById("busquedaE");
const busquedaC = document.getElementById("busquedaC");
const busquedaU = document.getElementById("busquedaU");

btnEventos.onclick = function() {
    listaEventos.style.display = "block";
    listaComentarios.style.display = "none";
    listaUsuarios.style.display  = "none";
}

btnComentarios.onclick = function() {
    listaEventos.style.display = "none";
    listaComentarios.style.display = "block";
    listaUsuarios.style.display  = "none";
}

btnUsuarios.onclick = function() {
    listaEventos.style.display = "none";
    listaComentarios.style.display = "none";
    listaUsuarios.style.display  = "block";
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