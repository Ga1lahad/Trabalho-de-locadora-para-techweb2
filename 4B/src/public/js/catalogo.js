
const inpPesq = document.getElementById("inpPesq");


function pesquisa(valor) {

    let catalogo = document.getElementById("catalogo");
    const xhttp = new XMLHttpRequest(); // Criando o objeto XMLHttpRequest
    xhttp.onload = function () {
        ;
        catalogo.removeChild;
        catalogo.innerHTML = this.responseText;
    }
    xhttp.open("GET", "/?pesquisa=" + valor);
    xhttp.send();
};