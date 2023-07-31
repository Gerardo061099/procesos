/**
 * Funcion para mostrar u ocultar
 * el password 
 */
function showorhidepass(data,element){
    var password1 = document.getElementById(data)
    var check = document.getElementById(element)
    // Si el checkbox de mostrar contraseña está activada
    if(check.checked === true){
        password1.type = 'text'
    }
    // Si no está activada
    else{
        password1.type = 'password'
    }
}