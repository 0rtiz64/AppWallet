$(document).ready(function () {
    $("input:submit").click(function () {
        return false;
    })
});

$("#inputPass").on('keyup', function (e) {
    if (e.keyCode == 13) {
        var user1 = $('#inputUser').val();
        var pass= $('#inputPass').val();
        var user = user1.toUpperCase();
        if(user1.trim().length ==""){
            $('#divUser').addClass('has-error');
            alertify.error("USUARIO INVALIDO");
            return false;
        }else{
            $('#divUser').removeClass('has-error');
            $('#divUser').addClass('has-success');

            if(pass.trim().length ==""){
                $('#divPass').addClass('has-error');
                alertify.error("PASSWORD INVALIDA");
                return false;
            }else{
                $('#divPass').removeClass('has-error');
                $('#divPass').addClass('has-success');
            }
        }


        $.ajax({
            url:'models/ingreso.php',
            type:'POST',
            data:'email='+user+'&password='+pass+"&boton=ingresar"
        }).done(function(resp){

            if(resp=='0'){
                $('#inputPass').val("");
                alertify.error("PASSWORD INVALIDA");
                $('#inputPass').focus();
            }else{
                location.href='inicio.php';
            }

        });

    }else{
        return false;
    }
});


function ingresar() {
    var user1 = $('#inputUser').val();
    var pass= $('#inputPass').val();
    var user = user1.toUpperCase();
    if(user1.trim().length ==""){
        $('#divUser').addClass('has-error');
        alertify.error("USUARIO INVALIDO");
        return false;
    }else{
        $('#divUser').removeClass('has-error');
        $('#divUser').addClass('has-success');

        if(pass.trim().length ==""){
            $('#divPass').addClass('has-error');
            alertify.error("PASSWORD INVALIDA");
            return false;
        }else{
            $('#divPass').removeClass('has-error');
            $('#divPass').addClass('has-success');
        }
    }


    $.ajax({
        url:'models/ingreso.php',
        type:'POST',
        data:'email='+user+'&password='+pass+"&boton=ingresar"
    }).done(function(resp){

        if(resp=='0'){
            $('#inputPass').val("");
            alertify.error("PASSWORD INVALIDA");
            $('#inputPass').focus();
        }else{
            location.href='inicio.php';
        }

    });

return false;
}