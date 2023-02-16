/**
 * 
 */

var usuarios = []
function save_LocalStorage(user) {
    var usuario = user
    usuarios.push(usuario)
    console.log(usuarios)
}

$(document).ready(function () {
    $('#usuario').text(usuarios[usuarios.length - 1])
});