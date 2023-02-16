/**
 * 
 */

function verifyUser() {
    var mail = document.getElementById('user').value
    var pwd = document.getElementById('pass').value
    var datos = {
        'mail': mail,
        'password': pwd
    }
    $.ajax({
        type: 'POST',
        url: 'verifyUsers.php',
        data: datos,
        dataType: false,
        success: function (data) {
            if (data !== '0') {
                save_LocalStorage(data)
            } else {
                console.log('El usuario no existe')
            }
        }
    });
}