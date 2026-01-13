const botao = document.querySelector('button')
const lista = document.querySelector('ul')
const users = []
let usuariosOnline = []

function processarDados() {

    let nome =  document.getElementById('nome').value
    let idade = document.getElementById('idade').value 
    let profissao = document.getElementById('profissao').value
    let online = document.getElementById('status').checked

    novoUsuario = { nome, idade, profissao, online }

    processarCadastro(users,novoUsuario)

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

function deletarCadastro(posicao) {
    users.splice(posicao, 1)
    desenharLista()
}

function mostrarOnline(lista, usuariosAtivos, index) {
        lista.innerHTML += ` <li>Usuário: ${usuariosAtivos.nome}, Idade: ${usuariosAtivos.idade}, Profissão: ${usuariosAtivos.profissao} <button onclick="deletarCadastro(${index})">excluir</button> 🟢 Online</li>`
}

function mostrarOffline(lista, usuariosCadastrados, index) {
        lista.innerHTML += ` <li>Usuário: ${usuariosCadastrados.nome} <button onclick="deletarCadastro(${index})">excluir</button> -  Offline🔴</li>`
}

botao.onclick = processarDados