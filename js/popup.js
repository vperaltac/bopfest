const modalTwitter = document.getElementById('modalTwitter');
const modalFacebook = document.getElementById('modalFacebook');
const btnTwitter = document.getElementById("Twitter");
const btnFacebook = document.getElementById("Facebook");
const btnAceptarT = document.getElementById("modal-cerrarTwitter");
const btnAceptarF = document.getElementById("modal-cerrarFacebook");

btnTwitter.onclick = function() {
  modalTwitter.style.display = "block";
}

btnAceptarT.onclick = function() {
  modalTwitter.style.display = "none";
}

btnFacebook.onclick = function() {
    modalFacebook.style.display = "block";
  }
  
btnAceptarF.onclick = function() {
    modalFacebook.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modalTwitter) {
    modalTwitter.style.display = "none";
  }
  else if(event.target == modalFacebook){
    modalFacebook.style.display = "none";
  }
}