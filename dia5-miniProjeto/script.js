const botao = document.querySelector('button')
const lista = document.querySelector('ul')
const users = []

function processarCadastro() {

    let nome =  document.getElementById('nome').value
    let idade = document.getElementById('idade').value 
    let profissao = document.getElementById('profissao').value
    let online = document.getElementById('status').checked

    novoUsuario = { nome, idade, profissao, online }

    users.push(novoUsuario)
    desenharLista()
}

function desenharLista(){
    lista.innerHTML = ""
    for (let index = 0; index < users.length; index++) {
        const usuariosCadastrados = users[index];
        if (usuariosCadastrados.online) {     
            lista.innerHTML += ` <li>Usuário: ${usuariosCadastrados.nome}, Idade: ${usuariosCadastrados.idade}, Profissão: ${usuariosCadastrados.profissao} <button onclick="deletarCadastro(${index})">excluir</button> 🟢 Online</li>`
        } else{
            lista.innerHTML += ` <li>Usuário: ${usuariosCadastrados.nome} <button id="excluir" onclick="deletarCadastro(${index})">excluir</button> -  Offline🔴</li>`
        }
    }
}

function deletarCadastro(posicao) {
    users.splice(posicao, 1)
    desenharLista()
}

botao.onclick = processarCadastro