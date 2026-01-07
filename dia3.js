const usuarios = [
    { nome: "usuario01", idade: 10, ativo: true }, 
    { nome: "usuario02", idade: 20, ativo: false },
    { nome: "usuario03", idade: 30, ativo: true }
]

console.log(usuarios)
console.log("---------------------------------------")

console.log("Usuários Ativos")
console.log("---------------------------------------")
 const a = 3
for (let index = 0; index < a; index++) {
    const element = usuarios[index];
    if (element.ativo) {
        console.log(`Usuário ${element.nome}, está ativo`)
    }
}

console.log("---------------------------------------")
console.log("Usuários Maiores de Idade")
console.log("---------------------------------------")

for (let index = 0; index < a; index++) {
    const element = usuarios[index];
    if (element.idade >= 18) {
        console.log(`O usuário ${element.nome} é maior de idade`)
    }
}

console.log("---------------------------------------")
console.log("Usuários Ativos")
console.log("---------------------------------------")

function arrayUsers(users = []){
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

console.log("---------------------------------------")
console.log("Usuários Ativos - Nomes")
console.log("---------------------------------------")

function newArrayUsers(users=[]){
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