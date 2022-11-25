
function startTime() {
    var Fhoy = new Date();
    var hora = Fhoy.getHours();
    var min = Fhoy.getMinutes();
    var seg = Fhoy.getSeconds();
    ap = (hora < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hora = (hora == 0) ? 12 : hora;
    hora = (hora > 12) ? hora - 12 : hora;
    
    hora = checkTime(hora);
    min = checkTime(min);
    seg = checkTime(seg);
    document.getElementById("clock").innerHTML = " "+ hora + ":" + min + ":" + seg + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
    var curWeekDay = days[Fhoy.getDay()];
    var curDay = Fhoy.getDate();
    var curMonth = months[Fhoy.getMonth()];
    var curYear = Fhoy.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}