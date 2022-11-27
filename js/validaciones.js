
export {ValidarEmpty};
  
    function ValidarEmpty(item) {

        item = document.querySelector(item);
        item.addEventListener('keyup', function () {
          
            if (item.value.length == 0 || item.value.length < 1) {

                item.style.border = '1px solid rgb(167, 50, 50)';
            
            }
            else {
                item.style.border = '1px solid rgb(86, 221, 86)';
                
            }
       
            validate();
         });

         function validate() {
            if (item.value == 0 || item.value.length < 6) {
                document.getElementById('ERROR').innerHTML = '';
                return false;
                
            } else if (item.value == 0 || item < 1) {
                document.getElementById('ERROR').innerHTML = '';
                return false;
            } else {
            }
        
        
        }
        
    }
