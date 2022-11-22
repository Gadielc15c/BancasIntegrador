const jugada = document.getElementsByName("jugada");
const formJ= document.getElementById("formJ");
const parrafo = document.getElementById("warnings");




formJ.addEventListener('submit', (e) => {
    e.preventDefault();
    let warnings =""
    let regexJugada =/^[0-9]+$/


    if(!regexJugada.test(jugada.value)){
        warnings +='Uno de los numeros a jugar no es valido <br>'
    }


});