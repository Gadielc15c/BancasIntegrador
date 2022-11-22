const numj = document.getElementById("numj");
const formJ= document.getElementById("formJ");
const parrafo = document.getElementById("warnings");




formJ.addEventListener("submit", e => {
    e.preventDefault();
    let warnings =""
    let entrar = false
    let regexJugada =/^[0-9]+$/

    console.log(!regexJugada.test(numj.value))
    if(regexJugada.test(numj.value)){
        warnings +='Uno de los numeros a jugar no es valido <br>'
        entrar=true
    }
    if(entrar){
        parrafo.innerHTML = warnings

    }


})