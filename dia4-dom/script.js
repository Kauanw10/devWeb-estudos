const button = window.document.querySelector("button")
const ul = window.document.querySelector("ul")

const tarefas = [
    { descricao: "Cozinhar", feito: true},
    { descricao: "Limpar a casa", feito: false},
    { descricao: "Arrumar a cama", feito: false},
    { descricao: "Limpar o banheiro", feito: true}
]

function funcaoBotao(){
    ul.innerHTML = ""

    for (let index = 0; index < tarefas.length; index++) {
        const element = tarefas[index];
        if (element.feito) {
             ul.innerHTML += `<li>Tarefa: ${element.descricao} está Feito </li>`
        }
    }
}
button.onclick = funcaoBotao