const botao = document.querySelector('button')
const lista = document.querySelector('ul')
const erro = document.getElementById('erro')
const users = []
let usuariosOnline = []

function processarDados() {

    let nome =  document.getElementById('nome').value
    let idade = document.getElementById('idade').value 
    let profissao = document.getElementById('profissao').value
    let online = document.getElementById('status').checked
    
    
    try {
        verificarNome(nome)
        verificarIdade(idade)

        novoUsuario = { nome, idade, profissao, online }
        processarCadastro(users,novoUsuario)
        erro.innerText = ""
    } catch (e) {
        erro.innerText = `Erro: ${e.message}`
    }

}

function processarCadastro(users, novoUsuario){
    users.push(novoUsuario)
    desenharLista()
}

function desenharLista(){
    lista.innerHTML = ""

    // Filtrando pelos Usuários Online
    const usuariosOnline = users.filter(u => u.online)
    
    // Filtrando pelos Usuários Offline
    const usuariosOffline = users.filter(u => !u.online)

    // Buscando e exibindo o usuário de acordo com seu Status (Online/Offline)
    usuariosOnline.forEach((u) => {
        const indexOriginal = users.indexOf(u)
        mostrarOnline(lista, u, indexOriginal)
    })

    usuariosOffline.forEach((u) => {
        const indexOriginal = users.indexOf(u)
        mostrarOffline(lista, u, indexOriginal)
    })

}

// FUNÇÕES

// Deletar Usuário
function deletarCadastro(posicao) {
    users.splice(posicao, 1)
    desenharLista()
}

// Exibindo a lista de usuarios o Status do usuário
function mostrarListaOnline(lista, usuariosAtivos, index) {
    lista.innerHTML += ` <li>Usuário: ${usuariosAtivos.nome}, Idade: ${usuariosAtivos.idade}, Profissão: ${usuariosAtivos.profissao} <button onclick="deletarCadastro(${index})">excluir</button> 🟢 Online</li>`
}

function mostrarListaOffline(lista, usuariosCadastrados, index) {
    lista.innerHTML += ` <li>Usuário: ${usuariosCadastrados.nome} <button onclick="deletarCadastro(${index})">excluir</button> -  Offline🔴</li>`
}

// Funções para Erros
function verificarNome(nome) {
    if (nome === "") {
        throw new Error("Nome é obrigatório!!");
    } else if (users.some(u => u.nome === nome)) {
        throw new Error("Nome ja cadastrado!");
    }
}

function verificarIdade(idade) {
    if (idade === "") {
        throw new Error("Idade é obrigatório!!");
    } else if (idade.length > 2) {
        throw new Error("Idade não pode conter mais que 2 digitos!");
    } else if (idade > 99) {
        throw new Error("Idade não deve ter o valor maior que 99!");
    }
}

botao.onclick = processarDados