
var formulario = document.getElementById("fomJ");
var mensaje = document.getElementById("warnings");
var elementos=document.querySelectorAll("#numj");


formulario.addEventListener("submit", Validation)

function Validation(evt){
    let regex= /^\d{1,2}$/;
    let warnings ="";
    let entrar=false;
    mensaje.innerHTML =""

    elementos.forEach((e) =>{
        if(!regex.test(e.value) ){
            evt.preventDefault();
            warnings += 'los campos solo aceptan numeros'
            entrar= true;
        }
        if(entrar){
            mensaje.innerHTML=warnings
        }
    
      });
    
    
    
}




