


function ValidarEmpty() {
    item = getElementsById("numj");
    formulario = document.getElementById("formJ");
    monto = document.getElementById("montoJ");
    let regex = /^\d{1,2}$/;
    let regexMonto= /^\d{1,6}$/;
    var a=0
    item.forEach(function iteramePapi(input) {
    a=a+1;
    if(a!=1){
        
        input.addEventListener('keyup', function (e) {
            ValidarNumbers(input);
            
        
            
        });
        
    }else{
        input.addEventListener('keyup', function (e) {
            ValidarNumbersFIrst(input)
            
            
            
        });
          

    } 

   
    });

    monto.addEventListener('keyup', function(e){
        validarmonto(monto);
    });



    function ValidarNumbersFIrst(input) {
        if (input.value.length == 0 || input.value.length < 1  || !regex.test(input.value)) {
            input.style.border = '0.5vh solid rgb(167, 50, 50)';
           
            Validation(input);
            

        }
        else {
            input.style.border = '0.5vh solid rgb(86, 221, 86)';

        }
    }

    function ValidarNumbers(input) {
        if (!regex.test(input.value)) {
            input.style.border = '0.5vh solid rgb(167, 50, 50)';
           
            Validation(input);
            

        }
        else {
            input.style.border = '0.5vh solid rgb(86, 221, 86)';

        }
    }
    function Validation(input) {
        formulario.addEventListener('submit',e=>{

            if (!regex.test(input.value)) {
                e.preventDefault();
               
            }


        });      
        

    }
    function validarmonto(monto){
        if (monto.value.length == 0 || monto.value.length < 1  || !regexMonto.test(monto.value) ) {
            monto.style.border = '0.5vh solid rgb(167, 50, 50)';
            ValidationMonto(monto);

        } else {
            monto.style.border = '0.5vh solid rgb(86, 221, 86)';

        }
    }


    function ValidationMonto(monto){
        formulario.addEventListener('submit', e=>{

            if(!regexMonto.test(monto.value)){
                e.preventDefault();
               
            }

        });
    }


}


function getElementsById(elementID) {
    var elementCollection = new Array();
    var allElements = document.querySelectorAll('body *');
    for (i = 0; i < allElements.length; i++) {
        if (allElements[i].id == elementID)
            elementCollection.push(allElements[i]);


    }
    return elementCollection;

}







