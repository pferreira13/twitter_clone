$(document).ready( function () {
    $('#btn_login').click( function () {
        //alert ('oi');
        $campo_vazio = false;
        if ($('#campo_usuario').val() == ''){
            $('#campo_usuario').css({'border-color': '#A94442'});
            $campo_vazio = true;
        } else {
            $('#campo_usuario').css({'border-color': '#CCC'});
        }
        
        if ($('#campo_senha').val() == ''){
            $('#campo_senha').css({'border-color': '#A94442'});
            $campo_vazio = true;
        } else {
            $('#campo_senha').css({'border-color': '#CCC'});
        }

        if($campo_vazio){
            return false;
        }
    });
});
