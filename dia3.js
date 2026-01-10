const usuarios = [
    { nome: "usuario01", idade: 10, ativo: true }, 
    { nome: "usuario02", idade: 20, ativo: false },
    { nome: "usuario03", idade: 30, ativo: true }
]

console.log(usuarios)
console.log("---------------------------------------")

const a = 3
function usuariosAtivos(usuarios) {
    console.log("Usuários Ativos")
    console.log("---------------------------------------")
    for (let index = 0; index < a; index++) {
        const element = usuarios[index];
        if (element.ativo) {
           msg1 = `Usuário ${element.nome}, está ativo`
        }
    }
    return msg1
}

console.log(usuariosAtivos(usuarios))


function maiorIdade(usuarios) {
console.log("---------------------------------------")
console.log("Usuários Maiores de Idade")
console.log("---------------------------------------")

    for (let index = 0; index < a; index++) {
        const element = usuarios[index];
        if (element.idade >= 18) {
           msg2 = `O usuário ${element.nome} é maior de idade`
        }
    }
    return msg2
}

console.log(maiorIdade(usuarios))


function arrayUsers(users = []){
console.log("---------------------------------------")
console.log("Usuários Ativos")
    let usersAtivos = 0
 for (let index = 0; index < users.length; index++) {
     const element = users[index];
     if (element.ativo) {
        usersAtivos++
     }
 }
    return usersAtivos
}


 console.log(`Estão ativos ${arrayUsers(usuarios)} usuário(s)`)

 function newArrayUsers(users=[]){
console.log("---------------------------------------")
console.log("Usuários Ativos - Nomes")
console.log("---------------------------------------")

        let usersAtivos = []
    for (let index = 0; index < users.length; index++) {
        const element = users[index];
        if (element.ativo) {
            usersAtivos.push(element.nome)
        }
    }

    return usersAtivos
}

console.log(newArrayUsers(usuarios))