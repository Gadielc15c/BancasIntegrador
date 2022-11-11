
const btnBack = document.querySelector("#btn");
document.getElementById('regresar').addEventListener("click",buttonBack,
function ConfirmDelete(){
 return confirmacion();
});


const btnUpdate = document.querySelector("#btnUpdate");
document.getElementById('update').addEventListener("click",buttonBack,function ConfirmDelete()
{return confirmacion();

});

const logoutLvl = document.querySelector("#logout");
document.getElementById('logout').addEventListener("click",buttonBack,function ConfirmDelete()
{return confirmacion();

});







//Funciones 
function buttonBack(event){
    var respuesta=confirm('Seguro que Quieres hacer esto?');
    if(respuesta==true){
      

    }else{
  event.preventDefault();
    }
    
     
}



