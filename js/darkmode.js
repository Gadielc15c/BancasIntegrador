const btnswitch = document.querySelector('#switch');

btnswitch.addEventListener('click',() => {
    document.body.classList.toggle('dark');
    btnswitch.classList.toggle('active');

    //local storage
    if(document.body.classList.contains('dark')){
     localStorage.setItem('dark-mode','true')
    }
    else{
        localStorage.setItem('dark-mode','false')
    }

});

// obtener el modo actual

if(localStorage.getItem('dark-mode') === 'true'){
    document.body.classList.add('dark');
    btnswitch.classList.add('active');
}
else{
    document.body.classList.remove('dark');
    btnswitch.classList.remove('active');
}