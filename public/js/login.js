const senha = document.getElementById("senha")
const rptsenha = document.getElementById("rptsenha")

function teste() {
    console.log(senha.value)
    console.log(rptsenha.value)
    if (senha.value != rptsenha.value) {
        rptsenha.setAttribute("style", "border-color:red;")
    } else {
        rptsenha.removeAttribute("style")
    };
}