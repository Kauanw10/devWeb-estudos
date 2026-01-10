const botao = window.document.querySelector("button")
const linha = window.document.querySelector("ul")

const tarefas = [
    { descricao: "Cozinhar", feita: true},
    { descricao: "Limpar a casa", feita: false},
    { descricao: "Arrumar a cama", feita: false},
    { descricao: "Limpar o banheiro", feita: true}
]

function funcaoBotao(){
    linha.innerHTML = ""

    for (let index = 0; index < tarefas.length; index++) {
        const tarefa = tarefas[index];
        if (tarefa.feita) {
             linha.innerHTML += `<li>Tarefa: ${tarefa.descricao} está Feito </li>`
        }
    }
}
botao.onclick = funcaoBotao