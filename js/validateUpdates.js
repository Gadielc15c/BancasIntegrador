
const btnBack = document.querySelector("#btn");
document.getElementById('regresar').addEventListener("click",buttonBack,
function ComfirmUpdate(){
 return confirmacion();
});


const btnUpdate = document.querySelector("#btn");
document.getElementById('update').addEventListener("click",buttonBack,function ConfirmDelete()
{return confirmacion();

});

function buttonBack(event){
    var respuesta=confirm('Seguro que Quieres hacer esto?');
    if(respuesta==true){
      

    }else{
  event.preventDefault();
    }
    
     
}



