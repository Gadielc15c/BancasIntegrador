
document.getElementById("formJ").addEventListener('submit', validation)


function Validation(evt){
    var elementos=document.getElementsByName("jugada[]")
    let regex= /^\d{1,2}$/;

    for (i=0; i<elementos.length-1; i++){
        if(!regex.test(jugada[i].value)){

            evt.preventDefault();
        }

    }
    
}



