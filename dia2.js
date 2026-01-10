let numeroAleatorio =  Math.floor(Math.random() * 11)
const nota = numeroAleatorio

console.log(nota)

console.log("----------------------------")

function avaliacaoNota(nota) {
    if(nota >= 8){
       result =`Nota: ${nota} - APROVADO`
    } else if((nota <= 7) && (nota >= 5)){
       result =`Nota: ${nota} - RECUPERAÇÃO`
    } else{
       result =`Nota: ${nota} - REPROVADO`
    }

    return result
}
console.log(avaliacaoNota(nota))

console.log("----------------------------")

    let limite = 20
    for (let i = 1; i <= limite; i++) {
        const n = limite[i];
        if (i % 2 === 0) {
           console.log(`${i} é PAR`)
        } else{
           console.log(`${i} é IMPAR`) 
        }
    }



console.log("----------------------------")

const numArray = [8, 25, 37, 88, 76]
let num = 5

console.log(numArray)

function maiorNumero(){
    let numeroMaior = 0
    for (let index = 0; index < num; index++) {
        const element = numArray[index];
        if (element > numeroMaior) {
            numeroMaior = element
        }
    }
    return numeroMaior
}

console.log(`O Maior número é: ${maiorNumero(numArray)}`)

