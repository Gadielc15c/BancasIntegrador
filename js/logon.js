


var login = document.querySelector('#login');
login.addEventListener('keyup', function(){
    var u_times = document.querySelector('.u_times');
    var u_check = document.querySelector('.u_check');
    if(login.value.length == 0 || login.value.length < 1){
        login.style.border = '1px solid rgb(167, 50, 50)';
        u_times.style.display = 'block';
        u_check.style.display = 'none';
    }
    else{
        login.style.border = '1px solid rgb(86, 221, 86)';
        u_times.style.display = 'none';
        u_check.style.display = 'block';
    }
})


var password = document.querySelector('#password');
password.addEventListener('keyup', function(){
    var p_times = document.querySelector('.p_times');
    var p_check = document.querySelector('.p_check');
    if(password.value.length == 0 || password.value.length < 1){
       password.style.border = '1px solid rgb(167, 50, 50)';
        p_times.style.display = 'block';
        p_check.style.display = 'none';
    }
    else{
       password.style.border = '1px solid rgb(86, 221, 86)';
        p_times.style.display = 'none';
        p_check.style.display = 'block';
    }
})


function validate(){
if(login.value == 0 || login.value.length < 6 ){
   document.getElementById('ERROR').innerHTML = '';
   return false ;
}else if(password.value == 0 || password < 1){
   document.getElementById('ERROR').innerHTML = '';
   return false ;
}else{

}


}
