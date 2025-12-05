// Listar Produto
const listar = () => {
    $.ajax({
        url: "http://localhost:8081/app-feira/produto",
        method: "GET",
        dataType: "json",

        success: function (data) {
            let linhas = "";

            data.forEach(produto => {
                linhas += `
                    <tr>
                        <td class="border border-gray-300">${produto.id}</td>
                        <td class="border border-gray-300">${produto.nome}</td>
                        <td class="border border-gray-300">${produto.variedade}</td>
                        <td class="border border-gray-300 py-2 flex justify-center gap-2">
                            <!-- Botão Editar -->
                            <button class="text-blue-600 cursor-pointer hover:text-blue-800 text-xl edit-btn" 
                                data-id="${produto.id}" 
                                data-name="${produto.nome}"
                                data-variedade="${produto.variedade}"
                                onclick="abrirEditar(${produto.id})"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <!-- Botão Excluir -->
                            <button class="text-red-600 cursor-pointer hover:text-red-800 text-xl delete-btn" data-id="${produto.id}" onclick="excluir(${produto.id})">
                                <i class="fa-solid fa-trash"></i>
                            </button>  
                        </td>
                    </tr>
                `;
            });
            $("#tabela-produtos").html(linhas);
        },
        error: function () {
            M.toast({ html: 'Erro ao carregar produtos!', classes: 'red' });
        }
    });
}
// Cadastrar Produto
const cadastrar = () => {
    const produto = {
        nome: $("#nome").val(),
        variedade: $("#variedade").val()
    };
    $.ajax({
        url: "http://localhost:8081/app-feira/produto",
        method: "POST",
        data: JSON.stringify(produto),
        contentType: "application/json",

        success: function (data) {
            // Mensagem
            alert("Produto cadastrado!");

            // Fechar modal
            $("#modal-cadastro").addClass("hidden");

            // Limpa os inputs
            $("#nome").val("");
            $("#variedade").val("");

            listar();
        },
        error: function () {
            // Mensagem
            alert("Erro ao cadastrar produto!");
        }
    });
}
// Abrir modal editar
const abrirEditar = (id) => {
    const botao = $(`button[data-id='${id}']`);

    const nome = botao.data("name");
    const variedade = botao.data("variedade");

    $("#nome-editar").val(nome);
    $("#variedade-editar").val(variedade);

    // Salva o ID atual sendo editado
    $("#btn-salvar-edicao").attr("data-id", id);

    $("#modal-editar").removeClass("hidden");
}
// Editar Produto
const editar = () => {
    const id = $("#btn-salvar-edicao").data("id");

    const produto = {
        nome: $("#nome-editar").val(),
        variedade: $("#variedade-editar").val()
    };

    $.ajax({
        url: `http://localhost:8081/app-feira/produto/${id}`,
        method: "PUT",
        data: JSON.stringify(produto),
        contentType: "application/json",

        success: function (data) {
            // Mensagem
            alert("Produto Editado!");

            fecharEditar();
            listar();
        },
        error: function () {
            // Mensagem
            alert("Erro ao Editar Produto!");
        }
    });
}
// Excluir Produto
const excluir = (id) => {
    $.ajax({
        url: `http://localhost:8081/app-feira/produto/${id}`,
        method: "DELETE",

        success: function (data) {
            // Mensagem
            alert("Produto excluído!");

            listar();
        },
        error: function () {
            // Mensagem
            alert("Erro ao excluir Produto!");
        }
    });
}