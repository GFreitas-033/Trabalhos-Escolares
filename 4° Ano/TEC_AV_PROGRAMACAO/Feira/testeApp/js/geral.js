// Carregar Tabela
$(document).ready(function () {
    listar();
});
// Logica da Navegação do Header 
$("#btnProdutos").click(() => window.location.href = "index.html");
$("#btnProdutores").click(() => window.location.href = "produtores.html");
// Abrir modal cadastro
const abrirModal = () => {
    $("#modal-cadastro").removeClass("hidden");
}
// Fechar modal cadastro
const fecharModal = () => {
    $("#modal-cadastro").addClass("hidden");
}
// Fechar modal editar
const fecharEditar = () => {
    $("#modal-editar").addClass("hidden");
}