// Listar Produtor
const listar = () => {
    $.ajax({
        url: "http://localhost:8081/app-feira/produtorRural",
        method: "GET",
        dataType: "json",

        success: function (data) {
            let linhas = "";

            data.forEach(produtor => {
                linhas += `
                    <tr>
                        <td class="border border-gray-300">${produtor.id}</td>
                        <td class="border border-gray-300">${produtor.nome}</td>
                        <td class="border border-gray-300">${produtor.municipio}</td>
                        <td class="border border-gray-300">${produtor.bairro}</td>
                        <td class="border border-gray-300">${produtor.telefone}</td>
                        <td class="border border-gray-300 py-2 flex justify-center gap-2">
                            <!-- Botão Editar -->
                            <button class="text-blue-600 cursor-pointer hover:text-blue-800 text-xl edit-btn" 
                                data-id="${produtor.id}"
                                data-name="${produtor.nome}"
                                data-municipio="${produtor.municipio}"
                                data-bairro="${produtor.bairro}"
                                data-telefone="${produtor.telefone}"
                                onclick="abrirEditar(${produtor.id})"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <!-- Botão Excluir -->
                            <button class="text-red-600 cursor-pointer hover:text-red-800 text-xl delete-btn" data-id="${produtor.id}" onclick="excluir(${produtor.id})">
                                <i class="fa-solid fa-trash"></i>
                            </button>  
                        </td>
                    </tr>
                `;
            });

            $("#tabela-produtores").html(linhas);
        },

        error: function () {
            M.toast({ html: 'Erro ao carregar produtores!', classes: 'red' });
        }
    });
}
// Cadastrar Produtor
const cadastrar = () => {
    const produtor = {
        nome: $("#nome").val(),
        municipio: $("#municipio").val(),
        bairro: $("#bairro").val(),
        telefone: $("#telefone").val()
    };
    $.ajax({
        url: "http://localhost:8081/app-feira/produtorRural",
        method: "POST",
        data: JSON.stringify(produtor),
        contentType: "application/json",

        success: function (data) {
            // Mensagem
            alert("Produtor cadastrado!");

            // Fechar modal
            $("#modal-cadastro").addClass("hidden");

            // Limpa os inputs
            $("#nome").val("");
            $("#municipio").val("");
            $("#bairro").val("");
            $("#telefone").val("");

            listar();
        },
        error: function () {
            // Mensagem
            alert("Erro ao cadastrar produtor!");
        }
    });
}
// Abrir modal editar
const abrirEditar = (id) => {
    const botao = $(`button[data-id='${id}']`);

    const nome = botao.data("name");
    const municipio = botao.data("municipio");
    const bairro = botao.data("bairro");
    const telefone = botao.data("telefone");

    $("#nome-editar").val(nome);
    $("#municipio-editar").val(municipio);
    $("#bairro-editar").val(bairro);
    $("#telefone-editar").val(telefone);

    // Salva o ID atual sendo editado
    $("#btn-salvar-edicao").attr("data-id", id);

    $("#modal-editar").removeClass("hidden");
}
// Editar Produtor
const editar = () => {
    const id = $("#btn-salvar-edicao").data("id");

    const produtor = {
        nome: $("#nome-editar").val(),
        municipio: $("#municipio-editar").val(),
        bairro: $("#bairro-editar").val(),
        telefone: $("#telefone-editar").val()
    };

    $.ajax({
        url: `http://localhost:8081/app-feira/produtorRural/${id}`,
        method: "PUT",
        data: JSON.stringify(produtor),
        contentType: "application/json",

        success: function (data) {
            // Mensagem
            alert("Produtor Editado!");

            fecharEditar();
            listar();
        },
        error: function () {
            // Mensagem
            alert("Erro ao Editar Produtor!");
        }
    });
}
// Excluir Produtor
const excluir = (id) => {
    $.ajax({
        url: `http://localhost:8081/app-feira/produtorRural/${id}`,
        method: "DELETE",

        success: function (data) {
            // Mensagem
            alert("Produtor excluído!");

            listar();
        },
        error: function () {
            // Mensagem
            alert("Erro ao excluir Produtor!");
        }
    });
}