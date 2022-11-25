const formulario = document.getElementById('formJ');
const inputs = document.querySelectorAll('#formJ')
const mensaje = document.getElementById('warnings')



formulario.addEventListener('submit',(e)=>{
    e.preventDefault();
    ValidarForm(); 


});

 

function ValidarForm(){
    let regexJugada = /^[0-9]+$/
    let warnings =""
    let entrar =false
    mensaje.innerHTML =""

    inputs.forEach((input) =>{
        if(!regexJugada.test(input.value)){
            warnings += 'los campos solo aceptan numeros'
            entrar=true
            
        }
        if(entrar){
            mensaje.innerHTML = warnings
        }
    
    });

}