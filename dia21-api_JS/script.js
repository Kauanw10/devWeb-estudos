const p1 = document.getElementById('msg1')
const p2 = document.getElementById('msg2')
async function buscarDados() {
    try {
        const resposta = await fetch('http://localhost/devWeb-estudos/dia21-api_JS/api/teste.php')
        const infos = await resposta.json()
        p1.innerText = 'Status da Requisição: ' + infos.status
        p2.innerText = 'Mensagem da Requisição: ' + infos.mensagem

    } catch (error) {
        p1.innerText = 'Erro: ' + error
    }
}
