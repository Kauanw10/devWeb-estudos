const url = 'http://localhost/devWeb-estudos/dia22-api_CRUD/api/criar.php'
const forms = document.getElementById('forms')
const p = document.getElementById('msg')


forms.addEventListener('submit', async (e) => {
    e.preventDefault()

    try {
    const formDados = new FormData(e.target)
    const objetoDados = Object.fromEntries(formDados)
    const dadosJSON = JSON.stringify(objetoDados)
    
    const resposta = await fetch(url, {
      method: 'POST',
      body: dadosJSON,
      headers: { 'Content-Type' : 'application/json'}
    })

    forms.reset()

    if (!resposta.ok) {
        throw new Error("Erro no servidor");
    } 
    

    const result = await resposta.json()

    p.innerText = result.status + ": "+ result.titulo

    } catch (error) {
        p.innerText = 'Erro ao processar. Tente Novamente mais tarde...'
        console.error(error)
    } 
})
