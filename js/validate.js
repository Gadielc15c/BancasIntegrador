


function ValidarEmpty() {
    item = getElementsById("numj");
    var mensaje = document.getElementById("warnings");
    let regex = /^\d{1,2}$/;

    item.forEach(function iteramePapi(input) {

        input.addEventListener('keyup', function (e) {

            ValidarNumbers(input);
            Validation(input);
        });
    });
    function ValidarNumbers(input) {
        if (input.value.length == 0 || input.value.length < 1 || !regex.test(input.value)) {
            input.style.border = '0.5vh solid rgb(167, 50, 50)';
            

        }
        else {
            input.style.border = '0.5vh solid rgb(86, 221, 86)';

        }
    }

    function Validation(evt) {

        let warnings = "";
        let entrar = false;
        mensaje.innerHTML = ""

        item.forEach((e) => {
            if (!regex.test(e.value)) {
                evt.preventDefault();
                warnings += 'los campos solo aceptan numeros'
                entrar = true;
            }
            if (entrar) {
                mensaje.innerHTML = warnings
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







